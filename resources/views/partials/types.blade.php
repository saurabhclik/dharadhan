<section class="types-section">
    <div class="container">
        <h2 class="text-center mb-1">Explore Real Estate Types</h2>
        <p class="text-center pt-0">Explore Real Estate Types Tailored to Your Needs</p>

        <div class="swiper typesSwiper py-5">
            <div class="swiper-wrapper">
                @foreach ($typeStats as $type)
                    <div class="swiper-slide">
                        <a href="{{ route('properties') }}?property_type={{ $type['type'] }}" class="type-link">
                            <div class="type-card">
                                <img src="{{ $type['item']['image'] }}" title="{{ $type['item']['image'] }}" alt="{{ $type['item']['name'] }}">
                                <div class="type-info">
                                    <h4>{{ $type['item']['name'] }}</h4>
                                    <span>{{ $type['count'] }} Properties</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Navigation -->
        <div class="carousel-controls">
            <button class="nav-btn prev nav-btn-prev">‹</button>
            <button class="nav-btn next nav-btn-next">›</button>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        new Swiper('.typesSwiper', {
            loop: true,
            spaceBetween: 20,
            navigation: {
                nextEl: '.nav-btn-next',
                prevEl: '.nav-btn-prev',
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
                    slidesPerView: 4,
                },
            }
        });
    </script>
@endpush

@push('styles')
    <style>
        .types-section .swiper-slide {
            height: auto;
            width: 33%;
        }

        .type-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        .type-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #000;
        }

        .types-section{
            background: #f9fafb;
        }

        .types-section .nav-btn{
            border: 1.5px solid #ddd;
        }
    </style>
@endpush
