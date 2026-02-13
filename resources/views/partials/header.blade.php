<!-- Hero Section -->
<section class="@if(request()->routeIs('index')) hero-section @else sub-hero-section @endif">
    <div class="hero-content container">
        <!-- Navigation -->
        @include('partials.navbar')
        @if (session()->has('completeprofile') && session('completeprofile') == 'pending' && request()->has('profile'))
            <div class="row pt-5">
                @if (session()->has('step') && (session('step') == 'designation' || (request()->has('step') && request()->get('step') == 'designation')))
                    @php
                        session()->put('step','designation');
                        session()->save();
                    @endphp

                    {{-- designation step --}}
                    <div class="col-md-4 col-12 mb-5">
                        <div class="banner-inner premium-card">
                            <h1 class="title">Complete Your Profile</h1>
                            <p class="sub-title">Enter Your Designation details</p>
                            <p class="sub-title">Complete your profile for a better experience</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-12 mb-5">
                        <div class="banner-inner premium-card">
                            <h5 class="sub-title">Designation Information</h5>
                            <form action="{{ route('save.signup') }}" id="saveRoleForm" method="POST">
                                <div class="password-section ui-elements">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <select name="role" id="roleSelect" class="w-full">
                                                    <option value="agent" selected>Associate</option>
                                                    <option value="subscriber">User</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- PLAN BLOCK -->
                                        <div class="col-sm-12 mb-4" id="agentPlans">
                                            <div class="form-group">
                                                <select name="plan_type" id="plan_type" class="w-full">
                                                    @foreach (getPlans() as $key => $plan)
                                                        <option class="plan-item" value="{{ $key }}" @if($loop->index == 0) selected @endif>
                                                            <div class="plan-box">
                                                                <h4>{{$key}} - {{ $plan['title'] }}</h4>
                                                            </div>
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="plan-details mt-4">
                                                <h3 id="planTitle"></h3>

                                                <div class="price-box">
                                                    <span class="mrp" id="planMrp"></span>
                                                    <span class="price" id="planPrice"></span>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <h4>Benefits</h4>
                                                        <ul id="planBenefits"></ul>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <h4>Powers</h4>
                                                        <ul id="planPowers"></ul>
                                                    </div>
                                                </div>
                                                <div class="addons-section mt-4">
                                                    <div id="planAddons" class="addon-grid"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 form-elemts">
                                            <input type="submit" id="saveSignupData"
                                                value="Proceed">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                        
                    @push('scripts')
                        <script>
                            const plans = @json(getPlans());
                            const planSelect = document.getElementById('plan_type');

                            function renderPlan(planKey) {
                                const plan = plans[planKey];

                                document.getElementById('planTitle').innerText =
                                    `${planKey} - ${plan.title}`;

                                document.getElementById('planMrp').innerText =
                                    `₹${plan.mrp}`;

                                document.getElementById('planPrice').innerText =
                                    `₹${plan.price}`;

                                // Benefits
                                const benefitsEl = document.getElementById('planBenefits');
                                benefitsEl.innerHTML = '';
                                plan.benefits.forEach(item => {
                                    benefitsEl.innerHTML += `<li>${item}</li>`;
                                });

                                // Powers
                                const powersEl = document.getElementById('planPowers');
                                powersEl.innerHTML = '';
                                plan.powers.forEach(item => {
                                    powersEl.innerHTML += `<li>${item}</li>`;
                                });

                                // 🔥 Child plan add-ons (derived from same plans array)
                                const addonsEl = document.getElementById('planAddons');
                                addonsEl.innerHTML = '';

                                if (plan.child_plans) {
                                    plan.child_plans.forEach(childKey => {
                                        const child = plans[childKey];

                                        addonsEl.innerHTML += `
                                            <div class="addon-box">
                                                <div class="addon-code">${childKey}</div>
                                                <div class="addon-mrp">₹${child.mrp}</div>
                                                <div class="addon-price">₹${child.price}</div>
                                                <div class="addon-title">${child.title}</div>
                                            </div>
                                        `;
                                    });
                                }
                            }

                            // Init
                            renderPlan(planSelect.value);

                            planSelect.addEventListener('change', function () {
                                renderPlan(this.value);
                            });
                        </script>
                    @endpush
                    @push('scripts')
                        <script>
                            const roleSelect = document.getElementById('roleSelect');
                            const agentPlans = document.getElementById('agentPlans');

                            function togglePlans() {
                                if (roleSelect.value === 'agent') {
                                    agentPlans.style.display = 'block';
                                } else {
                                    agentPlans.style.display = 'none';
                                }
                            }

                            // default load
                            togglePlans();

                            // change event
                            roleSelect.addEventListener('change', togglePlans);
                        </script>

                    @endpush
                @elseif (session()->has('step') && (session('step') == 'address' || (request()->has('step') && request()->get('step') == 'address')))
                    @php
                        session()->put('step','address');
                        session()->save();
                    @endphp

                    {{-- address step --}}
                    <div class="col-md-4 col-12 mb-5">
                        <div class="banner-inner premium-card">
                            <h1 class="title">Complete Your Profile</h1>
                            <p class="sub-title">Enter Your Degingnation details</p>
                            <p class="sub-title">Complete your profile for a better experience</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-12 mb-5">
                        <div class="banner-inner premium-card">
                            <h5 class="sub-title">Degingnation Information</h5>
                            <form action="{{ route('save.signup') }}" id="saveAddressForm" method="POST">
                                <div class="password-section ui-elements">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" id="address" name="address"
                                                    class="form-control" placeholder="Enter address"
                                                    value="@if(session()->has('address.address')) {{ session('address.address') }} @endif">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 d-none">
                                            <div class="form-group">
                                                <select id="country" name="country" class="form-control">
                                                    <option value="">Select Country</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select id="state" name="state" class="form-control">
                                                    <option value="">Select State</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select id="city" name="city" class="form-control">
                                                    <option value="">Select City</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" id="postal_code" name="postal_code"
                                                    class="form-control" placeholder="Enter Postal Code"
                                                    value="@if(session()->has('address.postal_code')) {{ trim(session('address.postal_code')) }} @endif">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 form-elemts">
                                            <input type="submit" id="saveSignupData"
                                                value="Proceed">
                                        </div>
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
    
                    {{-- address step --}}
                    <div class="col-md-4 col-12 mb-5">
                        <div class="banner-inner premium-card">
                            <h1 class="title">Terms & Conditions</h1>
                            <p class="sub-title">Please recheck your information</p>
                            <p class="sub-title">Complete your profile for a better experience</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-12 mb-5">
                        <div class="banner-inner premium-card">
                            <h5 class="sub-title">Please Review your Information</h5>
                            <form action="{{ route('save.signup') }}" id="saveTermForm" method="POST">
                                <div class="password-section ui-elements">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="terms" value="Edit" id="editTermsCheck" required @if(session()->has('terms') && session('terms') == 'Edit') checked @endif>
                                                    <label class="form-check-label" style="color:#333;" for="editTermsCheck">
                                                        Edit
                                                    </label>    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="terms" value="Right" id="termsCheck" required @if(session()->has('terms') && session('terms') == 'Right') checked @endif>
                                                    <label class="form-check-label" style="color:#333;" for="termsCheck">
                                                        Right
                                                    </label>    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="terms" value="Wrong" id="privacyCheck" required @if(session()->has('terms') && session('terms') == 'Wrong') checked @endif>
                                                    <label class="form-check-label" style="color:#333;" for="privacyCheck">
                                                        Wrong
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 form-elemts">
                                            <input type="submit" id="saveSignupData"
                                                value="OK, I Agree">
                                        </div>
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

                    {{-- address step --}}
                    <div class="col-md-4 col-12 mb-5">
                        <div class="banner-inner premium-card">
                            <h1 class="title">Policy</h1>
                            <p class="sub-title">Please read and accept our privacy policy</p>
                            <p class="sub-title">Complete your profile for a better experience</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-12 mb-5">
                        <div class="banner-inner premium-card">
                            <h5 class="sub-title">Policy Information</h5>
                            <form action="{{ route('save.signup') }}" id="savePolicyForm" method="POST">
                                <div class="password-section ui-elements">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="policy" value="1" id="policyCheck" required @if(session()->has('policy') && session('policy') == '1') checked @endif>
                                                    <label class="form-check-label" style="color:#333;" for="policyCheck">
                                                        I agree to the <a href="{{ route('privacy.policy') }}" target="_blank">Privacy Policy</a>  
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 form-elemts">
                                            <input type="submit" id="saveSignupData" value="OK, I Agree" class="btn btn-primary">
                                            <a class="mt-5" href="{{  route('index') }}">Click here to go back</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @elseif(session()->has('step') && (session('step') == 'personal' || (request()->has('step') && request()->get('step') == 'personal')))
                    {{-- personal step --}}
                    <div class="col-md-4 col-12 mb-5">
                        <div class="banner-inner premium-card">
                            <h1 class="title">Perosnal Information</h1>
                            <p class="sub-title">Fill Detail</p>
                            <p class="sub-title">Provide your basic personal information</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-12 mb-5">
                        <div class="banner-inner premium-card">
                            <h5 class="sub-title">Fill Your Personal Information</h5>
                            <form action="{{ route('save.signup') }}" id="saveUserForm" method="POST" enctype="multipart/form-data">
                                <div class="password-section ui-elements">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter Your Fullname" value="@if(session()->has('personal.name')) {{ session('personal.name') }} @endif">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control"
                                                    placeholder="Enter Email" value="@if(session()->has('personal.email')) {{ session('personal.email') }} @endif">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Enter Password " value="">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="password" name="password_confirmation"
                                                    class="form-control" placeholder="Confirm Password "
                                                    value="">
                                            </div>
                                        </div>
                                        @if(session()->has('designation.plan_type') && session()->has('designation.role') && session()->get('designation.role') == "agent")
                                            <div id="agent-payment" style="display:none; margin-top:20px: color:#103c3b">
                                                <h5 class="mb-2 sub-title">Complete Payment</h4>
                                                <!-- QR Code -->
                                                <div class="row">
                                                    <div class="col-md-6 col-12 qr-box mb-3">
                                                        <img src="{{ asset('v2/images/payment-qr.jpeg') }}" alt="QR Code" width="180">
                                                        <p class="text-sm text-gray-600 mt-1" style="color:#103c3b">
                                                            ₹{{ getPlan(session()->get('designation.plan_type'))['price'] }},
                                                            Scan & pay, then enter UTR number
                                                        </p>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                         <div class="form-group">
                                                            <label class="sub-title">Upload Payment Screenshot</label>
                                                            <input type="file"
                                                                name="payment_screenshot"
                                                                id="payment_screenshot"
                                                                class="form-control"
                                                                accept="image/*"
                                                                required>
                                                            <small class="text-muted">PNG / JPG only</small>
                                                            <img id="preview" style="display:none;width:120px;">
                                                        </div>


                                                        <!-- UTR Input -->
                                                        <div class="form-group">
                                                            <label class="sub-title">UTR Number</label>
                                                            <input type="text"
                                                                name="utr_number"
                                                                id="utr_number"
                                                                class="w-full"
                                                                placeholder="Enter payment UTR">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- add files to upload aadhar and pan card for agent -->
                                        <div class="row document-grid">

                                            <!-- Passport Photo -->
                                            <div class="col-md-4 col-12">
                                                <label class="doc-card">
                                                    <input type="file" name="photo" accept="image/*" hidden>
                                                    <div class="doc-preview">
                                                        <img src="{{ asset('v2/images/photo.png') }}" />
                                                    </div>
                                                    <div class="doc-info">
                                                        <h6>Passport Photo</h6>
                                                        <p>Clear face, white background</p>
                                                    </div>
                                                </label>
                                            </div>

                                            <!-- PAN Card -->
                                            <div class="col-md-4 col-12">
                                                <label class="doc-card">
                                                    <input type="file" name="pan_card_file" accept="image/*" hidden>
                                                    <div class="doc-preview">
                                                        <img src="{{ asset('v2/images/pan.png') }}" />
                                                    </div>
                                                    <div class="doc-info">
                                                        <h6>PAN Card</h6>
                                                        <p>Front side only</p>
                                                    </div>
                                                </label>
                                            </div>

                                            <!-- Aadhar Front -->
                                            <div class="col-md-4 col-12">
                                                <label class="doc-card">
                                                    <input type="file" name="aadhar_card_front_file" accept="image/*" hidden>
                                                    <div class="doc-preview">
                                                        <img src="{{ asset('v2/images/aadhar-front.png') }}" />
                                                    </div>
                                                    <div class="doc-info">
                                                        <h6>Aadhar Front</h6>
                                                        <p>Clear & readable</p>
                                                    </div>
                                                </label>
                                            </div>

                                            <!-- Aadhar Back -->
                                            <div class="col-md-4 col-12 mt-3">
                                                <label class="doc-card">
                                                    <input type="file" name="aadhar_card_back_file" accept="image/*" hidden>
                                                    <div class="doc-preview">
                                                        <img src="{{ asset('v2/images/aadhar-back.png') }}" />
                                                    </div>
                                                    <div class="doc-info">
                                                        <h6>Aadhar Back</h6>
                                                        <p>Address visible</p>
                                                    </div>
                                                </label>
                                            </div>

                                        </div>

                                        <div class="col-sm-12 form-elemts mt-5">
                                            <input type="submit" id="saveUserFormData"
                                                value="Save and Continue">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @push('scripts')
                        <script>
                            document.querySelectorAll('.doc-card input[type=file]').forEach(input => {
                                input.addEventListener('change', e => {
                                    const img = e.target.closest('.doc-card').querySelector('img');
                                    img.src = URL.createObjectURL(e.target.files[0]);
                                });
                            });
                        </script>
                    @endpush
                    @if(session()->has('designation.plan_type') && session()->has('designation.role') && session()->get('designation.role') == "agent")
                        @push('scripts')
                            <script>
                                const roleSelect = "{{ session()->get('designation.role') }}";
                                const agentPayment = document.getElementById('agent-payment');
                                const utrInput = document.getElementById('utr_number');
                                const submitBtn = document.getElementById('saveUserFormData');

                                agentPayment.style.display = 'block';
                                submitBtn.disabled = true;

                                if (utrInput) {
                                    utrInput.addEventListener('input', function () {
                                        submitBtn.disabled = this.value.trim().length < 6;
                                    });
                                }

                                $('#payment_screenshot').on('change', function () {
                                    const file = this.files[0];
                                    if (file) {
                                        const reader = new FileReader();
                                        reader.onload = e => $('#preview').attr('src', e.target.result).show();
                                        reader.readAsDataURL(file);
                                    }
                                });

                            </script>
                        @endpush
                    @endif
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