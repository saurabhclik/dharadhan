<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;
use App\Enums\ActionType;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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

        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) 
        {
            $credentials['email'] = $request->username;
            $user = User::where('email',$request->username)->first();
        } 
        else 
        {
            $credentials['phone'] = $request->username;
            $user = User::where('phone',$request->username)->first();
        }

        if($user && $user->status != 'active')
        {
            return response()->json(['status' => 'error', 'message' => 'Your registrion request is under approval process.']);
        }

        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) 
        {
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
        if (!$sessionId) 
        {
            return response()->json([
                'status' => 'error',
                'message' => 'OTP session expired. Please request a new OTP.'
            ]);
        }

        if(verifyOtp($sessionId, $request->otp))
        {
            try 
            {
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
            } 
            catch (\Exception $e) 
            {
                return response()->json(['status' => 'error', 'message' => 'Failed to create account.', 'error' => $e->getMessage()], 500);
            }
        }
        else
        {
            return response()->json(['status' => 'error', 'message' => 'OTP Verification failed']);
        }
    }

    public function logout(Request $request)
    {
        $this->storeActionLog(ActionType::LOGOUT, $request->all(), 'User logged out');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if($request->filled('redirectTo'))
        {
            return redirect()->route('index');
        }
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

    public function verifyOtp(Request $request)
    {
        $sessionId = session('otpsession_id');
        if (!$sessionId) 
        {
            return response()->json([
                'status' => 'error',
                'message' => 'OTP session expired. Please request a new OTP.'
            ]);
        }

        if (verifyOtp($sessionId, $request->otp)) 
        {
            if (session('post_property')) 
            {
                $request->merge(session('post_property'));
            }
            $user = User::where('phone', $request->input('phone'))->first();
            if ($user) 
            {
                $paymentPaid = Payment::where('user_id', $user->id)
                                ->where('status', 'paid')
                                ->exists();

                if ($paymentPaid) 
                {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Your registration request is under approval process.'
                    ]);
                }
                try 
                {

                    session()->put('completeprofile', 'pending');
                    session()->put('phone', $user->phone);
                    session()->put('otp', $request->otp);
                    session()->put('otpstatus', 'verified');
                    session()->put('step', 'designation');
                    session()->save();

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Continue completing your registration.',
                        'redirect' => route('index',['profile' => 'pending','step' => 'designation'])
                    ]);

                } 
                catch (\Exception $e) 
                {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Something went wrong. Please try again.',
                        'error' => $e->getMessage()
                    ], 500);
                }
            }
            try 
            {
                session()->put('completeprofile', 'pending');
                session()->put('phone', $request->phone);
                session()->put('otp', $request->otp);
                session()->put('otpstatus', 'verified');
                session()->put('step', 'designation');
                session()->save();

                return response()->json([
                    'status' => 'success',
                    'message' => 'We have verified your mobile number successfully. Please complete your profile after refresh page!',
                    'redirect' => route('index',['profile' => 'pending','step' => 'designation'])
                ]);

            } 
            catch (\Exception $e) 
            {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Something went wrong. Please try again.',
                    'error' => $e->getMessage()
                ], 500);
            }
        }
        return response()->json([
            'status' => 'error',
            'message' => 'OTP verification failed.'
        ]);
    }

    public function saveSignupData(Request $request)
    {
        if(session('step') == "designation")
        {
            session()->put('designation', $request->only('role','plan_type'));
            if($request->role == 'agent') 
            {
                try 
                {
                    $phone = session('phone');
                    if (!$phone) 
                    {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Session expired. Please start over.'
                        ]);
                    }
                    $uniqueId = $this->generateUniqueId();
                    
                    $user = User::where('phone', $phone)->first();
                    if (!$user) 
                    {
                        $user = User::create([
                            'phone' => $phone,
                            'username' => 'user_' . preg_replace('/[^a-zA-Z0-9]/', '', \Str::random(8)),
                            'name' => 'User_' . \Str::random(5),
                            'email' => 'temp_' . time() . '@temp.com',
                            'password' => Hash::make(\Str::random(16)),
                            'status' => 'inactive',
                            'plan_type' => $request->plan_type,
                            'plan_duration' => 'monthly',
                            'registration_step' => 'designation',
                            'unique_id' => $uniqueId
                        ]);
                        $user->assignRole('agent');
                    }
                    session()->put('temp_user_id', $user->id);
                    session()->save();
                    
                } 
                catch (\Exception $e) 
                {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Failed to create user account. Please try again.'
                    ]);
                }
            }
            
            session()->put('step', 'address');
            session()->save();
            
            return response()->json([
                'status' => 'success', 
                'message' => 'Designation information saved successfully.', 
                'redirect' => route('index',['profile' => 'pending','step' => 'address'])
            ]);
            
        } 
        elseif(session('step') == "address")
        {
            session()->put('address', $request->only('address','country','state','city','postal_code'));
            if (session()->has('temp_user_id')) 
            {
                $user = User::find(session('temp_user_id'));
                if ($user) 
                {
                    $user->update([
                        'address' => $request->address,
                        'state' => $request->state,
                        'city' => $request->city,
                        'postal_code' => $request->postal_code,
                        'registration_step' => 'address'
                    ]);
                }
            }
            
            session()->put('step', 'terms');
            session()->save();
            return response()->json([
                'status' => 'success', 
                'message' => 'Address information saved successfully.', 
                'redirect' => route('index',['profile' => 'pending','step' => 'terms'])
            ]);
            
        } 
        elseif(session('step') == "terms")
        {
            if($request->has('terms') && $request->terms == "Right")
            {
                session()->put('terms', $request->only('terms'));
                session()->put('step', 'policy');
                $route = route('index',['profile' => 'pending','step' => 'policy']);
            }
            elseif($request->has('terms') && $request->terms == "Wrong")
            {
                session()->put('terms', null);
                session()->put('step', 'designation');
                $route = route('index',['profile' => 'pending','step' => 'designation']);
            }
            elseif($request->has('terms') && $request->terms == "Edit")
            {
                session()->put('terms', $request->only('terms'));
                session()->put('step', 'designation');
                $route = route('index',['profile' => 'pending','step' => 'designation']);
            }
            session()->save();

            return response()->json(['status' => 'success', 'message' => 'Terms accepted successfully.', 'redirect' => $route]);
            
        } 
        elseif(session('step') == "policy")
        {
            session()->put('policy', $request->only('policy'));
            session()->put('step', 'personal');
            session()->save();
            return response()->json(['status' => 'success', 'message' => 'Policy accepted successfully.', 'redirect' => route('index',['profile' => 'pending','step' => 'personal'])]);
            
        } 
        elseif(session('step') == "personal")
        {
            session()->put('personal', $request->only('name','email','password','password_confirmation'));
            session()->save();
            $sessionData = session()->all();
            
            if(isset($sessionData['designation']['role']) && $sessionData['designation']['role'] == "agent")
            {
                $userId = session('temp_user_id');
                if (!$userId) 
                {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'User session expired. Please start over.'
                    ]);
                }
                $payment = Payment::where('user_id', $userId)
                            ->where('status', 'paid')
                            ->first();
                
                if (!$payment) 
                {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Please complete the payment before proceeding.'
                    ]);
                }
            }
            
            $validationData = [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users,email,' . ($sessionData['temp_user_id'] ?? 'NULL'),
                'password' => 'required|string|min:6',
                'password_confirmation' => 'required|string|same:password',
                'aadhar_card_front_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'aadhar_card_back_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'pan_card_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ];
            $request->validate($validationData);
            
            try 
            {
                $userId = session('temp_user_id');
                if ($userId) 
                {
                    $user = User::find($userId);
                } 
                else 
                {
                    $user = new User();
                    if (!$user->unique_id) 
                    {
                        $user->unique_id = $this->generateUniqueId();
                    }
                }
                
                $userData = [
                    'username' => $request->name,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $sessionData['phone'],
                    'plan_type' => $sessionData['designation']['plan_type'] ?? null,
                    'plan_duration' => 'yearly',
                    'address' => $sessionData['address']['address'] ?? null,
                    'state' => $sessionData['address']['state'] ?? null,
                    'city' => $sessionData['address']['city'] ?? null,
                    'postal_code' => $sessionData['address']['postal_code'] ?? null,
                    'registration_step' => 'completed'
                ];
                
                foreach ($userData as $key => $value) 
                {
                    $user->$key = $value;
                }
                
                if ($request->hasFile('aadhar_card_front_file')) 
                {
                    $path = $request->file('aadhar_card_front_file')->store('documents', 'public');
                    $user->aadhar_card_front_file = $path;
                }

                if ($request->hasFile('aadhar_card_back_file')) 
                {
                    $path = $request->file('aadhar_card_back_file')->store('documents', 'public');
                    $user->aadhar_card_back_file = $path;
                }

                if ($request->hasFile('pan_card_file')) 
                {
                    $path = $request->file('pan_card_file')->store('documents', 'public');
                    $user->pan_card_file = $path;
                }

                if ($request->hasFile('photo')) 
                {
                    $file = $request->file('photo');
                    $filename = time().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path('uploads/users'), $filename);
                    $user->photo = $filename;
                }

                $user->save();
                
                if (!$user->hasRole($sessionData['designation']['role'])) 
                {
                    $user->assignRole($sessionData['designation']['role']);
                }

                $isAgent = isset($sessionData['designation']['role']) && $sessionData['designation']['role'] == "agent";

                if ($isAgent) 
                {
                    $payment = Payment::where('user_id', $user->id)
                                ->where('status', 'paid')
                                ->latest()
                                ->first();
                    $crmRole = strtolower($sessionData['designation']['plan_type'] ?? 'ba');
                    $crmRequest = new Request([
                        'name' => $user->name,
                        'phone' => $user->phone,
                        'email' => $user->email,
                        'password' => $request->password,
                        'role' => $crmRole,
                        'unique_id' => $user->unique_id
                    ]);
                    
                    $this->registerInCrm($crmRequest, $user);
                    
                    if ($payment && $user->unique_id) 
                    {
                        $payment->save();
                    }
                }

                $this->storeActionLog(ActionType::REGISTER, $request->all(), 'User registered');
                sendLoginDetails($user->toArray());
                
                if(isset($sessionData['designation']['role']) && $sessionData['designation']['role'] == "agent")
                {
                    $user->status = "inactive";
                    $user->save();
                } 
                else 
                {
                    Auth::loginUsingId($user->id);
                }
                
                session()->forget(['otpsession_id', 'phone', 'otp', 'step', 'designation', 'address', 'otpstatus', 'completeprofile', 'terms', 'policy', 'personal', 'temp_user_id', 'temp_user_data']);
                session()->save();

                $redirect = (session('post_property')) ? route('post.property.primarydetails') : route('post.property');
                return response()->json([
                    'status' => 'success', 
                    'message' => 'Account created successfully!', 
                    'redirect' => $redirect
                ]);

            } 
            catch (\Exception $e) 
            {
                return response()->json([
                    'status' => 'error', 
                    'message' => 'Something went wrong: ' . $e->getMessage(), 
                    'redirect' => route('index',['profile' => 'pending','step' => 'personal'])
                ]);
            }
        }
    }

    private function generateUniqueId()
    {
        $prefix = 'DHR';
        $date = date('Ymd');
        $random = strtoupper(\Str::random(6));
        $uniqueId = $prefix . '_' . $date . '_' . $random;
        while (User::where('unique_id', $uniqueId)->exists()) 
        {
            $random = strtoupper(\Str::random(6));
            $uniqueId = $prefix . '_' . $date . '_' . $random;
        }
        
        return $uniqueId;
    }

    private function registerInCrm(Request $request, $user)
    {
        try 
        {
            $crmUrl = 'https://crm.dharadhan.com/api/crm/register';
            $crmToken = env('CRM_API_TOKEN', 'OXpROcBEl0JYqCO6XwW4');
            
            $crmData = [
                'name' => $request->name,
                'mobile' => $request->phone, 
                'email' => $request->email,
                'password' => $request->password, 
                'role' => $request->role,
                'unique_id' => $user->unique_id,
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $crmToken,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ])->post($crmUrl, $crmData);
            
            if ($response->successful()) 
            {
                $responseData = $response->json();
                if (isset($responseData['data']['id'])) 
                {
                    Log::info('CRM registration successful', [
                        'user_id' => $user->id,
                        'unique_id' => $user->unique_id,
                        'crm_response_id' => $responseData['data']['id'] ?? null
                    ]);
                }
            } 
            else 
            {
                Log::error('CRM registration failed', [
                    'user_id' => $user->id,
                    'unique_id' => $user->unique_id,
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
            }
        } 
        catch (\Exception $e) 
        {
            Log::error('CRM registration exception', [
                'user_id' => $user->id,
                'unique_id' => $user->unique_id,
                'error' => $e->getMessage()
            ]);
        }
    }
}
