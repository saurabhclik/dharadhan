@extends('layouts.main')

@section('content')
<style>
    /* Custom styles complementing Bootstrap 5 */
    .profile-header {
        background: linear-gradient(135deg, #CF5D3B 0%, #CF5D3B 100%);
        border-radius: 1rem;
        padding: 2rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }
    
    .profile-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 200px;
        height: 200px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
    }
    
    .profile-header::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -5%;
        width: 150px;
        height: 150px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
    }
    
    .card ,.section-title, .form-label
    {
        background:#0e1a1f !important;
        color:white !important;
    }
    .card-hover {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15) !important;
    }
    
    .qr-wrapper {
        background: white;
        padding: 1rem;
        border-radius: 1rem;
        display: inline-block;
        box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
    }
    
    .qr-wrapper img {
        max-width: 140px;
        height: auto;
    }
    
    .form-label {
        font-weight: 500;
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
        color: #495057;
    }
    
    .form-control, .form-select {
        border-radius: 0.5rem;
        border: 1px solid #dee2e6;
        padding: 0.6rem 1rem;
        transition: all 0.2s;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #CF5D3B;
        box-shadow: 0 0 0 0.2rem rgba(244, 161, 84, 0.15);
    }
    
    .btn-orange {
        background: linear-gradient(135deg, #fd7e14 0%, #e6690b 100%);
        border: none;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.2s;
    }
    
    .btn-orange:hover {
        background: linear-gradient(135deg, #e6690b 0%, #d45a00 100%);
        transform: translateY(-1px);
        color: white;
    }
    
    .btn-primary-gradient {
        background: linear-gradient(135deg, #CF5D3B 0%, #CF5D3B 100%);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 0.5rem;
        font-weight: 600;
        transition: all 0.2s;
    }
    
    .btn-primary-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(250, 163, 82, 0.3);
    }
    
    .section-title {
        /* font-size: 1.25rem; */
        font-weight: 600;
        color: #212529;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e9ecef;
        position: relative;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 50px;
        height: 2px;
        background: linear-gradient(90deg, #CF5D3B, #CF5D3B);
    }
    
    .avatar-preview {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid white;
        box-shadow: 0 0.25rem 0.5rem rgba(0,0,0,0.1);
        transition: all 0.2s;
    }
    
    .avatar-upload {
        position: relative;
        display: inline-block;
    }
    
    .avatar-upload:hover .avatar-preview {
        opacity: 0.9;
        transform: scale(1.02);
    }
    
    .upload-icon {
        position: absolute;
        bottom: 0;
        right: 0;
        background: #CF5D3B;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border: 2px solid white;
        transition: all 0.2s;
    }
    
    .upload-icon:hover {
        background: #CF5D3B;
        transform: scale(1.1);
    }
    
    .badge-membership {
        background: rgba(255,255,255,0.2);
        backdrop-filter: blur(5px);
        padding: 0.5rem 1rem;
        border-radius: 2rem;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .input-group-custom .form-control {
        border-radius: 0.5rem 0 0 0.5rem;
    }
    
    .input-group-custom .btn {
        border-radius: 0 0.5rem 0.5rem 0;
    }
    
    .nice-select .list {
        overflow-y: scroll !important;
        max-height: 200px;
    }
    
    @media (max-width: 768px) {
        .profile-header {
            padding: 1.5rem;
            text-align: center;
        }
        
        .section-title::after {
            left: 50%;
            transform: translateX(-50%);
        }
        
        .section-title {
            text-align: center;
        }
    }
    .btn
    {
        font-size:12px;
    }
</style>

<section class="user-page container hero-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <!-- Profile Header Card -->
                <div class="profile-header text-white">
                    <div class="row align-items-center">
                        <div class="col-md-3 text-center text-md-start mb-3 mb-md-0">
                            <div class="avatar-upload">
                                <x-user-photo name="photo" photo="{{ getUserPhoto(auth()->user()) }}" 
                                    class="avatar-preview" preview-class="avatar-preview" />
                            </div>
                        </div>
                        <div class="col-md-9 text-center text-md-start">
                            <h5 class="fw-bold mb-2">{{ auth()->user()->name }}</h5>
                            <p class="mb-2 opacity-75">
                                <i class="fas fa-envelope me-2"></i>{{ auth()->user()->email }}
                            </p>
                            @if(auth()->user()->phone)
                                <p class="mb-3 opacity-75">
                                    <i class="fas fa-phone me-2"></i>{{ auth()->user()->phone }}
                                </p>
                            @endif
                            <div class="badge-membership">
                                <i class="fas fa-calendar-alt"></i>
                                Member since {{ auth()->user()->created_at->format('F Y') }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Form Card -->
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <form action="{{ route('myaccount.profile') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <!-- QR & Referral Section -->
                            <div class="row g-4 mb-5">
                                <div class="col-md-5">
                                    <div class="card h-100 border-0 shadow-sm rounded-4 card-hover">
                                        <div class="card-body text-center p-4">
                                            <h6 class="card-title mb-3">
                                                <i class="fas fa-qrcode text-primary me-2"></i>Your QR Code
                                            </h6>
                                            <div id="qrWrapper" class="qr-wrapper mx-auto">
                                                <div class="spinner-border text-primary" style="width: 60px; height: 60px;"></div>
                                            </div>
                                            <div class="mt-3">
                                                <button type="button" class="btn btn-orange btn-sm" onclick="downloadQr()">
                                                    <i class="fas fa-download me-1"></i>Download QR
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card h-100 border-0 shadow-sm rounded-4 card-hover">
                                        <div class="card-body p-4">
                                            <h6 class="card-title mb-3">
                                                <i class="fas fa-link text-primary me-2"></i>Referral Link
                                            </h6>
                                            <p class="text-light small mb-3">
                                                Share this link with friends and earn rewards when they join!
                                            </p>
                                            <div class="input-group input-group-custom mb-3">
                                                <input type="text" id="refLink" class="form-control bg-light" readonly>
                                                <button type="button" class="btn btn-orange" onclick="copyReferral()">
                                                    <i class="fas fa-copy me-1"></i>Copy
                                                </button>
                                            </div>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-outline-success btn-sm" onclick="shareViaWhatsApp()">
                                                    <i class="fab fa-whatsapp me-1"></i>WhatsApp
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Personal Information -->
                            <div class="mb-5">
                                <h6 class="section-title">Personal Information</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-user me-1 text-primary"></i>Full Name *
                                        </label>
                                        <input type="text" name="name" class="form-control" 
                                            value="{{ $user->name }}" placeholder="Enter your full name">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-envelope me-1 text-primary"></i>Email Address *
                                        </label>
                                        <input type="email" name="email" class="form-control" 
                                            value="{{ $user->email }}" placeholder="Enter your email">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-phone me-1 text-primary"></i>Phone Number
                                        </label>
                                        <input type="tel" name="phone" class="form-control" 
                                            value="{{ $user->phone }}" placeholder="Enter your phone number">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-calendar me-1 text-primary"></i>Date of Birth
                                        </label>
                                        <input type="date" name="dob" class="form-control" 
                                            value="{{ $user->dob ? $user->dob->format('Y-m-d') : '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fab fa-whatsapp me-1 text-primary"></i>WhatsApp Number
                                        </label>
                                        <input type="tel" name="whatsapp" class="form-control" 
                                            value="{{ $user->whatsapp }}" placeholder="Enter WhatsApp number">
                                    </div>
                                </div>
                            </div>

                            <!-- Address Information -->
                            <div class="mb-5">
                                <h6 class="section-title">Address Information</h6>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">
                                            <i class="fas fa-map-marker-alt me-1 text-primary"></i>Street Address
                                        </label>
                                        <input type="text" name="address" class="form-control" 
                                            value="{{ $user->address }}" placeholder="Enter your street address">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-globe me-1 text-primary"></i>Country
                                        </label>
                                        <select id="p-country" name="country" class="form-select">
                                            <option value="">Select Country</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-building me-1 text-primary"></i>State
                                        </label>
                                        <select id="p-state" name="state" class="form-select">
                                            <option value="">Select State</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-city me-1 text-primary"></i>City
                                        </label>
                                        <select id="p-city" name="city" class="form-select">
                                            <option value="">Select City</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <i class="fas fa-mail-bulk me-1 text-primary"></i>Postal Code
                                        </label>
                                        <input type="text" name="postal_code" class="form-control" 
                                            value="{{ $user->postal_code }}" placeholder="Enter postal code">
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn text-light btn-primary-gradient px-5">
                                    <i class="fas fa-save me-2"></i>Update Profile
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
const API_TOKEN = 'OXpROcBEl0JYqCO6XwW4';
const uniqueIdentifier = "{{ auth()->user()->unique_id ?? '' }}";

async function fetchBarcodeData() {
    if(!uniqueIdentifier) return;

    try {
        const response = await fetch(
            `https://crm.dharadhan.com/api/crm/universal-link/${uniqueIdentifier}`,
            {
                headers: {
                    "Authorization": `Bearer ${API_TOKEN}`,
                    "Accept": "application/json"
                }
            }
        );

        const data = await response.json();

        if(data.status === 200 && data.data) {
            renderQR(data.data);
        } else {
            showError("QR not available");
        }
    } 
    catch(e) {
        showError("API error");
    }
}

function renderQR(data) 
{
    const wrapper = document.getElementById("qrWrapper");
    const linkInput = document.getElementById("refLink");

    let fullUrl = "https://crm.dharadhan.com/" + data.link_url;
    linkInput.value = fullUrl;

    const qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=140x140&data=" + encodeURIComponent(fullUrl);

    wrapper.innerHTML = `<img src="${qrUrl}" alt="QR Code" class="img-fluid" style="max-width: 140px;">`;
}

function showError(msg) 
{
    document.getElementById("qrWrapper").innerHTML = 
        `<div class="text-danger small text-center">${msg}</div>`;
}

function downloadQr() 
{
    const img = document.querySelector('#qrWrapper img');
    if(!img) return;

    const link = document.createElement('a');
    link.href = img.src;
    link.download = "referral-qr.png";
    link.click();
}

function copyReferral() 
{
    const input = document.getElementById("refLink");
    navigator.clipboard.writeText(input.value);
    const btn = event.target.closest('button');
    const originalHtml = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-check me-1"></i>Copied!';
    setTimeout(() => {
        btn.innerHTML = originalHtml;
    }, 2000);
}

function shareViaWhatsApp() 
{
    const url = document.getElementById("refLink").value;
    const text = encodeURIComponent("Join me on this platform! Use my referral link: ");
    window.open(`https://wa.me/?text=${text}${encodeURIComponent(url)}`, '_blank');
}

document.addEventListener("DOMContentLoaded", fetchBarcodeData);
</script>
<script>
    let selectedCountry = "{{ $user->country }}";
    let selectedState   = "{{ $user->state }}";
    let selectedCity    = "{{ $user->city }}";

    $(document).ready(function() 
    {
        loadCountries();
    });

    function loadCountries() 
    {
        $.get('/countries', function(data) 
        {
            let html = '<option value="">Select Country</option>';
            $.each(data, function(i, country) 
            {
                let selected = (selectedCountry == country.id) ? 'selected' : '';
                html += '<option value="'+country.id+'" '+selected+'>'+country.country_name+'</option>';
            });
            $('#p-country').html(html);
            if(typeof $.fn.niceSelect !== 'undefined') 
            {
                $('#p-country').niceSelect('update');
            }

            if(selectedCountry) 
            {
                loadStates(selectedCountry);
            }
        });
    }

    function loadStates(countryId) 
    {
        $('#p-state').html('<option value="">Loading...</option>');
        $('#p-city').html('<option value="">Select City</option>');
        if(typeof $.fn.niceSelect !== 'undefined') 
        {
            $('#p-state').niceSelect('update');
            $('#p-city').niceSelect('update');
        }
        if(!countryId) return;

        $.get('/states/' + countryId, function(data) 
        {
            let html = '<option value="">Select State</option>';
            $.each(data, function(i, state) 
            {
                let selected = (selectedState == state.id) ? 'selected' : '';
                html += '<option value="'+state.id+'" '+selected+'>'+state.state+'</option>';
            });
            $('#p-state').html(html);
            if(typeof $.fn.niceSelect !== 'undefined') 
            {
                $('#p-state').niceSelect('update');
            }

            if(selectedState) 
            {
                loadCities(selectedState);
            }
        });
    }

    function loadCities(stateId) 
    {
        $('#p-city').html('<option value="">Loading...</option>');
        if(typeof $.fn.niceSelect !== 'undefined') 
        {
            $('#p-city').niceSelect('update');
        }
        if(!stateId) return;

        $.get('/cities/' + stateId, function(data) 
        {
            let html = '<option value="">Select City</option>';
            $.each(data, function(i, city) 
            {
                let selected = (selectedCity == city.id) ? 'selected' : '';
                html += '<option value="'+city.id+'" '+selected+'>'+city.city+'</option>';
            });
            $('#p-city').html(html);
            if(typeof $.fn.niceSelect !== 'undefined') 
            {
                $('#p-city').niceSelect('update');
            }
        });
    }

    $(document).on('change', '#p-country', function() 
    {
        selectedState = null;
        selectedCity = null;
        let countryId = $(this).val();
        loadStates(countryId);
    });

    $(document).on('change', '#p-state', function() 
    {
        selectedCity = null;
        let stateId = $(this).val();
        loadCities(stateId);
    });
</script>
@endpush