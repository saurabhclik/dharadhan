<!-- Property Types Section -->
<section class="property-types-section">
    <!-- Background Shape 243 -->
    <svg class="bg-shape bg-shape-243" xmlns="http://www.w3.org/2000/svg" width="1224" height="864" viewBox="0 0 1224 864" fill="none" preserveAspectRatio="none">
        <g filter="url(#filter0_d_258_2593)">
            <path d="M850.772 -0.822504L1272.45 -0.822538L585.226 728.573L72.9396 728.573L850.772 -0.822504Z" fill="url(#paint0_linear_258_2593)" fill-opacity="0.05" shape-rendering="crispEdges"/>
        </g>
        <defs>
            <filter id="filter0_d_258_2593" x="0" y="-12.2193" width="1345.39" height="875.275" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="61.5428"/>
                <feGaussianBlur stdDeviation="36.4698"/>
                <feComposite in2="hardAlpha" operator="out"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.05 0"/>
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_258_2593"/>
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_258_2593" result="shape"/>
            </filter>
            <linearGradient id="paint0_linear_258_2593" x1="1156.5" y1="-114.607" x2="203.427" y2="856.622" gradientUnits="userSpaceOnUse">
                <stop stop-color="white"/>
                <stop offset="1" stop-color="#103C3B"/>
            </linearGradient>
        </defs>
    </svg>

    <!-- Background Shape 244 -->
    <svg class="bg-shape bg-shape-244" xmlns="http://www.w3.org/2000/svg" width="638" height="766" viewBox="0 0 638 766" fill="none" preserveAspectRatio="none">
        <g filter="url(#filter0_d_258_2594)">
            <path d="M695.671 22.145L695.671 443.615L483.113 646.388L70.8642 646.388L695.671 22.145Z" fill="url(#paint0_linear_258_2594)" fill-opacity="0.05" shape-rendering="crispEdges"/>
        </g>
        <defs>
            <filter id="filter0_d_258_2594" x="3.8147e-05" y="-4.95911e-05" width="766.535" height="765.972" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="48.7192"/>
                <feGaussianBlur stdDeviation="35.4321"/>
                <feComposite in2="hardAlpha" operator="out"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"/>
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_258_2594"/>
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_258_2594" result="shape"/>
            </filter>
            <linearGradient id="paint0_linear_258_2594" x1="700.164" y1="177.513" x2="220.723" y2="645.328" gradientUnits="userSpaceOnUse">
                <stop stop-color="white"/>
                <stop offset="1" stop-color="#103C3B"/>
            </linearGradient>
        </defs>
    </svg>

    <div class="container">
        <p class="section-tag">Projects based on your preference</p>
        <h2>Move in now, next year or later</h2>
        <div class="property-types-wrapper moveNextSwiper">
            <div class="property-types-grid swiper-wrapper">
                <a class="property-type-card swiper-slide" href="{{ route('properties') }}?keyword=furnished" class="text-decoration-none">
                    <img src="v2/images/Furnished.png" alt="Furnished">
                    <div class="card-text">
                        <h3>Furnished</h3>
                        <p>Fully equipped with essential furniture and fittings, ready for immediate move-in.</p>
                    </div>
                </a>
                <a class="property-type-card swiper-slide" href="{{ route('properties') }}?keyword=semi_furnished" class="text-decoration-none">
                    <img src="v2/images/SemiFurnished.png" alt="Semi-Furnished">
                    <div class="card-text">
                        <h3>Semi-Furnished</h3>
                        <p>Includes basic fittings and essential furniture, offering flexibility to add your personal touch.</p>
                    </div>
                </a>
                <div class="property-type-card swiper-slide upcoming-card">
                    <img src="v2/images/Upcoming.png" alt="Upcoming">
                    <div class="card-overlay-white">
                        <div class="card-text">
                            <h3>Upcoming</h3>
                            <p>Property under development, offering early investment opportunities and future-ready living.</p>
                        </div>
                        <div class="countdown-timer">
                            <div class="timer-box">
                                <span class="timer-value">6</span>
                                <span class="timer-label">DAYS</span>
                            </div>
                            <div class="timer-box">
                                <span class="timer-value">12</span>
                                <span class="timer-label">HOURS</span>
                            </div>
                            <div class="timer-box">
                                <span class="timer-value">58</span>
                                <span class="timer-label">MINUTES</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-controls d-lg-none d-md-none">
                <button class="nav-btn prev nav-btn-mnrprev">‹</button>
                <button class="nav-btn next nav-btn-mnrnext">›</button>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        new Swiper('.moveNextSwiper', {
            loop: false,
            spaceBetween: 20,
            navigation: {
                nextEl: '.nav-btn-mnrnext',
                prevEl: '.nav-btn-mnrprev',
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

        .property-types-section .nav-btn{
            border: 1.5px solid #ddd;
        }
    </style>
@endpush
