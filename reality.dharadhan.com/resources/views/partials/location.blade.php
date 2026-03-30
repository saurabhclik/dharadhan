<!-- Add Leaflet CSS in head section -->
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        .location-section {
            padding: 60px 0;
            background: #f9f9f9;
            position: relative;
            width: 100%;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
            width: 100%;
        }
        
        .location-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }
        
        .location-left {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            height: 500px;
            width: 100%;
            background: #e9e9e9;
        }
        
        #map {
            height: 500px !important;
            width: 100% !important;
            border-radius: 15px;
            z-index: 1;
            background: #f0f0f0;
        }
        
        .leaflet-container {
            height: 100%;
            width: 100%;
        }
        
        .location-right {
            padding: 20px;
        }
        
        .section-tag {
            color: #f97316;
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .location-right h2 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #333;
            line-height: 1.2;
        }
        
        .location-right p {
            color: #666;
            line-height: 1.8;
            font-size: 16px;
        }
        
        /* Custom marker popup styles */
        .leaflet-popup-content {
            margin: 10px;
            min-width: 200px;
        }
        
        .leaflet-popup-content h4 {
            margin: 0 0 8px 0;
            color: #333;
            font-size: 16px;
            font-weight: 600;
        }
        
        .leaflet-popup-content a {
            display: inline-block;
            padding: 8px 16px;
            background: #f97316;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .leaflet-popup-content a:hover {
            background: #e66712;
            transform: translateY(-2px);
        }
        
        /* Loading state */
        .map-loading {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            z-index: 2;
            background: rgba(255,255,255,0.9);
            border-radius: 15px;
        }
        
        .map-loading .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #f97316;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto 10px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Emoji marker style */
        .emoji-marker {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            line-height: 1;
            filter: drop-shadow(0 2px 5px rgba(0,0,0,0.3));
            transition: transform 0.2s ease;
        }
        
        .emoji-marker:hover {
            transform: scale(1.2);
            z-index: 1000 !important;
        }
        
        @media (max-width: 992px) {
            .location-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .location-right h2 {
                font-size: 30px;
            }
        }
        
        @media (max-width: 768px) {
            .location-section {
                padding: 40px 0;
            }
            
            .location-left, #map {
                height: 400px !important;
            }
            
            .location-right h2 {
                font-size: 26px;
            }
            
            .emoji-marker {
                font-size: 24px;
            }
        }
        
        @media (max-width: 480px) {
            .location-left, #map {
                height: 350px !important;
            }
            
            .location-right h2 {
                font-size: 24px;
            }
        }
    </style>
@endpush

<section class="location-section">
    <div class="container">
        <div class="location-content">
            <div class="location-left">
                <div id="map"></div>
                <div class="map-loading" id="map-loading">
                    <div class="spinner"></div>
                    <p>Loading map...</p>
                </div>
            </div>
            <div class="location-right">
                <p class="section-tag">{{ config('app.name') }} Ventures Pvt Ltd.</p>
                <h2>We serve Every location in Jaipur!</h2>
                <p>
                    We serve every location in Jaipur, offering trusted real estate solutions with verified properties, expert guidance, and end-to-end support to help you buy, sell, or rent with confidence.
                </p>
                <br>
                <p>
                    <strong>DharaDhan Ventures Pvt. Ltd.</strong><br>
                    Real Estate • Finance • Consultancy<br>
                    Serving with Trust Since 2000
                </p>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        window.addEventListener('load', function() 
        {
            const loadingEl = document.getElementById('map-loading');
            const mapElement = document.getElementById('map');
            
            if (!mapElement) 
            {
                return;
            }
            
            try 
            {
                if (typeof L === 'undefined') 
                {
                    throw new Error('Leaflet library not loaded');
                }
                
                const map = L.map('map', {
                    center: [26.9124, 75.7873], 
                    zoom: 12,
                    zoomControl: true,
                    fadeAnimation: true,
                    zoomAnimation: true
                });
                
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    subdomains: ['a', 'b', 'c'],
                    maxZoom: 19,
                    minZoom: 10
                }).addTo(map);
                
                if (loadingEl) 
                {
                    loadingEl.style.display = 'none';
                }
                
                const locations = @json(jaipur_locations());
                const emojiIcon = L.divIcon({
                    html: '<div class="emoji-marker">📍</div>',
                    className: 'emoji-marker-container',
                    iconSize: [30, 30],
                    iconAnchor: [15, 30],
                    popupAnchor: [0, -30]
                });
                
                const markers = [];
                
                locations.forEach(location => {
                    if (location.lat && location.lng) 
                    {
                        const markerOptions = {
                            title: location.name,
                            riseOnHover: true,
                            icon: emojiIcon
                        };
                        
                        const marker = L.marker([location.lat, location.lng], markerOptions).addTo(map);
                        markers.push(marker);
                        
                        const encodedLocation = encodeURIComponent(location.name);
                        const propertiesUrl = "{{ route('properties') }}?location=" + encodedLocation + "&city=Jaipur";
                        
                        const popupContent = `
                            <div style="text-align: center; min-width: 200px;">
                                <h4 style="margin: 0 0 8px 0; color: #333; font-size: 16px; font-weight: 600;">
                                    📍 ${location.name}
                                </h4>
                                <p style="margin: 0 0 12px 0; color: #666; font-size: 14px;">
                                    Click to view properties in this area
                                </p>
                                <a href="${propertiesUrl}" 
                                   style="display: inline-block; padding: 8px 20px; background: #f97316; color: white; 
                                          text-decoration: none; border-radius: 5px; font-size: 14px; font-weight: 500;
                                          transition: all 0.3s ease;">
                                    View Properties
                                </a>
                            </div>
                        `;
                        
                        marker.bindPopup(popupContent, {
                            maxWidth: 250,
                            minWidth: 200,
                            className: 'custom-popup'
                        });
                    }
                });
                
                if (markers.length > 0) 
                {
                    const group = L.featureGroup(markers);
                    map.fitBounds(group.getBounds().pad(0.1));
                }
                
                setTimeout(function() 
                {
                    map.invalidateSize();
                    console.log('Map size invalidated');
                }, 500);
                
                L.control.scale({
                    imperial: false,
                    metric: true,
                    position: 'bottomleft'
                }).addTo(map);
            } 
            catch (error) 
            {
                console.error('Map error:', error);
                
                if (loadingEl) 
                {
                    loadingEl.innerHTML = `
                        <div style="color: #dc3545; padding: 20px;">
                            <p style="font-size: 18px; margin-bottom: 10px;">⚠️ Failed to load map</p>
                            <p style="font-size: 14px;">Error: ${error.message}</p>
                            <p style="font-size: 14px; margin-top: 10px;">Please refresh the page or try again later.</p>
                        </div>
                    `;
                }
                
                if (mapElement) 
                {
                    mapElement.innerHTML = `
                        <div style="display: flex; justify-content: center; align-items: center; height: 100%; background: #f8f8f8; border-radius: 15px;">
                            <div style="text-align: center; padding: 30px;">
                                <p style="color: #666; margin-bottom: 10px;">📍 Map temporarily unavailable</p>
                                <p style="color: #999; font-size: 14px;">Please try again later</p>
                            </div>
                        </div>
                    `;
                }
            }
        });
        
        window.addEventListener('resize', function() {
            const map = document.getElementById('map');
            if (map && map._leaflet_id) {
                setTimeout(function() {
                    map.invalidateSize();
                }, 100);
            }
        });
    </script>
@endpush