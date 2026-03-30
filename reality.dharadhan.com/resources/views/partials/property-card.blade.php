@if($property->is_featured)
    <div class="property-badge-wrapper">
        <img src="{{ asset('v2/images/featured.png') }}">
    </div>
@endif
<a href="{{ route('property.details', $property->id) }}" class="text-decoration-none">
    <div class="property-image">
        <img src="{{ asset('storage/' . $property->featured_image) }}" alt="Property">
    </div>
    <div class="property-info" >
        @if ($property->approved_by)
            <div class="approval-badge">
                <img src="{{ asset('v2/assets/badge.png') }}" alt="{{ $property->approved_by}} Approved">
                <span>{{ $property->approved_by}} Approved</span>
            </div>
        @endif
        <h3>{{ $property->title }}</h3>
        <p class="property-location">{{ $property->agent->name }}</p>
        <div class="property-features">
            @if($property->bedrooms)
                <div class="feature-item">
                    <img class="feature-icon" src="{{ asset('v2/assets/BedIcon.svg') }}" alt="Beds">
                    <span>{{ $property->bedrooms }} Beds</span>
                </div>
            @endif
            @if($property->bathrooms)
                <div class="feature-item">
                    <img class="feature-icon" src="{{ asset('v2/assets/BathIcon.svg') }}" alt="Baths">
                    <span>{{ $property->bathrooms}} Baths</span>
                </div>
            @endif
            @if($property->size)
                <div class="feature-item">
                    <img class="feature-icon" src="{{ asset('v2/assets/SqrftIcon.svg') }}" alt="Sqft">
                    <span>{{ $property->size }} sqft</span>
                </div>
            @elseif($property->carpet_area)
                <div class="feature-item">
                    <img class="feature-icon" src="{{ asset('v2/assets/SqrftIcon.svg') }}" alt="Sqft">
                    <span>{{ $property->carpet_area }} sqft</span>
                </div>
            @elseif($property->build_up_area)
                <div class="feature-item">
                    <img class="feature-icon" src="{{ asset('v2/assets/SqrftIcon.svg') }}" alt="Sqft">
                    <span>{{ $property->build_up_area }} sqft</span>
                </div>
            @elseif($property->super_built_up_area)
                <div class="feature-item">
                    <img class="feature-icon" src="{{ asset('v2/assets/SqrftIcon.svg') }}" alt="Sqft">
                    <span>{{ $property->super_built_up_area }} sqft</span>
                </div>
            @endif
        </div>

        @include('partials.reactions')

        <div class="property-footer">
            <div class="price">{{ formatPrice($property->price) }}</div>
        </div>
    </div>
</a>



