<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    protected $razorpay;

    public function __construct()
    {
        $this->razorpay = new Api(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        );
    }

    public function createOrder(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'plan_type' => 'required|string',
            'plan_duration' => 'required|string|in:monthly,yearly',
        ]);
        try 
        {
            $userId = Auth::id();
            if (!$userId && session()->has('temp_user_id')) 
            {
                $userId = session('temp_user_id');
            }

            // dd($userId);
            if (!$userId) 
            {
                return response()->json([
                    'status' => 401,
                    'message' => 'User not found. Please complete registration first.',
                    'data' => '',
                ]);
            }
            $user = User::find($userId);
            if (!$user) 
            {
                return response()->json([
                    'status' => 401,
                    'message' => 'User account not found. Please restart registration.',
                    'data' => '',
                ]);
            }

            $orderData = [
                'receipt' => 'order_' . Str::random(10),
                'amount' => $request->amount * 100, 
                'currency' => 'INR',
                'payment_capture' => 1 
            ];

            $razorpayOrder = $this->razorpay->order->create($orderData);
            // dd($razorpayOrder);
            $payment = Payment::create([
                'user_id' => $userId,
                'razorpay_order_id' => $razorpayOrder['id'],
                'order_id' => $orderData['receipt'],
                'amount' => $request->amount,
                'currency' => 'INR',
                'status' => 'pending',
                'plan_type' => $request->plan_type,
                'plan_duration' => $request->plan_duration,
                'description' => $request->description ?? 'Subscription Payment',
                'metadata' => [
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'is_temp_user' => !Auth::check() && session()->has('temp_user_id')
                ]
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Order created successfully',
                'data' => [
                    'order_id' => $razorpayOrder['id'],
                    'amount' => $razorpayOrder['amount'],
                    'currency' => $razorpayOrder['currency'],
                    'key' => config('services.razorpay.key'),
                    'payment_id' => $payment->id,
                    'name' => $user->name ?? 'User',
                    'email' => $user->email ?? '',
                    'contact' => $user->phone ?? '',
                    'description' => 'Payment for ' . $request->plan_type . ' Plan'
                ]
            ]);

        } 
        catch (\Exception $e) 
        {
            return response()->json([
                'status' => 500,
                'message' => 'Failed to create payment order. Please try again.' . $e->getMessage(),
                'data' => '',
            ]);
        }
    }

    public function verifyPayment(Request $request)
    {
        $request->validate([
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id' => 'required|string',
            'razorpay_signature' => 'required|string',
        ]);

        try 
        {
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];

            $this->razorpay->utility->verifyPaymentSignature($attributes);
            $payment = Payment::where('razorpay_order_id', $request->razorpay_order_id)->first();

            if (!$payment) 
            {
                return response()->json([
                    'status' => 404,
                    'message' => 'Payment record not found',
                    'data' => '',
                ]);
            }
            $payment->update([
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature,
                'status' => 'paid',
                'paid_at' => now()
            ]);
            $this->handleSuccessfulPayment($payment);
            if (session()->has('designation')) 
            {
                $this->createUserAfterPayment($payment);
            }
            return response()->json([
                'status' => 200,
                'message' => 'Payment verified successfully!',
                'data' => [
                    'payment_id' => $payment->id,
                    'redirect' => route('payment.success', ['payment_id' => $payment->id])
                ],
            ]);

        } 
        catch (SignatureVerificationError $e) 
        {
            Payment::where('razorpay_order_id', $request->razorpay_order_id)
                ->update(['status' => 'failed']);
            return response()->json([
                'status' => 400,
                'message' => 'Payment verification failed. Please contact support.' . $e->getMessage(),
                'data' => '',
            ]);

        } 
        catch (\Exception $e) 
        {
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while verifying payment.' . $e->getMessage(),
                'data' => '',
            ]);
        }
    }
    
    protected function handleSuccessfulPayment(Payment $payment)
    {
        if ($payment->user_id) 
        {
            $user = User::find($payment->user_id);
            
            if ($user) 
            {
                $user->update([
                    'plan_type' => $payment->plan_type,
                    'plan_duration' => $payment->plan_duration,
                    'plan_expires_at' => $this->calculateExpiryDate($payment->plan_duration),
                    'payment_status' => 'paid'
                ]);
                if (!$user->hasRole('agent')) 
                {
                    $user->assignRole('agent');
                }
            }
        }
    }

    protected function createUserAfterPayment(Payment $payment)
    {
        session()->put('payment_completed', true);
        session()->put('payment_id', $payment->id);
    }

    protected function calculateExpiryDate($duration)
    {
        switch ($duration) 
        {
            case 'monthly':
                return now()->addMonth();
            case 'yearly':
                return now()->addYear();
            default:
                return null;
        }
    }
    public function paymentSuccess(Request $request)
    {
        $payment = Payment::with('user')->findOrFail($request->payment_id);
        
        return view('payment.success', compact('payment'));
    }
    public function paymentFailed()
    {
        return view('payment.failed');
    }
    public function getPaymentDetails($paymentId)
    {
        $payment = Payment::with('user')->findOrFail($paymentId);
        
        return response()->json([
            'status' => 200,
            'message' => 'payment details get successfully',
            'data' => [
                'payment' => $payment,
            ],
        ]);
    }
    public function fetchRazorpayPayment($paymentId)
    {
        try 
        {
            $payment = $this->razorpay->payment->fetch($paymentId);
            return response()->json([
                'status' => 200,
                'message' => 'Razorpay Payment fetch successfully',
                'data' => [
                    'payment' => $payment,
                ],
            ]);
        } 
        catch (\Exception $e) 
        {
            return response()->json([
                'status' => 500,
                'message' => 'Failed to fetch payment details'. $e->getMessage(),
                'data' => '',
            ]);
        }
    }

    public function handleWebhook(Request $request)
    {
        $webhookSecret = config('services.razorpay.webhook_secret');
        $signature = $request->header('x-razorpay-signature');
        try 
        {
            $this->razorpay->utility->verifyWebhookSignature(
                $request->getContent(),
                $signature,
                $webhookSecret
            );

            $payload = $request->all();

            if ($payload['event'] === 'payment.captured') 
            {
                $paymentData = $payload['payload']['payment']['entity'];
                Payment::where('razorpay_payment_id', $paymentData['id'])
                    ->update([
                        'status' => 'paid',
                        'paid_at' => now()
                    ]);
            }

            return response()->json([
                'status' => 200,
                'message' => 'handle webhook successfully',
                'data' => '',
            ]);
            
        } 
        catch (\Exception $e) 
        {
            return response()->json([
                'status' => 400,
                'message' => 'Something went wrong!'. $e->getMessage(),
                'data' => '',
            ]);
        }
    }
    public function checkPaymentStatus(Request $request)
    {
        $userId = Auth::id();
        
        if (!$userId && session()->has('temp_user_id')) {
            $userId = session('temp_user_id');
        }
        
        if (!$userId) {
            return response()->json(['status' => 'error', 'message' => 'User not found']);
        }
        
        $payment = Payment::where('user_id', $userId)
                    ->where('status', 'paid')
                    ->first();
        
        if ($payment) {
            return response()->json(['status' => 'paid', 'payment' => $payment]);
        }
        
        return response()->json(['status' => 'pending']);
    }
}