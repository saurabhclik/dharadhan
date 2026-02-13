<?php

namespace App\Http\Controllers;

use \App\Events\PaymentFailed;
use App\Models\Payment;
use App\Services\Payments\PaymentManager;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function create(Request $request, PaymentManager $pm)
    {
        $data = $request->validate([
            'provider' => 'required|in:stripe,paypal,etransfer,offline',
            'amount'   => 'required',
            'currency' => 'nullable|string|size:3'
        ]);

        $data['shipment_data'] = session()->get('shipment_data', []);
        $publicId = (string) Str::uuid();
        try {
            $next = $pm->init(
                $data['provider'],
                $data['amount'],
                $data['currency'] ?? null,
                [
                    'description' => $data['shipment_data']['description'] ?? null,
                    'meta' => [
                        'source' => 'web',
                        'user_id' => auth()->id(),
                        'payment_public_id' => $publicId
                    ],
                ],
                $data['shipment_data']
            );
            return response()->json(['next_action' => $next, 'success' => true], 200);
        } catch (\App\Exceptions\PaymentException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Payment failed: ' . $e->getMessage(),
                'context' => $e->context(),
            ], 500);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Unexpected server error. Please try again later.',
            ], 500);
        }
    }

    public function success(string $publicId)
    {
        $payment = Payment::where('public_id', $publicId)->firstOrFail();
        // For Stripe: webhook completes; For PayPal: capture now if needed
        if ($payment->provider === 'paypal' && !$payment->isPaid()) {
            app(PaymentManager::class)->capture($payment);
        }
        return view('payments.success', compact('payment'));
    }

    public function cancel(string $publicId)
    {
        $payment = Payment::where('public_id', $publicId)->firstOrFail();
        $payment->status = 'failed';
        $payment->save();
        event(new PaymentFailed($payment, 'User cancelled checkout.'));
        return view('payments.cancel', compact('payment'));
    }
}

