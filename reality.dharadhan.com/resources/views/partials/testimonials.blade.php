<section class="testimonials-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12">
                <p class="section-tag">Reviews & Ratings</p>
                <h2>What our Customers are Saying About {{ config('app.name') }}</h2>
                <div class="testimonial-stats">
                    <div class="stat">
                        <h3>{{ $totalPeople }}</h3>
                        <p>Happy People</p>
                    </div>
                    <div class="stat">
                        <h3>{{ $averageRating }}</h3>
                        <p>Overall rating</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="swiper testimonialSwiper">
                    <div class="swiper-wrapper">
                        @forelse($testimonials as $testimonial)
                            <div class="testimonial-card swiper-slide">
                                <div class="testimonial-header">
                                    <div class="avatar">
                                        {{ shortName($testimonial->name ?? 'Anonymous') }}
                                    </div>
                                    <div>
                                        <img class="quote-icon" width="20" src="{{ asset('v2/assets/quote.png')}}" alt="quote">
                                        <h4>{{ $testimonial->name ?? 'Anonymous' }}</h4>
                                        <p>{{ $testimonial->location ?? 'Location not specified' }}</p>
                                        <div class="stars">
                                            @for($i = 1; $i <= 5; $i++)
                                                <span class="{{ $i <= $testimonial->rating ? 'filled' : '' }} text-warning">★</span>
                                            @endfor
                                        </div>
                                    </div>
                                </div>

                                <p class="testimonial-text">
                                    "{{ $testimonial->message }}"
                                </p>
                            </div>
                        @empty
                            <div class="testimonial-card swiper-slide">
                                <div class="testimonial-header">
                                    <div class="avatar">NA</div>
                                    <div>
                                        <h4>No Reviews Yet</h4>
                                        <p>Be the first to review us</p>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="carousel-controls mt-3">
                    <button class="nav-btn prev nav-btn-tprev">‹</button>
                    <button class="nav-btn next nav-btn-tnext">›</button>
                </div>
            </div>
        </div>
    </div>
</section>
@push('styles')
    <style>
        .testimonials-section .carousel-controls{
            justify-content: start;
            margin-left: 50px;
        }
        .testimonials-section .nav-btn{
            border: 1.5px solid #ddd;
        }
        @media (max-width: 768px) {
            .testimonials-section .carousel-controls{
                justify-content: center;
                margin-left: 0;
            }
        }
    </style>
@endpush
@push('scripts')
    <script>
        new Swiper('.testimonialSwiper', {
            loop: true,
            spaceBetween: 20,
            navigation: {
                nextEl: '.nav-btn-tnext',
                prevEl: '.nav-btn-tprev',
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
                    slidesPerView: 1,
                },
            }
        });
    </script>
@endpush
