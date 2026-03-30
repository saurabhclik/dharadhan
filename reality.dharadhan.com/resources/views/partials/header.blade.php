<section class="@if(request()->routeIs('index')) hero-section @else sub-hero-section @endif">
    <div class="hero-content container">
        @include('partials.navbar')
        @if (session()->has('completeprofile') && session('completeprofile') == 'pending' && request()->has('profile'))
            <div class="row pt-5">
                @if (session()->has('step') && (session('step') == 'designation' || (request()->has('step') && request()->get('step') == 'designation')))
                    @php
                        session()->put('step','designation');
                        session()->save();
                    @endphp 
                    
                    <div class="col-md-12 col-12 mb-5">
                        <div class="banner-inner premium-card" style="padding: 30px;">
                            <!-- Account Type Tabs -->
                            <div style="display: flex; gap: 20px; margin-bottom: 30px; background: #f8f9fa; padding: 10px; border-radius: 50px;">
                                <button type="button" class="tab-btn active" id="associateTabBtn" style="flex: 1; padding: 15px; border: none; border-radius: 40px; background: white; color: #B54F32; font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: pointer;" onclick="switchTab('associate')">
                                    <i class="fas fa-briefcase" style="margin-right: 8px;"></i> Associate
                                </button>
                                <button type="button" class="tab-btn" id="userTabBtn" style="flex: 1; padding: 15px; border: none; border-radius: 40px; background: transparent; color: #6c757d; font-weight: 600; cursor: pointer;" onclick="switchTab('user')">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i> User
                                </button>
                            </div>

                            <!-- Steps Progress Bar -->
                            <div style="margin-bottom: 30px; padding: 0 10px;">
                                <div style="display: flex; align-items: center; justify-content: space-between; position: relative;">
                                    <!-- Step 1 -->
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #B54F32; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold; box-shadow: 0 2px 8px rgba(181,79,50,0.3);">1</div>
                                        <div style="font-size: 0.75rem; color: #B54F32; font-weight: 600;">Account Type</div>
                                    </div>
                                    <!-- Step 2 -->
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #e9ecef; color: #6c757d; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;">2</div>
                                        <div style="font-size: 0.75rem; color: #6c757d;">Address</div>
                                    </div>
                                    <!-- Step 3 -->
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #e9ecef; color: #6c757d; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;">3</div>
                                        <div style="font-size: 0.75rem; color: #6c757d;">Personal</div>
                                    </div>
                                    <!-- Step 4 -->
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #e9ecef; color: #6c757d; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;">4</div>
                                        <div style="font-size: 0.75rem; color: #6c757d;">Terms</div>
                                    </div>
                                    <!-- Step 5 -->
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #e9ecef; color: #6c757d; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;">5</div>
                                        <div style="font-size: 0.75rem; color: #6c757d;">Policy</div>
                                    </div>
                                    <!-- Progress Line -->
                                    <div style="position: absolute; top: 20px; left: 0; right: 0; height: 2px; background: #e9ecef; z-index: 1;"></div>
                                    <div id="progressLine" style="position: absolute; top: 20px; left: 0; height: 2px; background: #B54F32; z-index: 1; transition: width 0.3s ease; width: 0%;"></div>
                                </div>
                            </div>

                            <div id="associateForm" style="display: block;">
                                <h5 style="color: #B54F32; font-size: 1.3rem; margin-bottom: 20px; font-weight: 600;">Associate Registration</h5>
                                <form class="ajax-form" action="{{ route('save.signup') }}" method="POST" data-step="designation">
                                    @csrf
                                    <input type="hidden" name="role" value="agent">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <label style="font-weight: 600; margin-bottom: 15px; display: block; color: #333;">Select Your Plan</label>
                                            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                                                @foreach (getPlans() as $key => $plan)
                                                <div class="plan-card" style="border: 2px solid #e9ecef; border-radius: 12px; padding: 20px; cursor: pointer; transition: all 0.3s; @if($loop->index == 0) border-color: #B54F32; background: rgba(16,60,59,0.02); @endif" onclick="selectPlan('{{ $key }}', this)">
                                                    <div style="text-align: center;">
                                                        <h4 style="font-size: 1.5rem; font-weight: 700; color: #B54F32; margin-bottom: 5px;">{{ $key }}</h4>
                                                        <p style="color: #6c757d; font-size: 0.9rem; margin-bottom: 10px;">{{ $plan['title'] }}</p>
                                                        <div style="margin: 15px 0;">
                                                            <span style="font-size: 2rem; font-weight: 700; color: #B54F32;">₹{{ number_format($plan['price']) }}</span>
                                                            <span style="color: #6c757d;">/year</span>
                                                        </div>
                                                        <div style="margin-bottom: 15px;">
                                                            <span style="text-decoration: line-through; color: #999;">₹{{ number_format($plan['mrp']) }}</span>
                                                            <span style="background: #28a745; color: white; padding: 2px 8px; border-radius: 12px; font-size: 0.75rem; margin-left: 8px;">Save {{ round((($plan['mrp'] - $plan['price'])/$plan['mrp'])*100) }}%</span>
                                                        </div>
                                                        <ul style="list-style: none; padding: 0; text-align: left;">
                                                            @foreach(array_slice($plan['benefits'], 0, 3) as $benefit)
                                                            <li style="margin-bottom: 8px; color: #6c757d;"><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i> {{ $benefit }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <select name="plan_type" id="plan_type" style="display: none;">
                                                @foreach (getPlans() as $key => $plan)
                                                    <option value="{{ $key }}" @if($loop->index == 0) selected @endif>{{ $key }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="submit-btn" style="width: 100%; padding: 15px; background: linear-gradient(135deg, #B54F32, #B54F32); color: white; border: none; border-radius: 50px; font-weight: 600; font-size: 1.1rem; cursor: pointer; transition: all 0.3s;">
                                                <span class="btn-text">Continue as Associate</span>
                                                <span class="spinner" style="display: none;"><i class="fas fa-spinner fa-spin"></i> Processing...</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div id="userForm" style="display: none;">
                                <h5 style="color: #B54F32; font-size: 1.3rem; margin-bottom: 20px; font-weight: 600;">User Registration</h5>
                                <form class="ajax-form" action="{{ route('save.signup') }}" method="POST" data-step="designation">
                                    @csrf
                                    <input type="hidden" name="role" value="subscriber">
                                    <input type="hidden" name="plan_type" value="free">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <div style="background: linear-gradient(135deg, #cf5d20, #f59c28); border-radius: 12px; padding: 30px; color: white; margin-bottom: 25px;">
                                                <i class="fas fa-hand-peace" style="font-size: 3rem; margin-bottom: 15px;"></i>
                                                <h3 style="margin-bottom: 10px; font-weight: 600;">Welcome, Property Seeker!</h3>
                                                <p style="opacity: 0.9; margin: 0;">Create a free account to explore thousands of properties</p>
                                            </div>
                                            
                                            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; margin-bottom: 25px;">
                                                <div style="background: #f8f9fa; border-radius: 10px; padding: 20px; text-align: center; transition: all 0.3s;">
                                                    <i class="fas fa-search" style="color: #B54F32; font-size: 1.5rem; margin-bottom: 10px;"></i>
                                                    <h4 style="font-size: 1rem; font-weight: 600; margin-bottom: 5px;">Advanced Search</h4>
                                                    <p style="color: #6c757d; font-size: 0.85rem; margin: 0;">Find exactly what you need</p>
                                                </div>
                                                <div style="background: #f8f9fa; border-radius: 10px; padding: 20px; text-align: center;">
                                                    <i class="fas fa-bookmark" style="color: #ffc107; font-size: 1.5rem; margin-bottom: 10px;"></i>
                                                    <h4 style="font-size: 1rem; font-weight: 600; margin-bottom: 5px;">Save Favorites</h4>
                                                    <p style="color: #6c757d; font-size: 0.85rem; margin: 0;">Bookmark properties</p>
                                                </div>
                                                <div style="background: #f8f9fa; border-radius: 10px; padding: 20px; text-align: center;">
                                                    <i class="fas fa-phone" style="color: #28a745; font-size: 1.5rem; margin-bottom: 10px;"></i>
                                                    <h4 style="font-size: 1rem; font-weight: 600; margin-bottom: 5px;">Direct Contact</h4>
                                                    <p style="color: #6c757d; font-size: 0.85rem; margin: 0;">Connect with experts </p>
                                                </div>
                                                <div style="background: #f8f9fa; border-radius: 10px; padding: 20px; text-align: center;">
                                                    <i class="fas fa-bell" style="color: #17a2b8; font-size: 1.5rem; margin-bottom: 10px;"></i>
                                                    <h4 style="font-size: 1rem; font-weight: 600; margin-bottom: 5px;">Smart Alerts</h4>
                                                    <p style="color: #6c757d; font-size: 0.85rem; margin: 0;">Get notifications</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="submit-btn" style="width: 100%; padding: 15px; background: linear-gradient(135deg, #e16a1a, #df5b13); color: white; border: none; border-radius: 50px; font-weight: 600; font-size: 1.1rem; cursor: pointer;">
                                                <span class="btn-text">Create Free User Account</span>
                                                <span class="spinner" style="display: none;"><i class="fas fa-spinner fa-spin"></i> Processing...</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                @elseif (session()->has('step') && (session('step') == 'address' || (request()->has('step') && request()->get('step') == 'address')))
                    @php
                        session()->put('step','address');
                        session()->save();
                    @endphp

                    <div class="col-md-12 col-12 mb-5">
                        <div class="banner-inner premium-card" style="padding: 30px;">
                            <!-- Account Type Tabs (Disabled) -->
                            <div style="display: flex; gap: 20px; margin-bottom: 30px; background: #f8f9fa; padding: 10px; border-radius: 50px; opacity: 0.6;">
                                <button type="button" class="tab-btn" style="flex: 1; padding: 15px; border: none; border-radius: 40px; background: white; color: #B54F32; font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: not-allowed;">
                                    <i class="fas fa-briefcase" style="margin-right: 8px;"></i> Associate
                                </button>
                                <button type="button" class="tab-btn" style="flex: 1; padding: 15px; border: none; border-radius: 40px; background: transparent; color: #6c757d; font-weight: 600; cursor: not-allowed;">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i> User
                                </button>
                            </div>

                            <!-- Steps Progress Bar -->
                            <div style="margin-bottom: 30px; padding: 0 10px;">
                                <div style="display: flex; align-items: center; justify-content: space-between; position: relative;">
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #B54F32; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;"><i class="fas fa-check"></i></div>
                                        <div style="font-size: 0.75rem; color: #B54F32; font-weight: 600;">Account Type</div>
                                    </div>
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #B54F32; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;">2</div>
                                        <div style="font-size: 0.75rem; color: #B54F32; font-weight: 600;">Address</div>
                                    </div>
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #e9ecef; color: #6c757d; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;">3</div>
                                        <div style="font-size: 0.75rem; color: #6c757d;">Personal</div>
                                    </div>
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #e9ecef; color: #6c757d; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;">4</div>
                                        <div style="font-size: 0.75rem; color: #6c757d;">Terms</div>
                                    </div>
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #e9ecef; color: #6c757d; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;">5</div>
                                        <div style="font-size: 0.75rem; color: #6c757d;">Policy</div>
                                    </div>
                                    <div style="position: absolute; top: 20px; left: 0; right: 0; height: 2px; background: #e9ecef; z-index: 1;"></div>
                                    <div style="position: absolute; top: 20px; left: 0; height: 2px; background: #B54F32; z-index: 1; width: 20%;"></div>
                                </div>
                            </div>

                            <h5 style="color: #B54F32; font-size: 1.3rem; margin-bottom: 20px; font-weight: 600;">Address Information</h5>
                            <form class="ajax-form" action="{{ route('save.signup') }}" method="POST" data-step="address">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label style="font-weight: 600; margin-bottom: 5px; color: #333;">Address <span style="color: #dc3545;">*</span></label>
                                            <input type="text" name="address" class="form-control" placeholder="Enter your full address" value="@if(session()->has('address.address')) {{ session('address.address') }} @endif" required style="padding: 12px; border: 2px solid #e9ecef; border-radius: 8px; width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3" style="display: none;">
                                        <div class="form-group">
                                            <label style="font-weight: 600; margin-bottom: 5px; color: #333;">Country</label>
                                            <select name="country" id="country" class="form-control" style="padding: 12px; border: 2px solid #e9ecef; border-radius: 8px; width: 100%;">
                                                <option value="">Select Country</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label style="font-weight: 600; margin-bottom: 5px; color: #333;">State <span style="color: #dc3545;">*</span></label>
                                            <select name="state" id="state" class="form-control" required style="padding: 12px; border: 2px solid #e9ecef; border-radius: 8px; width: 100%;">
                                                <option value="">Select State</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label style="font-weight: 600; margin-bottom: 5px; color: #333;">City <span style="color: #dc3545;">*</span></label>
                                            <select name="city" id="city" class="form-control" required style="padding: 12px; border: 2px solid #e9ecef; border-radius: 8px; width: 100%;">
                                                <option value="">Select City</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label style="font-weight: 600; margin-bottom: 5px; color: #333;">Postal Code <span style="color: #dc3545;">*</span></label>
                                            <input type="text" name="postal_code" class="form-control" placeholder="Enter postal code" value="@if(session()->has('address.postal_code')) {{ trim(session('address.postal_code')) }} @endif" required style="padding: 12px; border: 2px solid #e9ecef; border-radius: 8px; width: 100%;">
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <button type="submit" class="submit-btn" style="width: 100%; padding: 15px; background: linear-gradient(135deg, #B54F32, #B54F32); color: white; border: none; border-radius: 50px; font-weight: 600; font-size: 1.1rem; cursor: pointer;">
                                            <span class="btn-text">Save and Continue</span>
                                            <span class="spinner" style="display: none;"><i class="fas fa-spinner fa-spin"></i> Processing...</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                @elseif (session()->has('step') && (session('step') == 'personal' || (request()->has('step') && request()->get('step') == 'personal')))
                    @php
                        session()->put('step','personal');
                        session()->save();
                        $existingPayment = null;
                        if (session()->has('temp_user_id')) 
                        {
                            $existingPayment = App\Models\Payment::where('user_id', session('temp_user_id'))->where('status', 'paid')->first();
                        }
                    @endphp

                    <div class="col-md-12 col-12 mb-5">
                        <div class="banner-inner premium-card" style="padding: 30px;">
                            <!-- Account Type Tabs (Disabled) -->
                            <div style="display: flex; gap: 20px; margin-bottom: 30px; background: #f8f9fa; padding: 10px; border-radius: 50px; opacity: 0.6;">
                                <button type="button" class="tab-btn" style="flex: 1; padding: 15px; border: none; border-radius: 40px; background: white; color: #B54F32; font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: not-allowed;">
                                    <i class="fas fa-briefcase" style="margin-right: 8px;"></i> Associate
                                </button>
                                <button type="button" class="tab-btn" style="flex: 1; padding: 15px; border: none; border-radius: 40px; background: transparent; color: #6c757d; font-weight: 600; cursor: not-allowed;">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i> User
                                </button>
                            </div>

                            <!-- Steps Progress Bar -->
                            <div style="margin-bottom: 30px; padding: 0 10px;">
                                <div style="display: flex; align-items: center; justify-content: space-between; position: relative;">
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #B54F32; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;"><i class="fas fa-check"></i></div>
                                        <div style="font-size: 0.75rem; color: #B54F32; font-weight: 600;">Account Type</div>
                                    </div>
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #B54F32; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;"><i class="fas fa-check"></i></div>
                                        <div style="font-size: 0.75rem; color: #B54F32; font-weight: 600;">Address</div>
                                    </div>
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #B54F32; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;">3</div>
                                        <div style="font-size: 0.75rem; color: #B54F32; font-weight: 600;">Personal</div>
                                    </div>
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #e9ecef; color: #6c757d; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;">4</div>
                                        <div style="font-size: 0.75rem; color: #6c757d;">Terms</div>
                                    </div>
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #e9ecef; color: #6c757d; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;">5</div>
                                        <div style="font-size: 0.75rem; color: #6c757d;">Policy</div>
                                    </div>
                                    <div style="position: absolute; top: 20px; left: 0; right: 0; height: 2px; background: #e9ecef; z-index: 1;"></div>
                                    <div style="position: absolute; top: 20px; left: 0; height: 2px; background: #B54F32; z-index: 1; width: 40%;"></div>
                                </div>
                            </div>

                            <h5 style="color: #B54F32; font-size: 1.3rem; margin-bottom: 20px; font-weight: 600;">Personal Information & Documents</h5>
                            <form class="ajax-form" action="{{ route('save.signup') }}" method="POST" data-step="personal" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    @if(session()->has('designation.plan_type') && session()->has('designation.role') && session()->get('designation.role') == "agent")
                                    <div class="col-12 mt-4">
                                        <div id="agent-payment" style="display: block; padding: 20px; background: #f8f9fa; border-radius: 12px; border: 1px solid #e9ecef;">
                                            <h6 style="color: #B54F32; font-size: 1.1rem; margin-bottom: 15px; font-weight: 600;">
                                                <i class="fas fa-credit-card" style="margin-right: 8px;"></i> Complete Payment
                                            </h6>
                                            
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="online" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-6 text-center mb-4">
                                                            @php
                                                                $planPrice = 0;
                                                                $planType = session()->get('designation.plan_type', 'basic');
                                                                $planDetails = getPlan($planType);
                                                                $planPrice = $planDetails['price'] ?? 0;
                                                            @endphp
                                                            
                                                            @if($existingPayment)
                                                                <div class="alert alert-success">
                                                                    <i class="fas fa-check-circle"></i> Payment Completed!
                                                                    <br><small>Payment ID: {{ $existingPayment->razorpay_payment_id }}</small>
                                                                </div>
                                                            @else
                                                                <h4 class="text-primary">₹{{ number_format($planPrice) }}</h4>
                                                                <p class="text-muted">{{ ucfirst($planType) }} Plan (Year)</p>
                                                            @endif
                                                        </div>
                                                        
                                                        @unless($existingPayment)
                                                            <div class="col-3">
                                                                <button type="button" class="btn btn-sm shadow-sm" id="payWithRazorpayBtn"
                                                                style="background: linear-gradient(135deg, #B54F32, #B54F32); color: white; border: none; padding: 15px; border-radius: 50px; font-weight: 600;">
                                                                    <i class="fas fa-lock me-2"></i>Pay Now (₹{{ number_format($planPrice) }})
                                                                </button>
                                                            </div>
                                                        @endunless
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    <div class="col-12 mb-4">
                                        <h6 style="color: #B54F32; font-size: 1.1rem; margin-bottom: 15px; font-weight: 600; border-bottom: 2px solid #e9ecef; padding-bottom: 10px;">
                                            <i class="fas fa-user-circle" style="margin-right: 8px;"></i> Basic Information
                                        </h6>
                                    </div>
                                    
                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label style="font-weight: 600; margin-bottom: 5px; color: #333;">Full Name <span style="color: #dc3545;">*</span></label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter your full name" value="@if(session()->has('personal.name')) {{ session('personal.name') }} @endif" required style="padding: 12px; border: 2px solid #e9ecef; border-radius: 8px; width: 100%;">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label style="font-weight: 600; margin-bottom: 5px; color: #333;">Email <span style="color: #dc3545;">*</span></label>
                                            <input type="email" name="email" class="form-control" placeholder="Enter your email" value="@if(session()->has('personal.email')) {{ session('personal.email') }} @endif" required style="padding: 12px; border: 2px solid #e9ecef; border-radius: 8px; width: 100%;">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label style="font-weight: 600; margin-bottom: 5px; color: #333;">Password <span style="color: #dc3545;">*</span></label>
                                            <input type="password" name="password" class="form-control" placeholder="Enter password" required style="padding: 12px; border: 2px solid #e9ecef; border-radius: 8px; width: 100%;">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label style="font-weight: 600; margin-bottom: 5px; color: #333;">Confirm Password <span style="color: #dc3545;">*</span></label>
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required style="padding: 12px; border: 2px solid #e9ecef; border-radius: 8px; width: 100%;">
                                        </div>
                                    </div>

                                    <!-- Document Upload Section -->
                                    <div class="col-12 mt-4 mb-4">
                                        <h6 style="color: #B54F32; font-size: 1.1rem; margin-bottom: 15px; font-weight: 600; border-bottom: 2px solid #e9ecef; padding-bottom: 10px;">
                                            <i class="fas fa-file-upload" style="margin-right: 8px;"></i> Document Upload <span style="color: #dc3545; font-size: 0.9rem;">(All fields are required)</span>
                                        </h6>
                                        <p style="color: #6c757d; font-size: 0.9rem; margin-bottom: 20px;">Please upload clear images of your documents (JPG, PNG only)</p>
                                    </div>

                                    <!-- Passport Photo -->
                                    <div class="col-md-3 col-6 mb-4">
                                        <div class="doc-card" style="border: 2px dashed #e9ecef; border-radius: 12px; padding: 15px; text-align: center; cursor: pointer; transition: all 0.3s; height: 100%;" onclick="document.getElementById('photoInput').click();">
                                            <div class="doc-preview mb-2">
                                                <img id="photoPreview" src="{{ asset('v2/images/photo.png') }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%; border: 3px solid #B54F32;">
                                            </div>
                                            <div class="doc-info">
                                                <h6 style="font-weight: 600; margin-bottom: 5px;">Passport Photo <span style="color: #dc3545;">*</span></h6>
                                                <p style="font-size: 0.8rem; color: #6c757d; margin-bottom: 5px;">Clear face, white background</p>
                                                <span style="font-size: 0.75rem; color: #B54F32;">Click to upload</span>
                                            </div>
                                            <input type="file" name="photo" id="photoInput" accept="image/*" style="display: none;" required onchange="previewImage(this, 'photoPreview')">
                                        </div>
                                    </div>

                                    <!-- PAN Card -->
                                    <div class="col-md-3 col-6 mb-4">
                                        <div class="doc-card" style="border: 2px dashed #e9ecef; border-radius: 12px; padding: 15px; text-align: center; cursor: pointer; transition: all 0.3s; height: 100%;" onclick="document.getElementById('panInput').click();">
                                            <div class="doc-preview mb-2">
                                                <img id="panPreview" src="{{ asset('v2/images/pan.png') }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                                            </div>
                                            <div class="doc-info">
                                                <h6 style="font-weight: 600; margin-bottom: 5px;">PAN Card <span style="color: #dc3545;">*</span></h6>
                                                <p style="font-size: 0.8rem; color: #6c757d; margin-bottom: 5px;">Front side only</p>
                                                <span style="font-size: 0.75rem; color: #B54F32;">Click to upload</span>
                                            </div>
                                            <input type="file" name="pan_card_file" id="panInput" accept="image/*" style="display: none;" required onchange="previewImage(this, 'panPreview')">
                                        </div>
                                    </div>

                                    <!-- Aadhar Front -->
                                    <div class="col-md-3 col-6 mb-4">
                                        <div class="doc-card" style="border: 2px dashed #e9ecef; border-radius: 12px; padding: 15px; text-align: center; cursor: pointer; transition: all 0.3s; height: 100%;" onclick="document.getElementById('aadharFrontInput').click();">
                                            <div class="doc-preview mb-2">
                                                <img id="aadharFrontPreview" src="{{ asset('v2/images/aadhar-front.png') }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                                            </div>
                                            <div class="doc-info">
                                                <h6 style="font-weight: 600; margin-bottom: 5px;">Aadhar Front <span style="color: #dc3545;">*</span></h6>
                                                <p style="font-size: 0.8rem; color: #6c757d; margin-bottom: 5px;">Clear & readable</p>
                                                <span style="font-size: 0.75rem; color: #B54F32;">Click to upload</span>
                                            </div>
                                            <input type="file" name="aadhar_card_front_file" id="aadharFrontInput" accept="image/*" style="display: none;" required onchange="previewImage(this, 'aadharFrontPreview')">
                                        </div>
                                    </div>

                                    <!-- Aadhar Back -->
                                    <div class="col-md-3 col-6 mb-4">
                                        <div class="doc-card" style="border: 2px dashed #e9ecef; border-radius: 12px; padding: 15px; text-align: center; cursor: pointer; transition: all 0.3s; height: 100%;" onclick="document.getElementById('aadharBackInput').click();">
                                            <div class="doc-preview mb-2">
                                                <img id="aadharBackPreview" src="{{ asset('v2/images/aadhar-back.png') }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                                            </div>
                                            <div class="doc-info">
                                                <h6 style="font-weight: 600; margin-bottom: 5px;">Aadhar Back <span style="color: #dc3545;">*</span></h6>
                                                <p style="font-size: 0.8rem; color: #6c757d; margin-bottom: 5px;">Address visible</p>
                                                <span style="font-size: 0.75rem; color: #B54F32;">Click to upload</span>
                                            </div>
                                            <input type="file" name="aadhar_card_back_file" id="aadharBackInput" accept="image/*" style="display: none;" required onchange="previewImage(this, 'aadharBackPreview')">
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4" id="paymentWrapper">
                                        <button type="submit"
                                            class="submit-btn 
                                            @if(session()->has('designation.role') && session('designation.role') == 'agent' && !$existingPayment) 
                                                un_paid 
                                            @else 
                                                is_paid 
                                            @endif"
                                            id="saveUserFormData"
                                            style="width: 100%; padding: 15px; background: linear-gradient(135deg, #B54F32, #B54F32); color: white; border: none; border-radius: 50px; font-weight: 600; font-size: 1.1rem; cursor: pointer; transition: all 0.3s;"
                                            
                                            @if(session()->has('designation.role') && session('designation.role') == 'agent' && !$existingPayment)
                                                disabled
                                            @endif
                                        >
                                            <span class="btn-text">
                                                @if(session()->has('designation.role') && session('designation.role') == 'agent' && !$existingPayment)
                                                    Complete Payment First
                                                @else
                                                    Save and Continue
                                                @endif
                                            </span>

                                            <span class="spinner" style="display: none;">
                                                <i class="fas fa-spinner fa-spin"></i> Processing...
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                @elseif (session()->has('step') && (session('step') == 'terms' || (request()->has('step') && request()->get('step') == 'terms')))
                    @php
                        session()->put('step','terms');
                        session()->save();
                    @endphp
                    
                    <div class="col-md-12 col-12 mb-5">
                        <div class="banner-inner premium-card" style="padding: 30px;">
                            <!-- Account Type Tabs (Disabled) -->
                            <div style="display: flex; gap: 20px; margin-bottom: 30px; background: #f8f9fa; padding: 10px; border-radius: 50px; opacity: 0.6;">
                                <button type="button" class="tab-btn" style="flex: 1; padding: 15px; border: none; border-radius: 40px; background: white; color: #B54F32; font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: not-allowed;">
                                    <i class="fas fa-briefcase" style="margin-right: 8px;"></i> Associate
                                </button>
                                <button type="button" class="tab-btn" style="flex: 1; padding: 15px; border: none; border-radius: 40px; background: transparent; color: #6c757d; font-weight: 600; cursor: not-allowed;">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i> User
                                </button>
                            </div>

                            <!-- Steps Progress Bar -->
                            <div style="margin-bottom: 30px; padding: 0 10px;">
                                <div style="display: flex; align-items: center; justify-content: space-between; position: relative;">
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #B54F32; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;"><i class="fas fa-check"></i></div>
                                        <div style="font-size: 0.75rem; color: #B54F32; font-weight: 600;">Account Type</div>
                                    </div>
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #B54F32; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;"><i class="fas fa-check"></i></div>
                                        <div style="font-size: 0.75rem; color: #B54F32; font-weight: 600;">Address</div>
                                    </div>
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #B54F32; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;"><i class="fas fa-check"></i></div>
                                        <div style="font-size: 0.75rem; color: #B54F32; font-weight: 600;">Personal</div>
                                    </div>
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #B54F32; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;">4</div>
                                        <div style="font-size: 0.75rem; color: #B54F32; font-weight: 600;">Terms</div>
                                    </div>
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #e9ecef; color: #6c757d; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;">5</div>
                                        <div style="font-size: 0.75rem; color: #6c757d;">Policy</div>
                                    </div>
                                    <div style="position: absolute; top: 20px; left: 0; right: 0; height: 2px; background: #e9ecef; z-index: 1;"></div>
                                    <div style="position: absolute; top: 20px; left: 0; height: 2px; background: #B54F32; z-index: 1; width: 80%;"></div>
                                </div>
                            </div>

                            <h5 style="color: #B54F32; font-size: 1.3rem; margin-bottom: 20px; font-weight: 600;">Please Review your Information</h5>
                            <form class="ajax-form" action="{{ route('save.signup') }}" method="POST" data-step="terms">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 mb-4">
                                        <div style="background: #f8f9fa; border-radius: 12px; padding: 20px;">
                                            <div style="margin-bottom: 15px;">
                                                <div style="display: flex; align-items: center; gap: 10px; padding: 15px; border: 2px solid #e9ecef; border-radius: 8px; margin-bottom: 10px; transition: all 0.3s; hover:border-color: #B54F32;">
                                                    <input type="radio" name="terms" value="Edit" id="editTermsCheck" required @if(session()->has('terms') && session('terms') == 'Edit') checked @endif style="width: 18px; height: 18px; accent-color: #B54F32;">
                                                    <label for="editTermsCheck" style="color: #333; cursor: pointer; flex: 1; font-weight: 500;">Edit - I want to make changes</label>
                                                </div>
                                                
                                                <div style="display: flex; align-items: center; gap: 10px; padding: 15px; border: 2px solid #e9ecef; border-radius: 8px; margin-bottom: 10px;">
                                                    <input type="radio" name="terms" value="Right" id="termsCheck" required @if(session()->has('terms') && session('terms') == 'Right') checked @endif style="width: 18px; height: 18px; accent-color: #B54F32;">
                                                    <label for="termsCheck" style="color: #333; cursor: pointer; flex: 1; font-weight: 500;">Right - All information is correct</label>
                                                </div>
                                                
                                                <div style="display: flex; align-items: center; gap: 10px; padding: 15px; border: 2px solid #e9ecef; border-radius: 8px;">
                                                    <input type="radio" name="terms" value="Wrong" id="privacyCheck" required @if(session()->has('terms') && session('terms') == 'Wrong') checked @endif style="width: 18px; height: 18px; accent-color: #B54F32;">
                                                    <label for="privacyCheck" style="color: #333; cursor: pointer; flex: 1; font-weight: 500;">Wrong - Information needs correction</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 mt-3">
                                        <button type="submit" class="submit-btn" style="width: 100%; padding: 15px; background: linear-gradient(135deg, #B54F32, #B54F32); color: white; border: none; border-radius: 50px; font-weight: 600; font-size: 1.1rem; cursor: pointer;">
                                            <span class="btn-text">OK, I Agree</span>
                                            <span class="spinner" style="display: none;"><i class="fas fa-spinner fa-spin"></i> Processing...</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                @elseif (session()->has('step') && (session('step') == 'policy' || (request()->has('step') && request()->get('step') == 'policy')))
                    @php
                        session()->put('step','policy');
                        session()->save();
                    @endphp

                    <div class="col-md-12 col-12 mb-5">
                        <div class="banner-inner premium-card" style="padding: 30px;">
                            <!-- Account Type Tabs (Disabled) -->
                            <div style="display: flex; gap: 20px; margin-bottom: 30px; background: #f8f9fa; padding: 10px; border-radius: 50px; opacity: 0.6;">
                                <button type="button" class="tab-btn" style="flex: 1; padding: 15px; border: none; border-radius: 40px; background: white; color: #B54F32; font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: not-allowed;">
                                    <i class="fas fa-briefcase" style="margin-right: 8px;"></i> Associate
                                </button>
                                <button type="button" class="tab-btn" style="flex: 1; padding: 15px; border: none; border-radius: 40px; background: transparent; color: #6c757d; font-weight: 600; cursor: not-allowed;">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i> User
                                </button>
                            </div>

                            <!-- Steps Progress Bar -->
                            <div style="margin-bottom: 30px; padding: 0 10px;">
                                <div style="display: flex; align-items: center; justify-content: space-between; position: relative;">
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #B54F32; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;"><i class="fas fa-check"></i></div>
                                        <div style="font-size: 0.75rem; color: #B54F32; font-weight: 600;">Account Type</div>
                                    </div>
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #B54F32; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;"><i class="fas fa-check"></i></div>
                                        <div style="font-size: 0.75rem; color: #B54F32; font-weight: 600;">Address</div>
                                    </div>
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #B54F32; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;"><i class="fas fa-check"></i></div>
                                        <div style="font-size: 0.75rem; color: #B54F32; font-weight: 600;">Personal</div>
                                    </div>
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #B54F32; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;"><i class="fas fa-check"></i></div>
                                        <div style="font-size: 0.75rem; color: #B54F32; font-weight: 600;">Terms</div>
                                    </div>
                                    <div style="text-align: center; position: relative; z-index: 2; flex: 1;">
                                        <div style="width: 40px; height: 40px; background: #B54F32; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px; font-weight: bold;">5</div>
                                        <div style="font-size: 0.75rem; color: #B54F32; font-weight: 600;">Policy</div>
                                    </div>
                                    <div style="position: absolute; top: 20px; left: 0; right: 0; height: 2px; background: #e9ecef; z-index: 1;"></div>
                                    <div style="position: absolute; top: 20px; left: 0; height: 2px; background: #B54F32; z-index: 1; width: 100%;"></div>
                                </div>
                            </div>

                            <h5 style="color: #B54F32; font-size: 1.3rem; margin-bottom: 20px; font-weight: 600;">Policy Information</h5>
                            <form class="ajax-form" action="{{ route('save.signup') }}" method="POST" data-step="policy">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 mb-4">
                                        <div style="background: #f8f9fa; border-radius: 12px; padding: 20px;">
                                            <div style="display: flex; align-items: center; gap: 15px; padding: 20px; border: 2px solid #e9ecef; border-radius: 8px;">
                                                <input type="checkbox" name="policy" value="1" id="policyCheck" required @if(session()->has('policy') && session('policy') == '1') checked @endif style="width: 20px; height: 20px; accent-color: #B54F32;">
                                                <label for="policyCheck" style="color: #333; cursor: pointer; flex: 1; font-size: 1rem;">
                                                    I agree to the <a href="{{ route('privacy.policy') }}" target="_blank" style="color: #B54F32; font-weight: 600; text-decoration: underline;">Privacy Policy</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 mt-3">
                                        <button type="submit" class="submit-btn" style="width: 100%; padding: 15px; background: linear-gradient(135deg, #B54F32, #B54F32); color: white; border: none; border-radius: 50px; font-weight: 600; font-size: 1.1rem; cursor: pointer;">
                                            <span class="btn-text">OK, I Agree</span>
                                            <span class="spinner" style="display: none;"><i class="fas fa-spinner fa-spin"></i> Processing...</span>
                                        </button>
                                        <a href="{{ route('index') }}" style="display: block; text-align: center; margin-top: 20px; color: #6c757d; text-decoration: none; font-size: 0.9rem;">Click here to go back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        @else
            @if(request()->routeIs('index'))
                <!-- Hero Text -->
                <div class="hero-text">
                    <div class="hero-heading-section">
                        <h1>Find Your Perfect Property<br>in Jaipur</h1>
                        <p class="subtitle">Buy, Rent & Sell Residential and Commercial Properties</p>
                    </div>
                    <div class="hero-buttons">
                        @guest
                            <button class="btn btn-primary" onclick="$('#authModal').modal('show'); showRegister();">Get Started</button>
                        @endguest
                        <a href="{{ route('properties') }}" class="btn btn-secondary">Explore Properties</a>
                    </div>
                </div>
            @endif
        @endif
    </div>
</section>
@include('components.razorpay-modal')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    .plan-card 
    {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .plan-card:hover 
    {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .plan-card.selected {
        border-color: #B54F32 !important;
        background: rgba(16,60,59,0.02);
    }
    .doc-card {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .doc-card:hover {
        border-color: #B54F32 !important;
        background-color: rgba(16,60,59,0.02);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .submit-btn {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .submit-btn:hover:not(:disabled) 
    {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .submit-btn:disabled 
    {
        opacity: 0.6;
        cursor: not-allowed;
    }

    .form-control 
    {
        transition: all 0.3s ease;
    }
    
    .form-control:focus 
    {
        border-color: #B54F32 !important;
        outline: none;
        box-shadow: 0 0 0 3px rgba(16,60,59,0.1);
    }
    
    .premium-card 
    {
        transition: all 0.3s ease;
    }
    
    .premium-card:hover 
    {
        transform: translateY(-5px);
        box-shadow: 0 20px 30px rgba(0,0,0,0.1);
    }

    .tab-btn 
    {
        transition: all 0.3s ease;
    }
    
    .tab-btn:hover 
    {
        background: rgba(255,255,255,0.8) !important;
    }

    .error-message 
    {
        color: #dc3545;
        font-size: 0.8rem;
        margin-top: 5px;
    }
    .toast-success 
    {
        background-color: #B54F32 !important;
    }
    
    .toast-error 
    {
        background-color: #dc3545 !important;
    }

    .progress-step 
    {
        transition: all 0.3s ease;
    }

    @media (max-width: 768px) 
    {
        .plan-grid 
        {
            grid-template-columns: 1fr !important;
        }
        
        .doc-card 
        {
            margin-bottom: 15px;
        }
        
        .tab-btn 
        {
            padding: 12px !important;
            font-size: 0.9rem !important;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    $(document).ready(function() 
    {
        if($('#country').length) 
        {
            $.get('/countries', function(data) 
            {
                let $country = $('#country');
                $country.empty().append('<option value="">Select Country</option>');
                
                $.each(data, function(i, country) 
                {
                    $country.append('<option value="' + country.id + '">' + country.country_name + '</option>');
                });
                if (data.length > 0) 
                {
                    $country.val(data[0].id);
                    $country.trigger('change');
                }
            }).fail(function() 
            {
                toastr.error('Failed to load location data');
            });
        }

        $('#country').on('change', function() 
        {
            let countryId = $(this).val();
            if (!countryId) 
            {
                $('#state').html('<option value="">Select State</option>');
                $('#city').html('<option value="">Select City</option>');
                return;
            }
            
            $('#state').html('<option value="">Loading...</option>');
            $('#city').html('<option value="">Select City</option>');

            $.get('/states/' + countryId, function(data) 
            {
                $('#state').html('<option value="">Select State</option>');
                $.each(data, function(i, state) 
                {
                    $('#state').append('<option value="' + state.id + '">' + state.state + '</option>');
                });
            }).fail(function() 
            {
                $('#state').html('<option value="">Error loading states</option>');
                toastr.error('Failed to load states');
            });
        });

        $('#state').on('change', function()
        {
            let stateId = $(this).val();
            if (!stateId) 
            {
                $('#city').html('<option value="">Select City</option>');
                return;
            }

            $('#city').html('<option value="">Loading...</option>');

            $.get('/cities/' + stateId, function(data) 
            {
                $('#city').html('<option value="">Select City</option>');
                $.each(data, function(i, city) 
                {
                    $('#city').append('<option value="' + city.id + '">' + city.city + '</option>');
                });
            }).fail(function() 
            {
                $('#city').html('<option value="">Error loading cities</option>');
                toastr.error('Failed to load cities');
            });
        });

        $('.ajax-form').on('submit', function(e) 
        {
            e.preventDefault();
            var form = $(this);
            var submitBtn = form.find('.submit-btn');
            var btnText = submitBtn.find('.btn-text');
            var spinner = submitBtn.find('.spinner');
            var formData = new FormData(this);
            if (submitBtn.prop('disabled')) 
            {
                toastr.error('Please complete payment first');
                return false;
            }
            
            submitBtn.prop('disabled', true);
            btnText.hide();
            spinner.show();
            
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) 
                {
                    if (response.status === 'success') 
                    {
                        toastr.success(response.message);
                        if (response.redirect) 
                        {
                            setTimeout(function() 
                            {
                                window.location.href = response.redirect;
                            }, 1000);
                        }
                    } 
                    else 
                    {
                        toastr.error(response.message || 'Something went wrong!');
                        submitBtn.prop('disabled', false);
                        btnText.show();
                        spinner.hide();
                    }
                },
                error: function(xhr) 
                {
                    if (xhr.status === 422) 
                    {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) 
                        {
                            toastr.error(value[0]);
                        });
                    } 
                    else 
                    {
                        toastr.error('Server error occurred. Please try again.');
                    }
                    submitBtn.prop('disabled', false);
                    btnText.show();
                    spinner.hide();
                }
            });
        });

        $('#payment_screenshot').on('change', function() 
        {
            const file = this.files[0];
            if (file) 
            {
                const reader = new FileReader();
                reader.onload = function(e) 
                {
                    $('#preview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            }
        });
    });

    function switchTab(tab) 
    {
        const associateForm = document.getElementById('associateForm');
        const userForm = document.getElementById('userForm');
        const associateBtn = document.getElementById('associateTabBtn');
        const userBtn = document.getElementById('userTabBtn');
        if (tab === 'associate') 
        {
            associateForm.style.display = 'block';
            userForm.style.display = 'none';
            associateBtn.style.background = 'white';
            associateBtn.style.color = '#B54F32';
            associateBtn.style.boxShadow = '0 2px 8px rgba(0,0,0,0.1)';
            userBtn.style.background = 'transparent';
            userBtn.style.color = '#6c757d';
            userBtn.style.boxShadow = 'none';
        } 
        else 
        {
            associateForm.style.display = 'none';
            userForm.style.display = 'block';
            userBtn.style.background = 'white';
            userBtn.style.color = '#B54F32';
            userBtn.style.boxShadow = '0 2px 8px rgba(0,0,0,0.1)';
            associateBtn.style.background = 'transparent';
            associateBtn.style.color = '#6c757d';
            associateBtn.style.boxShadow = 'none';
        }
    }

    function selectPlan(planKey, element) 
    {
        document.getElementById('plan_type').value = planKey;
        document.querySelectorAll('.plan-card').forEach(card => {
            card.style.borderColor = '#e9ecef';
            card.style.background = 'white';
            card.classList.remove('selected');
        });
        element.style.borderColor = '#B54F32';
        element.style.background = 'rgba(16,60,59,0.02)';
        element.classList.add('selected');
    }

    function previewImage(input, previewId) 
    {
        if (input.files && input.files[0]) 
        {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
                var preview = document.getElementById(previewId);
                preview.style.transform = 'scale(1.1)';
                setTimeout(function() 
                {
                    preview.style.transform = 'scale(1)';
                }, 200);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    @if(session()->has('designation.plan_type') && session()->has('designation.role') && session()->get('designation.role') == "agent")
        $(document).ready(function() 
        {
            $('#payWithRazorpayBtn').on('click', function() 
            {
                const amount = {{ getPlan(session()->get('designation.plan_type'))['price'] }};
                const planType = '{{ session()->get('designation.plan_type') }}';
                const planDuration = 'monthly';
                
                $(this).prop('disabled', true);
                $(this).html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                
                initializePayment(amount, planType, planDuration)
                    .then(() => {
                        $('#razorpayModal').modal('show');
                        $('#payWithRazorpayBtn').prop('disabled', false);
                        $('#payWithRazorpayBtn').html('<i class="fas fa-lock me-2"></i>Pay Now (₹' + amount + ')');
                    })
                    .catch(() => {
                        $('#payWithRazorpayBtn').prop('disabled', false);
                        $('#payWithRazorpayBtn').html('<i class="fas fa-lock me-2"></i>Pay Now (₹' + amount + ')');
                    });
            });
        });

        function checkPaymentStatus() 
        {
            $.ajax({
                url: '{{ route("payment.check.status") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) 
                {
                    if (response.status === 'paid') 
                    {
                        $('#saveUserFormData').prop('disabled', false);
                        $('#saveUserFormData').removeClass('un_paid').addClass('is_paid');
                        $('#saveUserFormData .btn-text').text('Save and Continue');
                    }
                }
            });
        }
        setInterval(checkPaymentStatus, 1000);
    @endif
    document.getElementById("paymentWrapper").addEventListener("mouseenter", function () 
    {
        let btn = document.getElementById("saveUserFormData");
        if(btn.classList.contains("un_paid"))
        {
            toastr.error('Payment not completed. Please complete your payment first.');
        }
    });
</script>
@endpush