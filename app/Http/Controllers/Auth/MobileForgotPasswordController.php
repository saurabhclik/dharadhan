<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MobileForgotPasswordController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10'
        ]);

        $user = User::where('phone', $request->mobile)->first();
        if (!$user) {
            return response()->json(['status' => "error", 'message' => 'Mobile not found']);
        }
        Session::put('phone', $request->mobile);
        Session::put('password_otp_time', now());
        return sendOtp($request->mobile);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6'
        ]);

        if (empty(Session::get('otpsession_id'))) {
            return response()->json(['status' => "error", 'message' => 'Invalid OTP']);
        }

        $sessionId = session('otpsession_id');
        $otpTime = session('password_otp_time');

        if (!$otpTime) {
            return response()->json([
                'status' => "error",
                'message' => 'OTP expired'
            ]);
        }

        if (!$sessionId) {
            return response()->json([
                'status' => 'error',
                'message' => 'OTP session expired. Please request a new OTP.'
            ]);
        }

        if(verifyOtp($sessionId, $request->otp)){
            Session::put('otp_verified', true);
            Session::put('password_otp', $request->otp);
            Session::put('password_mobile', Session::get('phone'));
            return response()->json(['status' => "success", 'message' => 'OTP verified']);
        }else{
            return response()->json(['status' => "error", 'message' => 'OTP Verification failed']);
        }
    }

    public function resetPassword(Request $request)
    {
        if (!Session::get('otp_verified')) {
            return response()->json(['status' => "error", 'message' => 'OTP not verified']);
        }

        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::where('phone', Session::get('password_mobile'))->first();
        $user->password = Hash::make($request->password);
        $user->save();

        Session::forget(['password_otp', 'password_mobile', 'otp_verified','otpsession_id','phone','password_otp_time']);

        return response()->json(['status' => "success", 'message' => 'Password reset successfully', 'redirect_url' => route('index')]);
    }

    public function showForm()
    {
        return view('auth.forgot-password-mobile');
    }
}
