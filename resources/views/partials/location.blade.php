<!-- Location Section -->
<section class="location-section">
    <div class="container">
        <div class="location-content">
            <div class="location-left">
                <div class="location-tags">
                    <img src="{{ asset('v2/images/merchant-map.png') }}" alt="merchant">
                    <!-- Location Buttons -->
                    @foreach(jaipur_locations() as $location)
                        <a href="{{ route('properties', ['keyword' => $location['keyword'],'city' => $location['name']]) }}"
                        class="map-btn"
                        style="
                            top: {{ $location['top'] }}%;
                            left: {{ $location['left'] }}%;
                        ">
                            {{ $location['name'] }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="location-right">
                <p class="section-tag">{{ config('app.name') }} Ventures Pvt Ltd...</p>
                <h2>We serve Every location in Jaipur!</h2>
                <p>
                    We serve every location in Jaipur, offering trusted real estate solutions with verified properties, expert guidance, and end-to-end support to help you buy, sell, or rent with confidence. <br><br>

                    DharaDhan Ventures Pvt. Ltd.
                    Real Estate • Finance • Consultancy<br>
                    Serving with Trust Since 2000
                </p>
            </div>
        </div>
    </div>
</section>

@push('styles')
    <style>
        .location-tags {
            position: relative;
            max-width: 100%;
        }

        .location-tags img {
            width: 100%;
            display: block;
        }

        /* Button Style */
        .map-btn {
            position: absolute;
            background: #fff;
            padding: 10px 16px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            color: #000;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .map-btn:hover {
            background: #f97316;
            color: #fff;
            transform: translateY(-3px);
        }
        .pos-1 { top: 20%; left: 15%; }
        .pos-2 { top: 30%; left: 35%; }
        .pos-3 { top: 45%; left: 20%; }
        .pos-4 { top: 55%; left: 45%; }
        .pos-5 { top: 25%; left: 60%; }

        @media (max-width: 768px) {
            .map-btn {
                font-size: 12px;
                padding: 8px 12px;
            }
        }
    </style>    

@endpush