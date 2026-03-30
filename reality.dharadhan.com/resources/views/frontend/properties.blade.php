@extends('layouts.main')

@section('content')
<style>
    .custom-alert 
    {
        background-color: #f5e6c8;
        color: #333;
        width: 100%;
        /* padding: 16px 0; */
        font-size: 14px;
        line-height: 1.6;
        position: sticky;
        top: 0;
        z-index: 1050;
        display:flex; 
        align-items:center;
        text:center;
        margin:auto;
    }

    .custom-alert .container 
    {
        max-width: 1200px;
    }

    .alert-text 
    {
        margin-right: 20px;
    }
</style>
@if(request()->hasAny(['type']))
    <div id="topAlert" class="custom-alert">
        <div class="container d-flex justify-content-center align-items-center">
            <p class="mb-0 alert-text" style="font-size:12px;">
                The data (based on the search query performed), on this webpage of reality.dharadhan.in has been made available
                for informational purposes only and no representation or warranty is expressly or impliedly given as to its accuracy.
                Any investment decisions that you take should not be based relying solely on the information that is available on the website
                reality.dharadhan.in or downloaded from it. Nothing contained herein shall be deemed to constitute legal advice, solicitation,
                invitation to acquire by the developer/builder or any other entity. You are advised to visit the relevant RERA website and
                contact builder/advertisers directly to know more about the project before taking any decision based on the contents displayed
                on the website. If you have any question or want to share feedback, feel free to write to us.
            </p>
            <button type="button" class="btn bg-primary" onclick="closeAlert()"><span class="text-light" style="font-size:12px;">Okay, Got it</span></button>
        </div>
    </div>
@endif
    <section class="properties-section" id="properties-section">
        <div class="container">
            <div class="section-header recommended-header">
                <div class="header-content">
                    <h2 class="recommended-title">Properties For You</h2>
                    @if(request()->has('keyword') && !empty(request()->keyword))
                        <p class="font-weight-bold mt-2">Search Results for "{{ request()->keyword }}"</p>
                    @elseif(request()->has('mode') && !empty(request()->mode))
                        <p class="font-weight-bold mt-2">Search Results for "{{ request()->mode }}"</p>
                    @elseif(request()->has('user_type') && !empty(request()->user_type))
                        <p class="font-weight-bold mt-2">Search Results for "{{ request()->user_type }}"</p>
                    @elseif(request()->has('sub_type') && !empty(request()->sub_type))
                        <p class="font-weight-bold mt-2">Search Results for "{{ str_replace('_',' ', request()->sub_type) }}"</p>
                    @elseif(request()->has('availability_status') && !empty(request()->availability_status))
                        <p class="font-weight-bold mt-2">Search Results for "{{ str_replace('_',' ', "Immediately Available") }}"</p>
                    @elseif(request()->has('property_type') && !empty(request()->property_type))
                        <p class="font-weight-bold mt-2">Search Results for "{{ $types[request()->property_type] ?? ucwords(str_replace('_', ' ', request()->property_type)) }}"</p>
                    @elseif(request()->has('location') && !empty(request()->location))
                        <p class="font-weight-bold mt-2">Search Results for "{{ $types[request()->location] ?? str_replace('_',' ', request()->location) }}"</p>
                    @endif
                </div>
            </div>

            <div class="property-grid">
                @forelse ($properties as $property)
                    <div class="property-card">
                        @include('partials.property-card', ['property' => $property])
                    </div>
                @empty
                    <p>No properties found.</p>
                @endforelse
            </div>
            {{ $properties->links('vendor.pagination.default') }}
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .property-grid{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 24px;
        }

        @media (max-width: 768px) {
              .property-grid{
                display: grid;
                grid-template-columns: 1fr;
                gap: 24px;
            }
        }

    </style>

@endpush
<script>
    function closeAlert() 
    {
        document.getElementById('topAlert').style.display = 'none';
    }
</script>
