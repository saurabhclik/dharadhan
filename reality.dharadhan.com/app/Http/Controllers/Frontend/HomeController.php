<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->checkAuthorization(Auth::user(), ['frontend.user.view']);
        $user = auth()->user();
        return view('frontend.myaccount.home', compact('user'));
    }

    public function changePassword()
    {
        $this->checkAuthorization(Auth::user(), ['frontend.user.edit']);
        $user = auth()->user();
        return view('frontend.myaccount.change_password', compact('user'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userProfile()
    {
        $this->checkAuthorization(Auth::user(), ['frontend.user.view']);
        $user = auth()->user();
        return view('frontend.myaccount.profile', compact('user'));
    }

    public function savePassword(Request $request){
        $this->checkAuthorization(Auth::user(), ['frontend.user.view']);
        $user = auth()->user();

        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|same:password',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Current password is incorrect'
            ], 400);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        $this->storeActionLogWithCustomType('profile', $request->all(), 'Profile updated');

        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    // update profile
    public function updateProfile(Request $request)
    {
        $this->checkAuthorization(Auth::user(), ['frontend.user.edit']);
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'dob' => 'nullable|date',
            'phone' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
        ]);

        $user->update($request->only('name', 'email', 'dob', 'phone', 'whatsapp', 'address', 'city', 'state', 'country', 'postal_code'));
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/users'), $filename);

            $user->photo = $filename;
        }
        $user->save();

        $this->storeActionLogWithCustomType('profile', $request->all(), 'Profile updated');

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

}
