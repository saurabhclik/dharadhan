@extends('layouts.main')

@section('content')
    <section class="single-proper blog details py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8 col-md-12">
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-3">
                                <div>
                                    <h3 class="fw-bold mb-2" style="color: #2d3436;">{{ $property->title }}</h3>
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="fas fa-map-marker-alt" style="color: rgb(207, 93, 59);"></i>
                                        <span class="text-secondary">{{ $property->location }}</span>
                                    </div>
                                </div>
                                <div class="text-md-end">
                                    <h4 class="fw-bold mb-1" style="color: rgb(207, 93, 59);">{{ formatPrice($property->price) }}</h4>
                                    <p class="text-secondary mb-0">{{ formatPrice($property->getPricePerSqft()) }} / sq ft</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <span class="badge px-3 py-2 text-white" style="background-color: rgb(207, 93, 59);">For Sale</span>
                                @include('partials.reactions')
                            </div>
                        </div>
                    </div>

                    @if ($property->images->where('type', 'property') && $property->images->where('type', 'property')->count())
                    <div class="mb-4">
                        <h5 class="mb-3 fw-bold" style="color: #2d3436;">Gallery</h5>
                        <div id="propertyGallery" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner rounded-3 overflow-hidden" style="box-shadow: 0 5px 20px rgba(207, 93, 59, 0.1);">
                                @foreach ($property->images->where('type', 'property') as $index => $image)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $image->path) }}" 
                                             class="d-block w-100" 
                                             alt="{{ $property->title }}"
                                             style="height: 450px; object-fit: cover;">
                                    </div>
                                @endforeach
                            </div>
                            
                            @if($property->images->where('type', 'property')->count() > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#propertyGallery" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon p-3 rounded-circle" style="background-color: rgb(207, 93, 59);" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#propertyGallery" data-bs-slide="next">
                                    <span class="carousel-control-next-icon p-3 rounded-circle" style="background-color: rgb(207, 93, 59);" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
                        </div>

                        <div class="row g-2 mt-3">
                            @foreach ($property->images->where('type', 'property')->take(6) as $index => $image)
                                <div class="col-2">
                                    <img src="{{ asset('storage/' . $image->path) }}" 
                                        class="img-fluid rounded-3 cursor-pointer {{ $index == 0 ? 'border' : '' }}"
                                        style="height: 70px; width: 100%; object-fit: cover; {{ $index == 0 ? 'border-color: rgb(207, 93, 59) !important;' : '' }}"
                                        onclick="document.querySelector('#propertyGallery .carousel-item.active').classList.remove('active'); document.querySelectorAll('#propertyGallery .carousel-item')[{{ $index }}].classList.add('active');">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="mb-4">
                        <h5 class="mb-3 fw-bold" style="color: #2d3436;">Description</h5>
                        <div class="p-4 rounded-3" style="background-color: #f8f9fa;">
                            {!! $property->description !!}
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="mb-3 fw-bold" style="color: #2d3436;">Property Details</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-3 rounded-3" style="background-color: #f8f9fa;">
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-flex justify-content-between py-2 border-bottom border-light">
                                            <span class="fw-semibold">Property ID:</span>
                                            <span class="text-secondary">{{ $property->id }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between py-2 border-bottom border-light">
                                            <span class="fw-semibold">Property Type:</span>
                                            <span class="text-secondary">{{ ucfirst($property->property_type) }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between py-2 border-bottom border-light">
                                            <span class="fw-semibold">Property For:</span>
                                            <span class="text-secondary">{{ ucfirst($property->mode) }}</span>
                                        </li>
                                        @if($property->bedrooms)
                                        <li class="d-flex justify-content-between py-2">
                                            <span class="fw-semibold">Rooms:</span>
                                            <span class="text-secondary">{{ $property->bedrooms }}</span>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 rounded-3" style="background-color: #f8f9fa;">
                                    <ul class="list-unstyled mb-0">
                                        @if($property->bathrooms)
                                        <li class="d-flex justify-content-between py-2 border-bottom border-light">
                                            <span class="fw-semibold">Bathrooms:</span>
                                            <span class="text-secondary">{{ $property->bathrooms }}</span>
                                        </li>
                                        @endif
                                        @if($property->kitchens)
                                        <li class="d-flex justify-content-between py-2 border-bottom border-light">
                                            <span class="fw-semibold">Kitchens:</span>
                                            <span class="text-secondary">{{ $property->kitchens }}</span>
                                        </li>
                                        @endif
                                        @if($property->year)
                                        <li class="d-flex justify-content-between py-2">
                                            <span class="fw-semibold">Year Built:</span>
                                            <span class="text-secondary">{{ $property->year }}</span>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($property->images->where('type', 'site_plan') && $property->images->where('type', 'site_plan')->count())
                    <div class="mb-4">
                        <h5 class="mb-3 fw-bold" style="color: #2d3436;">Site Plans</h5>
                        <div class="row g-3">
                            @foreach ($property->images->where('type', 'site_plan') as $image)
                                <div class="col-md-6">
                                    <img src="{{ asset('storage/' . $image->path) }}" 
                                         class="img-fluid rounded-3" 
                                         alt="Site Plan"
                                         style="box-shadow: 0 5px 15px rgba(0,0,0,0.08);">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    <div class="mb-4">
                        <h5 class="mb-3 fw-bold" style="color: #2d3436;">Location</h5>
                        <div class="ratio ratio-16x9 rounded-3 overflow-hidden" style="box-shadow: 0 5px 20px rgba(207, 93, 59, 0.1);">
                            <iframe src="https://www.google.com/maps?q={{ $property->location }}&output=embed" 
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>

                <aside class="col-lg-4 col-md-12">
                    <div class="card border-0 mb-4 overflow-hidden" style="box-shadow: 0 10px 30px rgba(207, 93, 59, 0.15);">
                        <div class="position-relative" style="height: 5px; background: linear-gradient(90deg, rgb(207, 93, 59), #ff8a5c);"></div>
                        <div class="card-body p-4">
                            <ul class="nav nav-pills nav-justified mb-4 p-1 rounded-3" role="tablist" style="background-color: #f8f9fa;">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab"
                                            style="color: #6c757d; transition: all 0.3s;">
                                        <i class="fas fa-id-card me-2"></i>Profile
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab"
                                            style="color: #6c757d; transition: all 0.3s;">
                                        <i class="fas fa-envelope me-2"></i>Contact
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <div class="text-center mb-4">
                                        <div class="position-relative d-inline-block">
                                            @if($user->photo)
                                                <img src="{{ getUserPhoto($user) }}" 
                                                     alt="{{ $user->name }}"
                                                     class="rounded-circle border border-3 border-white"
                                                     style="width: 110px; height: 110px; object-fit: cover; box-shadow: 0 5px 15px rgba(207, 93, 59, 0.2);">
                                            @else
                                                <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold border border-3 border-white"
                                                     style="width: 110px; height: 110px; font-size: 36px; background: linear-gradient(135deg, rgb(207, 93, 59), #ff8a5c); box-shadow: 0 5px 15px rgba(207, 93, 59, 0.2);">
                                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                                </div>
                                            @endif
                                            <span class="position-absolute bottom-0 end-0 rounded-circle px-2 border-white" 
                                                  style="background-color: #28a745;">
                                                <i class="fas fa-check text-white small"></i>
                                            </span>
                                        </div>
                                        <h5 class="fw-bold mt-3 mb-1" style="color: #2d3436;">{{ $user->name }}</h5>
                                        <p class="text-secondary small mb-2">
                                            <i class="fas fa-building me-1" style="color: rgb(207, 93, 59);"></i>Agent at {{ get_setting('app_name') }}
                                        </p>

                                        <div class="d-flex justify-content-center align-items-center gap-2 mb-3">
                                            <span style="color: rgb(207, 93, 59);">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star{{ $i <= ($user->rating ?? 4) ? '' : '-o' }}"></i>
                                                @endfor
                                            </span>
                                            <span class="text-secondary">({{ $user->reviews_count ?? 0 }} reviews)</span>
                                        </div>
                                    </div>
                                    <div class="text-center mb-4" id="barcode-section">
                                        <div class="p-3 rounded-3 d-inline-block" style="background-color: white; box-shadow: 0 5px 15px rgba(207, 93, 59, 0.1);">
                                            <div id="barcode-container" class="d-flex justify-content-center align-items-center" style="min-width: 160px; min-height: 160px;">
                                                <div class="spinner-border text-primary" role="status" style="color: rgb(207, 93, 59) !important;">
                                                    <span class="visually-hidden">Loading barcode...</span>
                                                </div>
                                            </div>
                                            <!-- <div id="barcode-info" class="mt-2"></div> -->
                                        </div>
                                        <!-- <p class="text-secondary small mt-2">
                                            <i class="fas fa-qrcode me-1" style="color: rgb(207, 93, 59);"></i>
                                            <span id="barcode-label">Loading barcode data...</span>
                                        </p> -->
                                    </div>

                                    <div class="d-flex gap-2">
                                        <button class="btn flex-grow-1 text-white border-0" onclick="shareCard()"
                                                style="background-color: rgb(207, 93, 59); transition: all 0.3s;">
                                            <i class="fas fa-share-alt me-2"></i>Share
                                        </button>
                                        <button class="btn flex-grow-1" onclick="downloadCard()"
                                                style="background-color: transparent; color: rgb(207, 93, 59); border: 1px solid rgb(207, 93, 59); transition: all 0.3s;">
                                            <i class="fas fa-download me-2"></i>Save
                                        </button>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="contact" role="tabpanel">
                                    <div class="magic-contact">
                                        <h5 class="magic-title">Fill this one-time contact form</h5>
                                        <p class="magic-subtitle">Get Agent's details over email</p>
                                        <form method="POST" action="{{ route('store.submit.request') }}">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ encrypt($user->id) }}">
                                            <div class="magic-field">
                                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Your Name" required>
                                            </div>
                                            <div class="magic-field">
                                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                            </div>
                                            <div class="magic-field phone-field">
                                            <span class="country">IND +91</span>
                                                <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="Mobile Number" required>
                                            </div>
                                            <div class="magic-field">
                                                <input type="text" name="location" value="{{ old('location') }}" placeholder="Your City / Location" required>
                                            </div>
                                            <div class="magic-field">
                                                <textarea name="message" rows="2" placeholder="I'm interested in this property..."></textarea>
                                            </div>
                                            <div class="magic-check">
                                                <input type="checkbox" checked>
                                                <label>I Agree to Terms of Use</label>
                                            </div>
                                            <button type="submit" class="magic-btn">
                                            Get Contact Details
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Properties -->
                    <div class="card border-0 mb-4 overflow-hidden" style="box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3 d-flex align-items-center">
                                <i class="fas fa-clock me-2" style="color: rgb(207, 93, 59);"></i>
                                <span style="color: #2d3436;">Recent Properties</span>
                            </h5>
                            @foreach ($recentProperties as $rproperty)
                                <div class="d-flex gap-3 mb-3 pb-3" style="border-bottom: 1px solid #f0f0f0;">
                                    <a href="{{ route('property.details', $rproperty->id) }}" class="flex-shrink-0">
                                        <img src="{{ asset('storage/' . $rproperty->featured_image) }}" 
                                             alt="{{ $rproperty->title }}"
                                             class="rounded-3"
                                             style="width: 80px; height: 70px; object-fit: cover; border: 2px solid transparent; transition: border-color 0.3s;">
                                    </a>
                                    <div>
                                        <h6 class="fw-semibold mb-1">
                                            <a href="{{ route('property.details', $rproperty->id) }}" 
                                               class="text-decoration-none" style="color: #2d3436;">
                                                {{ Str::limit($rproperty->title, 25) }}
                                            </a>
                                        </h6>
                                        <p class="fw-bold mb-1" style="color: rgb(207, 93, 59);">{{ formatPrice($rproperty->price) }}</p>
                                        <small class="text-secondary">
                                            <i class="fas fa-map-marker-alt me-1" style="color: rgb(207, 93, 59);"></i>{{ $rproperty->location }}
                                        </small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm" id="emiCalculator">
                        <div class="card-header bg-white py-2 px-3 d-flex justify-content-between align-items-center">
                            <h6 class="fw-bold mb-0 small">
                                <i class="fas fa-calculator text-primary me-2"></i>
                                EMI Calculator
                            </h6>
                        </div>
                        <div class="card-body p-3">
                            <div class="bg-light rounded-2 p-2 mb-2">
                                <div class="row align-items-center g-1">
                                    <div class="col-7">
                                        <small class="text-secondary d-block small">Property Price</small>
                                        <span class="fw-bold text-primary small">{{ formatPrice($property->price) }}</span>
                                    </div>
                                    <div class="col-5 text-end">
                                        <small class="text-secondary d-block small">Per Sq.Ft</small>
                                        <span class="fw-semibold small">{{ formatPrice($property->getPricePerSqft()) }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label class="small fw-semibold text-secondary">Loan Amount</label>
                                    <span class="fw-semibold small text-primary" id="loanAmountDisplay">₹80,00,000</span>
                                </div>
                                <input type="range" class="form-range" id="loanAmount" min="1000000" max="{{ $property->price }}" step="100000" value="{{ $property->price * 0.8 }}" oninput="updateLoanAmount(this.value)">
                                <div class="d-flex justify-content-between small text-secondary">
                                    <span class="small">10L</span>
                                    <span class="small">{{ number_format($property->price / 10000000, 1) }}Cr</span>
                                </div>
                            </div>

                            <div class="mb-2">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label class="small fw-semibold text-secondary">Interest Rate</label>
                                    <span class="fw-semibold small text-primary" id="interestRateDisplay">8.5%</span>
                                </div>
                                <input type="range" class="form-range" id="interestRate" min="6" max="14" step="0.1" value="8.5" oninput="updateInterestRate(this.value)">
                                <div class="d-flex justify-content-between small text-secondary">
                                    <span class="small">6%</span>
                                    <span class="small">14%</span>
                                </div>
                            </div>

                            <div class="mb-2">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label class="small fw-semibold text-secondary">Tenure (Years)</label>
                                    <span class="fw-semibold small text-primary" id="tenureDisplay">20 Yrs</span>
                                </div>
                                <input type="range" class="form-range" id="loanTenure" min="1" max="30" step="1" value="20" oninput="updateTenure(this.value)">
                                <div class="d-flex justify-content-between small text-secondary">
                                    <span class="small">1</span>
                                    <span class="small">30</span>
                                </div>
                            </div>

                            <div class="bg-light rounded-2 p-2 mb-2">
                                <div class="row align-items-center g-1">
                                    <div class="col-6">
                                        <small class="text-secondary d-block small">Monthly EMI</small>
                                        <h6 class="fw-bold text-primary mb-0" id="emiAmount">₹68,759</h6>
                                    </div>
                                    <div class="col-6">
                                        <div class="small">
                                            <div class="d-flex justify-content-between">
                                                <span class="text-secondary small">Principal</span>
                                                <span class="fw-semibold small" id="principalAmount">₹80L</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="text-secondary small">Interest</span>
                                                <span class="fw-semibold small" id="totalInterest">₹85L</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress mt-1" style="height: 2px;">
                                    <div class="progress-bar bg-primary" id="emiProgress" style="width: 48%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .cursor-pointer 
        {
            cursor: pointer;
        }

        .form-control:focus 
        {
            box-shadow: none !important;
            border-color: rgb(207, 93, 59) !important;
        }

        .nav-pills .nav-link.active 
        {
            background-color: rgb(207, 93, 59) !important;
            color: white !important;
        }

        .nav-pills .nav-link 
        {
            color: #6c757d;
            font-size: 0.9rem;
            padding: 0.4rem 0.5rem;
        }

        .carousel-control-prev:hover span,
        .carousel-control-next:hover span 
        {
            transform: scale(1.1);
            transition: transform 0.3s;
        }
        
        .recent-main:hover img 
        {
            border-color: rgb(207, 93, 59) !important;
        }

        #emiCalculator 
        {
            font-size: 0.85rem;
        }
        
        #emiCalculator .card-header 
        {
            border-bottom: 1px solid rgba(0,0,0,0.05);
            background: linear-gradient(135deg, #ffffff, #fafafa) !important;
        }
        
        #emiCalculator .form-range 
        {
            height: 0.5rem;
        }
        
        #emiCalculator .form-range::-webkit-slider-thumb 
        {
            width: 14px;
            height: 14px;
            margin-top: -5px;
            background: rgb(207, 93, 59);
        }
        
        #emiCalculator .form-range::-moz-range-thumb {
            width: 14px;
            height: 14px;
            background: rgb(207, 93, 59);
        }
        
        #emiCalculator .form-range::-webkit-slider-runnable-track {
            height: 4px;
            background: #e9ecef;
        }
        
        #emiCalculator .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }
        
        #emiCalculator .progress {
            background-color: #e9ecef;
        }
        
        #emiCalculator .bg-light {
            background-color: #f8f9fa !important;
        }
        
        .text-primary {
            color: rgb(207, 93, 59) !important;
        }
        
        .bg-primary {
            background-color: rgb(207, 93, 59) !important;
        }
        
        .btn-primary {
            background-color: rgb(207, 93, 59);
            border-color: rgb(207, 93, 59);
        }
        
        .btn-primary:hover {
            background-color: #c04e2f;
            border-color: #c04e2f;
        }
        
        .btn-outline-primary {
            color: rgb(207, 93, 59);
            border-color: rgb(207, 93, 59);
        }
        
        .btn-outline-primary:hover {
            background-color: rgb(207, 93, 59);
            border-color: rgb(207, 93, 59);
            color: white;
        }
        
        .progress-bar {
            background-color: rgb(207, 93, 59) !important;
        }

        .magic-contact
        {
            padding:10px 5px;
        }

        .magic-title{
            font-weight:600;
            font-size:20px;
            margin-bottom:2px;
        }

        .magic-subtitle{
            font-size:13px;
            color:#777;
            margin-bottom:25px;
        }

        .magic-field{
            margin-bottom:20px;
        }

        .magic-field input,
        .magic-field textarea{
            width:100%;
            border:none;
            border-bottom:1px solid #ddd;
            padding:10px 0;
            font-size:14px;
            outline:none;
            background:transparent;
        }

        .magic-field input:focus,
        .magic-field textarea:focus{
            border-bottom:2px solid rgb(207, 93, 59);
        }

        .phone-field{
            display:flex;
            align-items:center;
            gap:10px;
        }

        .phone-field .country{
            font-size:14px;
            color:#444;
            border-right:1px solid #ddd;
            padding-right:10px;
        }

        .phone-field input{
            flex:1;
            border:none;
            border-bottom:1px solid #ddd;
        }

        .magic-check{
            font-size:12px;
            color:#666;
            margin-bottom:20px;
        }

        .magic-btn{
            width:100%;
            background:#e53935;
            border:none;
            color:white;
            padding:12px;
            font-weight:600;
            border-radius:30px;
            transition:0.3s;
        }

        .magic-btn:hover{
            background:#c62828;
        }
        #barcode-container img {
            max-width: 100%;
            height: auto;
        }
        
        .barcode-error {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
        }
        
        .barcode-success {
            color: #28a745;
            font-size: 12px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        const API_BASE_URL = window.location.origin;
        const API_TOKEN = 'OXpROcBEl0JYqCO6XwW4';
        const uniqueIdentifier = '{{ $user->unique_id ?? 0 }}';
        let loadAttempts = 0;
        const MAX_ATTEMPTS = 2;
        
        async function fetchBarcodeData(identifier) 
        {
            if (!identifier || identifier === '0' || identifier === '') 
            {
                showBarcodeError('Invalid identifier');
                return null;
            }
            
            try 
            {
                const apiUrl = `https://crm.dharadhan.com/api/crm/universal-link/${uniqueIdentifier}`;
                const response = await fetch(apiUrl, {
                    method: 'GET',
                    headers: {
                        'Authorization': `Bearer ${API_TOKEN}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                });
                
                const data = await response.json();
                if (data.status === 200 && data.data) 
                {
                    return data.data;
                } 
                else if (data.status === 404) 
                {
                    showBarcodeError('No barcode data found for this user');
                    return null;
                } 
                else 
                {
                    showBarcodeError(data.message || 'Failed to fetch barcode data');
                    return null;
                }
            } 
            catch (error) 
            {
                showBarcodeError('Network error. Please try again later.');
                return null;
            }
        }

        function displayBarcode(barcodeData) 
        {
            const container = document.getElementById('barcode-container');
            const infoContainer = document.getElementById('barcode-info');
            const labelSpan = document.getElementById('barcode-label');
            
            if (!container) return;
            container.innerHTML = '';
            if (barcodeData && barcodeData.link_url) 
            {
                // console.log('Using link_url:', barcodeData.link_url);
                generateQRCodeFromUrl(barcodeData.link_url, barcodeData);
                return;
            }
            
            if (barcodeData && barcodeData.qr_code_path && loadAttempts < MAX_ATTEMPTS) 
            {
                loadAttempts++;
                const img = document.createElement('img');
                const possiblePaths = [
                    barcodeData.qr_code_path,
                    barcodeData.qr_code_path.replace('uploads/', '/storage/uploads/'),
                    `/storage/${barcodeData.qr_code_path}`,
                    `/public/${barcodeData.qr_code_path}`
                ];
                
                let currentPathIndex = 0;
                
                function tryLoadImage() 
                {
                    if (currentPathIndex >= possiblePaths.length) 
                    {
                        if (barcodeData.link_url) 
                        {
                            generateQRCodeFromUrl(barcodeData.link_url, barcodeData);
                        } 
                        else 
                        {
                            showBarcodeError('Could not load barcode image');
                        }
                        return;
                    }
                    
                    const currentPath = possiblePaths[currentPathIndex];
                    const fullUrl = currentPath.startsWith('http') ? currentPath : `${API_BASE_URL}/${currentPath}`;
                    // console.log(`Trying path ${currentPathIndex + 1}:`, fullUrl);
                    
                    img.src = fullUrl;
                    img.alt = 'QR Code';
                    img.style.maxWidth = '160px';
                    img.style.height = 'auto';
                    
                    img.onload = function() 
                    {
                        container.appendChild(img);
                        if (barcodeData.unique_identifier) 
                        {
                            infoContainer.innerHTML = `<small class="text-muted">ID: ${barcodeData.unique_identifier}</small>`;
                        }
                        
                        if (labelSpan) 
                        {
                            labelSpan.textContent = 'Scan QR code to connect with agent';
                        }
                    };
                    
                    img.onerror = function() 
                    {
                        currentPathIndex++;
                        tryLoadImage();
                    };
                }
                
                tryLoadImage();
            } 
            else if (barcodeData && barcodeData.link_url) 
            {
                generateQRCodeFromUrl(barcodeData.link_url, barcodeData);
            }
            else 
            {
                showBarcodeError('No barcode data available');
            }
        }
        
        function generateQRCodeFromUrl(url, barcodeData) 
        {
            const container = document.getElementById('barcode-container');
            const infoContainer = document.getElementById('barcode-info');
            const labelSpan = document.getElementById('barcode-label');
            if (!container) return;
            container.innerHTML = '';
            let fullUrl = `https://crm.dharadhan.com/${url}`;
            // if (url && !url.startsWith('http')) 
            // {
            //     fullUrl = `https://crm.dharadhan.com/${url}`;
            // }
            const qrCodeUrl = `https://api.qrserver.com/v1/create-qr-code/?size=160x160&data=${encodeURIComponent(fullUrl)}`;
            
            const img = document.createElement('img');
            img.src = qrCodeUrl;
            img.alt = 'QR Code';
            img.style.maxWidth = '160px';
            img.style.height = 'auto';
            
            img.onload = function() 
            {
                console.log('QR code generated successfully');
            };
            
            img.onerror = function() 
            {
                const fallbackUrl = `https://chart.googleapis.com/chart?chs=160x160&cht=qr&chl=${encodeURIComponent(fullUrl)}&choe=UTF-8`;
                this.src = fallbackUrl;
            };
            
            container.appendChild(img);
            if (barcodeData.agent_name) 
            {
                infoContainer.innerHTML = `<small class="text-muted">Agent: ${barcodeData.agent_name}</small>`;
            } 
            else if (barcodeData.unique_identifier) 
            {
                infoContainer.innerHTML = `<small class="text-muted">ID: ${barcodeData.unique_identifier}</small>`;
            }
            
            if (labelSpan) 
            {
                labelSpan.textContent = 'Scan QR code to connect with agent';
            }
        }
        
        function showBarcodeError(message) 
        {
            const container = document.getElementById('barcode-container');
            const labelSpan = document.getElementById('barcode-label');
            
            if (container) 
            {
                container.innerHTML = `
                    <div class="text-center">
                        <i class="fas fa-qrcode" style="font-size: 48px; color: #dc3545;"></i>
                        <p class="barcode-error mt-2">${message}</p>
                    </div>
                `;
            }
            
            if (labelSpan) 
            {
                labelSpan.textContent = 'Barcode temporarily unavailable';
            }
        }

        async function loadBarcode() 
        {
            loadAttempts = 0;
            
            if (uniqueIdentifier && uniqueIdentifier !== '0' && uniqueIdentifier !== '') 
            {
                const barcodeData = await fetchBarcodeData(uniqueIdentifier);
                if (barcodeData) 
                {
                    displayBarcode(barcodeData);
                }
            } 
            else 
            {
                showBarcodeError('Barcode identifier not available');
            }
        }
        
        function calculateEMI() 
        {
            const loanAmount = parseFloat(document.getElementById('loanAmount').value);
            const interestRate = parseFloat(document.getElementById('interestRate').value);
            const tenureYears = parseFloat(document.getElementById('loanTenure').value);
            const principal = loanAmount;
            const monthlyRate = interestRate / (12 * 100);
            const tenureMonths = tenureYears * 12;
            
            if (isNaN(principal) || isNaN(monthlyRate) || isNaN(tenureMonths) || monthlyRate === 0) {
                return;
            }
            
            const emi = principal * monthlyRate * Math.pow(1 + monthlyRate, tenureMonths) / (Math.pow(1 + monthlyRate, tenureMonths) - 1);
            const totalPayment = emi * tenureMonths;
            const totalInterest = totalPayment - principal;
            
            document.getElementById('loanAmountDisplay').innerHTML = '₹' + formatNumber(principal);
            document.getElementById('interestRateDisplay').innerHTML = interestRate.toFixed(1) + '%';
            document.getElementById('tenureDisplay').innerHTML = tenureYears + ' Yrs';
            document.getElementById('emiAmount').innerHTML = '₹' + formatNumber(Math.round(emi));
            document.getElementById('principalAmount').innerHTML = '₹' + formatShortNumber(principal);
            document.getElementById('totalInterest').innerHTML = '₹' + formatShortNumber(Math.round(totalInterest));
            
            const interestPercentage = (totalInterest / totalPayment) * 100;
            if (!isNaN(interestPercentage)) 
            {
                document.getElementById('emiProgress').style.width = interestPercentage + '%';
            }
        }
        
        function formatNumber(num) 
        {
            if (num >= 10000000) 
            {
                return (num / 10000000).toFixed(2) + ' Cr';
            } 
            else if (num >= 100000) 
            {
                return (num / 100000).toFixed(2) + ' L';
            } 
            else if (num >= 1000) 
            {
                return (num / 1000).toFixed(1) + ' K';
            }
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        
        function formatShortNumber(num) 
        {
            if (num >= 10000000) 
            {
                return (num / 10000000).toFixed(1) + 'Cr';
            } 
            else if (num >= 100000) 
            {
                return (num / 100000).toFixed(1) + 'L';
            } 
            else if (num >= 1000) 
            {
                return (num / 1000).toFixed(1) + 'K';
            }
            return num.toString();
        }
        
        function updateLoanAmount(value) 
        {
            document.getElementById('loanAmountDisplay').innerHTML = '₹' + formatNumber(parseFloat(value));
            calculateEMI();
        }
        
        function updateInterestRate(value) 
        {
            document.getElementById('interestRateDisplay').innerHTML = parseFloat(value).toFixed(1) + '%';
            calculateEMI();
        }
        
        function updateTenure(value) 
        {
            document.getElementById('tenureDisplay').innerHTML = value + ' Yrs';
            calculateEMI();
        }

        document.addEventListener('DOMContentLoaded', function() 
        {
            calculateEMI();
            loadBarcode();
        });
        
        function downloadCard() 
        {
            const card = document.querySelector('.card');
            html2canvas(card, {
                scale: 2,
                useCORS: true,
                backgroundColor: '#ffffff',
                logging: false
            }).then(canvas => {
                const link = document.createElement('a');
                link.download = '{{ $user->name }}-card.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
            }).catch(error => {
                // console.error('Error:', error);
                alert('Failed to generate card. Please try again.');
            });
        }
        
        function shareCard() 
        {
            if (navigator.share) 
            {
                navigator.share({
                    title: '{{ $user->name }}\'s Digital Card',
                    text: 'Check out my digital business card',
                    url: '{{ route('submit.request', ['ref' => encrypt($user->id)]) }}'
                }).catch(console.error);
            } 
            else 
            {
                navigator.clipboard.writeText('{{ route('submit.request', ['ref' => encrypt($user->id)]) }}');
                alert('Link copied to clipboard!');
            }
        }
        const galleryElement = document.getElementById('propertyGallery');
        if (galleryElement) 
        {
            var carousel = new bootstrap.Carousel(galleryElement, {
                interval: 5000,
                wrap: true
            });
        }
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('mouseenter', function() 
            {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 5px 15px rgba(207, 93, 59, 0.3)';
            });
            btn.addEventListener('mouseleave', function() 
            {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'none';
            });
        });
    </script>
@endpush