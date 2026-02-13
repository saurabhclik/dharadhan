@extends('layouts.main')

@section('content')
    <!-- Recommended Properties -->
    <section class="properties-section" id="properties-section">
        <div class="container">
            <div class="section-header recommended-header">
                <div class="header-content">
                    <h2 class="recommended-title">Propetries For You</h2>
                    @if(request()->has('keyword') && !empty(request()->keyword))
                        <p class="font-weight-bold mt-2">Search Results for
                            "{{ request()->keyword }}"</p>
                    @elseif(request()->has('mode') && !empty(request()->mode))
                        <p class="font-weight-bold mt-2">Search Results for
                            "{{ request()->mode }}"</p>
                    @elseif(request()->has('user_type') && !empty(request()->user_type))
                        <p class="font-weight-bold mt-2">Search Results for
                            "{{ request()->user_type }}"</p>
                    @elseif(request()->has('sub_type') && !empty(request()->sub_type))
                        <p class="font-weight-bold mt-2">Search Results for
                            "{{ str_replace('_',' ', request()->sub_type) }}"</p>
                    @elseif(request()->has('availability_status') && !empty(request()->availability_status))
                        <p class="font-weight-bold mt-2">Search Results for
                            "{{ str_replace('_',' ', "Immediately Available") }}"</p>
                    @elseif(request()->has('property_type') && !empty(request()->property_type))
                        <p class="font-weight-bold mt-2">Search Results for
                            "{{ $types[request()->property_type] }}"</p>
                    @endif
                </div>
            </div>

            <div class="property-grid">
                @forelse ($properties as $property)
                    <!-- Property Card 1 -->
                    <div class="property-card">
                        @include('partials.property-card', ['property' => $property])
                    </div>
                @empty
                    <p>No properties found.</p>
                @endforelse
            </div>
            <!-- Pagination -->
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
