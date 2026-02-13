<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Enums\ActionType;
use App\Http\Controllers\SiteController;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout','sendOtp','verifyOtp']);
    }

    public function ajaxLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'password' => $request->password,
        ];

        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->username;
            $user = User::where('email',$request->username)->first();
        } else {
            $credentials['phone'] = $request->username;
            $user = User::where('phone',$request->username)->first();
        }

        if($user && $user->status != 'active'){
            return response()->json(['status' => 'error', 'message' => 'Your registrion request is under approval process.']);
        }

        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $this->storeActionLog(ActionType::LOGIN, $credentials, 'User logged in');
            return response()->json(['status' => 'success', 'message' => 'Welcome back!']);
        }
        return response()->json(['status' => 'error', 'message' => 'Invalid credentials']);
    }

    public function ajaxSignup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'phone' => 'required|string|max:10|unique:users,phone',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|same:password',
            'role' => 'required|string|in:agent,subscriber',
            'otp' => 'required|string'
        ]);

        $sessionId = session('otpsession_id');
        if (!$sessionId) {
            return response()->json([
                'status' => 'error',
                'message' => 'OTP session expired. Please request a new OTP.'
            ]);
        }

        if(verifyOtp($sessionId, $request->otp)){
            try {
                $user = User::create([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'username' => preg_replace('/[^a-zA-Z0-9]/', '', \Str::random(8)),
                    'password' => Hash::make($request->password),
                    'phone'    => $request->phone,
                ]);

                $user->assignRole($request->role);
                $this->storeActionLog(ActionType::REGISTER, $request->all(), 'User registered');
                session()->forget('otpsession_id');
                session()->save();
                sendLoginDetails($request->all());
                Auth::loginUsingId($user->id);

                return response()->json(['status' => 'success', 'message' => 'Account created successfully!', 'redirect' => route('properties')]);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => 'Failed to create account.', 'error' => $e->getMessage()], 500);
            }
        }else{
            return response()->json(['status' => 'error', 'message' => 'OTP Verification failed']);
        }
    }

    public function logout(Request $request)
    {
        $this->storeActionLog(ActionType::LOGOUT, $request->all(), 'User logged out');
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        if($request->filled('redirectTo')){
            // Redirect to login page or home
            return redirect()->route('index');
        }
        // Redirect to login page or home
        return redirect()->route('admin.login');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string'],
        ]);
        if($request->has('submit_type') && $request->submit_type == "post"){
            session()->put('post_property', $request->all());
        }
        return sendOtp($request->phone);
    }

    public function verifyOtp(Request $request){
        $sessionId = session('otpsession_id');
        if (!$sessionId) {
            return response()->json([
                'status' => 'error',
                'message' => 'OTP session expired. Please request a new OTP.'
            ]);
        }

        if(verifyOtp($sessionId, $request->otp)){
            if(session('post_property')){
                $request->merge(session('post_property'));
            }

            $user = User::where('phone', $request->input('phone'))->first();
            if($user){
                if(@$user->status != 'active'){
                    return response()->json(['status' => 'error', 'message' => 'Your registrion request is under approval process.']);
                }

                Auth::loginUsingId($user->id);
                $redirect = (session('post_property')) ? route('post.property.primarydetails') : route('post.property');
                return response()->json(['status' => 'success', 'message' => 'Account logged in successfully!', 'redirect' => $redirect]);
            }

            try {
                session()->put('completeprofile', 'pending');
                session()->put('phone', $request->phone);
                session()->put('otp', $request->otp);
                session()->put('otpstatus', 'verified');
                session()->put('step', 'designation');
                session()->save();

                return response()->json(['status' => 'success', 'message' => 'We have verified your mobile number successully. Please complete your profile after refresh page!', 'redirect' => route('index',['profile' => 'pending','step' => 'designation'])]);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => 'Somting went wrong. Please try again.', 'error' => $e->getMessage()], 500);
            }
        }

        return response()->json(['status' => 'error', 'message' => 'OTP verfication failed.'], 200);
    }

    public function saveSignupData(Request $request){
        if(session('step') == "designation"){
            session()->put('designation', $request->only('role','plan_type'));
            session()->put('step', 'address');
            session()->save();
            return response()->json(['status' => 'success', 'message' => 'Designation information saved successfully.', 'redirect' => route('index',['profile' => 'pending','step' => 'address'])]);
        }elseif(session('step') == "address"){
            session()->put('address', $request->only('role','plan_type','address','country','state','city','postal_code'));
            session()->put('step', 'terms');
            session()->save();
            return response()->json(['status' => 'success', 'message' => 'Address information saved successfully.', 'redirect' => route('index',['profile' => 'pending','step' => 'terms'])]);
        }elseif(session('step') == "terms"){
            if($request->has('terms') && $request->terms == "Right"){
                session()->put('terms', $request->only('terms'));
                session()->put('step', 'policy');
                $route = route('index',['profile' => 'pending','step' => 'policy']);
            }elseif($request->has('terms') && $request->terms == "Wrong"){
                session()->put('terms', null);
                session()->put('step', 'designation');
                $route = route('index',['profile' => 'pending','step' => 'designation']);
            }elseif($request->has('terms') && $request->terms == "Edit"){
                session()->put('terms', $request->only('terms'));
                session()->put('step', 'designation');
                $route = route('index',['profile' => 'pending','step' => 'designation']);
            }
            session()->save();

            return response()->json(['status' => 'success', 'message' => 'Terms accepted successfully.', 'redirect' => $route]);
        }elseif(session('step') == "policy"){
            session()->put('policy', $request->only('policy'));
            session()->put('step', 'personal');
            session()->save();
            return response()->json(['status' => 'success', 'message' => 'Policy accepted successfully.', 'redirect' => route('index',['profile' => 'pending','step' => 'personal'])]);
        }elseif(session('step') == "personal"){
            session()->put('personal', $request->only('name','email','password','password_confirmation'));
            session()->save();
            $validationData = [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:6',
                'password_confirmation' => 'required|string|same:password',
                'aadhar_card_front_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'aadhar_card_back_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'pan_card_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ];

            if(isset($sessionData['designation']['role']) && $sessionData['designation']['role'] == "agent"){
                $validationData['utr_number'] = 'required';
                $validationData['payment_screenshot'] = 'required|image|mimes:jpg,jpeg,png|max:2048';
            }

            $request->validate($validationData);

            try {
                $sessionData = session()->all();
                $userData = [
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'username' => preg_replace('/[^a-zA-Z0-9]/', '', \Str::random(8)),
                    'password' => Hash::make($request->password),
                    'phone'    => $sessionData['phone'],
                    'utr_number' => $request->utr_number ?? ""
                ];

                $userData = array_merge($userData, $sessionData['designation'], $sessionData['address']);
                if($userData['role'] == "subscriber"){
                    $userData['plan_type'] = null;
                }

                $user = User::create($userData);
                if ($request->hasFile('payment_screenshot')) {
                    $path = $request->file('payment_screenshot')->store('payments', 'public');
                    $user->payment_screenshot = $path;
                }

                // upload for aadhar and pan card
                if ($request->hasFile('aadhar_card_front_file')) {
                    $path = $request->file('aadhar_card_front_file')->store('documents', 'public');
                    $user->aadhar_card_front_file = $path;
                }

                if ($request->hasFile('aadhar_card_back_file')) {
                    $path = $request->file('aadhar_card_back_file')->store('documents', 'public');
                    $user->aadhar_card_back_file = $path;
                }

                if ($request->hasFile('pan_card_file')) {
                    $path = $request->file('pan_card_file')->store('documents', 'public');
                    $user->pan_card_file = $path;
                }

                if ($request->hasFile('photo')) {
                    $file = $request->file('photo');
                    $filename = time().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path('uploads/users'), $filename);
                    $user->photo = $filename;
                }
                $user->save();                

                $user->assignRole($sessionData['designation']['role']);
                $this->storeActionLog(ActionType::REGISTER, $request->all(), 'User registered');
                sendLoginDetails($request->all());
                session()->forget(['otpsession_id', 'phone', 'otp','step','designation','address' ,'otpstatus','completeprofile', 'terms', 'policy','personal']);;
                session()->save();

                if(isset($sessionData['designation']['role']) && $sessionData['designation']['role'] == "agent"){
                    $user->status = "inactive";
                    $user->utr_number = $request->utr_number;
                    $user->save();
                }else{
                    Auth::loginUsingId($user->id);
                }

                $redirect = (session('post_property')) ? route('post.property.primarydetails') : route('post.property');
                return response()->json(['status' => 'success', 'message' => 'Account created successfully!', 'redirect' => $redirect]);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong.', 'redirect' => route('index',['profile' => 'pending','step' => 'personal'])]);
            }
        }
    }
}
