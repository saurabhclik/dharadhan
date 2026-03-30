<!-- Recommended Properties -->
<section class="properties-section" id="properties-section">
    <div class="container">
        <div class="section-header recommended-header">
            <div class="header-content">
                <p class="section-tag recommended-tag">Best real estate jaipur</p>
                <h2 class="recommended-title">Recommended For You</h2>
            </div>
            <div class="property-filters">
                <a href="{{ route('index') }}/?type=all" class="filter-btn">All</a>
                <a href="{{ route('index') }}/?type=r" class="filter-btn">Residential</a>
                <a href="{{ route('index') }}/?type=c" class="filter-btn">Commercial</a>
                <a href="{{ route('index') }}/?type=c" class="filter-btn">PG</a>
            </div>
        </div>

        <div class="property-grid">
            <div class="swiper recommendedSwiper py-5">
                <div class="swiper-wrapper">
                    @forelse ($properties as $property)
                        <!-- Property Card 1 -->
                        <div class="property-card swiper-slide mx-2">
                            @include('partials.property-card', ['property' => $property])
                        </div>
                    @empty
                        <p>No properties found.</p>
                    @endforelse
                </div>
            </div>
            <!-- Navigation -->
            <div class="carousel-controls">
                <button class="nav-btn prev nav-btn-rprev">‹</button>
                <button class="nav-btn next nav-btn-rnext">›</button>
            </div>
        </div>
    </div>
</section>


@push('scripts')
    <script>
        new Swiper('.recommendedSwiper', {
            loop: true,
            spaceBetween: 20,
            navigation: {
                nextEl: '.nav-btn-rnext',
                prevEl: '.nav-btn-rprev',
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 1,
                },
                992: {
                    slidesPerView: 3,
                },
            }
        });
    </script>
@endpush

@push('styles')
    <style>
        .swiper-wrapper{
            padding: 0 20px;
        }
        .properties-section .swiper-slide {
            height: auto;
        }

        .properties-section{
            background: #f9fafb;
        }

        .properties-section .nav-btn{
            border: 1.5px solid #ddd;
        }

        .properties-section .property-card {
            overflow: unset;
        }
        @media (max-width: 768px) {
            .swiper-wrapper{
                padding: 0px;
            }
            .properties-section .swiper {
                padding: 10px;
            }
            .properties-section .container{
                padding: 0 10px;
            }

            .properties-section .approval-badge{
                right: -9px;
            }
        }
    </style>
@endpush
