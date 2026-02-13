<!-- PG/Co-living Section -->
<section class="pg-section">
    <div class="container">
        <div class="pg-content">
            <div class="pg-left">
                <p class="section-tag">RENT A PG/ CO-LIVING</p>
                <h2>Paying Guest or Co-living options</h2>
                <p>Monthly Package Details For PG Owners : Please list your PG in our Website to get leads for your Business to your Mobile Number on Daily basic. Our Listing Fees only Rs 999 for 1 Month to get Unlimited Leads to your Mobile Number. Please fill below Form and make the Payment Online.</p>
                <a href="{{ route('properties') }}" class="btn btn-primary type-link">Explore PG/ Co-living</a>
            </div>
            <div class="pg-right swiper verticalPropertySlider">
                <div class="col-lg-12 col-md-12 col-12 pg-items swiper-wrapper">
                    @forelse ($pgproperties as $property)
                        <div class="listing-card mb-4 swiper-slide">
                            <div class="listing-img">
                                <span class="badge-new">⚡ NEW ARRIVAL</span>
                                <img src="{{ asset('storage/' . $property->featured_image) }}" alt="">
                            </div>
                            <div class="listing-info">
                                <h5>{{ $property->title }}</h5>
                                <span class="location">{{ Str::limit(strip_tags($property->location), 35, '...') }}</span>

                                <ul class="meta">
                                    @if($property->bedrooms)
                                        <li><i class="bi bi-bed"></i> {{ $property->bedrooms }} Beds</li>
                                    @endif
                                    @if($property->bathrooms)
                                        <li><i class="bi bi-droplet"></i> {{ $property->bathrooms }} Baths</li>
                                    @endif
                                    @if($property->size)
                                        <li><i class="bi bi-aspect-ratio"></i> {{ $property->size }} sqft</li>
                                    @elseif($property->carpet_area)
                                        <li><i class="bi bi-aspect-ratio"></i> {{ $property->carpet_area }} sqft</li>
                                    @elseif($property->build_up_area)
                                        <li><i class="bi bi-aspect-ratio"></i> {{ $property->build_up_area }} sqft</li>
                                    @elseif($property->super_built_up_area)
                                        <li><i class="bi bi-aspect-ratio"></i> {{ $property->super_built_up_area }} sqft</li>
                                    @endif
                                </ul>
                                <div class="price">{{ formatPrice($property->price) }}</div>
                                <a href="{{ route('property.details', $property->id) }}" class="view-btn">View More</a>
                            </div>
                        </div>
                    @empty
                        <p>No PG/ Co-living properties found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        new Swiper('.verticalPropertySlider', {
            direction: 'vertical',
            slidesPerView: 3,
            spaceBetween: 24,
            centeredSlides: true,
            mousewheel: true,
            initialSlide: 1
        });
    </script>
@endpush

@push('styles')
    <style>
        .verticalPropertySlider {
            height: 700px;
        }

        /* Default faded slides */
        .verticalPropertySlider .swiper-slide {
            opacity: 0.35;
            transform: scale(0.95);
            transition: all 0.4s ease;
        }

        /* ACTIVE (middle) slide */
        .verticalPropertySlider .swiper-slide-active {
            opacity: 1;
            transform: scale(1);
            z-index: 2;
        }

        /* Slightly visible next/prev */
        .verticalPropertySlider .swiper-slide-next,
        .verticalPropertySlider .swiper-slide-prev {
            opacity: 0.6;
            transform: scale(0.97);
        }

        /* Card styling remains same */
        .property-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        }

    </style>
@endpush
