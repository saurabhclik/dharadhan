<!-- Testimonials Section -->
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
                        @if($testimonials->isEmpty())
                            <div class="testimonial-card swiper-slide">
                                <div class="testimonial-header">
                                    <div class="avatar"><img class="img-fluid rounded-circle" width="90" height="90" src="{{ asset('v2/assets/avatar.png') }}" alt="avatar"></div>
                                    <div>
                                        <img class="quote-icon" width="20" src="{{ asset('v2/assets/quote.png')}}" alt="quote">
                                        <h4>Rohit Kumar</h4>
                                        <p>Jaipur, India</p>
                                    </div>
                                </div>
                                <p class="testimonial-text">
                                    "Dharadhan Real Estate made my home-buying journey completely stress-free. Their team was transparent, knowledgeable, and extremely supportive throughout the process. I especially appreciated their honest advice and timely updates. Highly recommended for anyone looking to invest in Jaipur."
                                </p>
                            </div>
                            <div class="testimonial-card swiper-slide">
                                <div class="testimonial-header">
                                    <div class="avatar"><img class="img-fluid rounded-circle" width="90" height="90" src="{{ asset('v2/assets/avatar.png') }}" alt="avatar"></div>
                                    <div>
                                        <img class="quote-icon" width="20" src="{{ asset('v2/assets/quote.png')}}" alt="quote">
                                        <h4>Anjali Sharma</h4>
                                        <p>Jaipur, India</p>
                                    </div>
                                </div>
                                <p class="testimonial-text">
                                    "I had a wonderful experience with Dharadhan Real Estate. The team understood my budget and requirements perfectly and showed me genuine, RERA-approved properties. Their professionalism and commitment really set them apart from others in the market."
                                </p>
                            </div>
                            <div class="testimonial-card swiper-slide">
                                <div class="testimonial-header">
                                    <div class="avatar"><img class="img-fluid rounded-circle" width="90" height="90" src="{{ asset('v2/assets/avatar.png') }}" alt="avatar"></div>
                                    <div>
                                        <img class="quote-icon" width="20" src="{{ asset('v2/assets/quote.png')}}" alt="quote">
                                        <h4>Vikas Patel</h4>
                                        <p>Jaipur, India</p>
                                    </div>
                                </div>
                                <p class="testimonial-text">
                                    "From site visits to documentation, Dharadhan Real Estate handled everything smoothly. Their attention to detail and clear communication gave me complete confidence in my investment. I would definitely work with them again for future property purchases."
                                </p>
                            </div>
                            <div class="testimonial-card swiper-slide">
                                <div class="testimonial-header">
                                    <div class="avatar"><img class="img-fluid rounded-circle" width="90" height="90" src="{{ asset('v2/assets/avatar.png') }}" alt="avatar"></div>
                                    <div>
                                        <img class="quote-icon" width="20" src="{{ asset('v2/assets/quote.png')}}" alt="quote">
                                        <h4>Neha Mehta</h4>
                                        <p>Jaipur, India</p>
                                    </div>
                                </div>
                                <p class="testimonial-text">
                                    "Excellent service and genuine guidance! Dharadhan Real Estate helped me find the perfect property that matched both my lifestyle and investment goals. The team was responsive, polite, and extremely professional from start to finish."
                                </p>
                            </div>
                        @else
                            @foreach($testimonials as $testimonial)
                                <div class="testimonial-card swiper-slide">
                                    <div class="testimonial-header">
                                        <div class="avatar">
                                            {{ shortName($testimonial->name) }}
                                        </div>
                                        <div>
                                            <img class="quote-icon" width="20" src="{{ asset('v2/assets/quote.png')}}" alt="quote">
                                            <h4>{{ $testimonial->name ? $testimonial->name : 'Anonymous' }}</h4>
                                            <p>{{ $testimonial->location ? $testimonial->location : 'Location not specified' }}</p>
                                        </div>
                                    </div>
                                    <p class="testimonial-text">
                                        {{ $testimonial->message }}
                                    </p>
                                </div>
                            @endforeach
                        @endif
                                            

                    </div>
                </div>

                <!-- Navigation -->
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
