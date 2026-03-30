<nav class="navbar">
    <div class="nav-left">
        <div class="logo">
            <a href="{{ route('index') }}">
                <img src="{{ config('settings.site_logo_lite') ?? asset('images/logo-footer.svg') }}" alt="Dharadhan">
            </a>
        </div>

        <div class="nav-dropdown city-mega" id="cityDropdown">
            <button class="nav-dropdown-toggle city-toggle" id="cityToggle">
                <span id="selectedCity">Buy in {{ request()->get('city','Jaipur') }}</span>
                <svg class="arrow" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M4.5 6.75L9 11.25L13.5 6.75"
                    stroke="white" stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"/>
                </svg>
            </button>
            <ul class="nav-dropdown-menu city-mega-menu">
                <div class="city-mega-inner">
                    @foreach (cities() as $key => $cities)
                        <div class="city-column">
                            <h4>{{ ucwords(str_replace("_", " ", $key)) }}</h4>
                            @php $cities = sortCitiesByName($key); @endphp
                            @foreach ($cities as $location)
                                <a class="type-link"
                                href="{{ route('properties', ['keyword' => $location['slug'],'city' => $location['name']]) }}"
                                data-city="{{ $location['slug'] }}">
                                    {{ $location['name'] }}
                                </a>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </ul>
        </div>
    </div>

    <div class="nav-links mega-container" id="nav">
        <div class="mega-item">
            <a href="javascript:void(0)" class="mega-trigger" data-menu="buyMenu">Buy</a>
        </div>
        <div class="mega-item">
            <a href="javascript:void(0)" class="mega-trigger" data-menu="sellMenu">Sell</a>
        </div>
        <div class="mega-item">
            <a href="javascript:void(0)" class="mega-trigger" data-menu="rentMenu">Rent</a>
        </div>
        <div class="mega-item">
            <a href="javascript:void(0)" class="mega-trigger" data-menu="pgMenu">PG</a>
        </div>
        <a href="{{ route('properties') }}?user_type=owner">Owners</a>
        <a href="{{ route('properties') }}?user_type=builder">Builders</a>
        <div class="mega-wrapper">
            <div class="mega-menu" id="buyMenu">
                <div class="mega-column">
                    <h2>Budget</h2>
                    <a href="{{ route('properties') }}?min_price=0&max_price=5000000">Under ₹ 50 Lac</a>
                    <a href="{{ route('properties') }}?min_price=5000000&max_price=10000000">₹ 50 Lac - ₹ 1 Cr</a>
                    <a href="{{ route('properties') }}?min_price=10000000&max_price=15000000">₹ 1 Cr - ₹ 1.5 Cr</a>
                    <a href="{{ route('properties') }}?min_price=15000000">Above ₹ 1.5 Cr</a>
                </div>
                <div class="mega-column">
                    <h2>Property Types</h2>
                    @foreach (\App\Models\Property::typeStats() as $type)
                        @php $typeName = $type['type']; @endphp
                        <a href="{{ route('properties') }}?property_type={{ $typeName }}">
                            @if($typeName == 'plot_land')
                                <i class="fa fa-tree"></i>
                            @elseif($typeName == 'flat_apartment')
                                <i class="fa fa-building"></i>
                            @elseif($typeName == 'independent_house_villa')
                                <i class="fa fa-house"></i>
                            @elseif($typeName == 'independent_builder_floor')
                                <i class="fa fa-building"></i>
                            @elseif($typeName == 'office')
                                <i class="fa fa-briefcase"></i>
                            @elseif($typeName == 'retail')
                                <i class="fa fa-shop"></i>
                            @elseif($typeName == 'plot_land_commercial')
                                <i class="fa fa-industry"></i>
                            @else
                                <i class="fa fa-building"></i>
                            @endif
                            {{ $type['item']['name'] }}
                        </a>
                    @endforeach
                </div>
                <div class="mega-column">
                    <h2>Explore</h2>
                    <a href="{{ route('properties') }}?keyword=jaipur">Localities in Jaipur</a>
                    <a href="{{ route('agents.listing') }}">Find an Agent</a>
                    <a href="{{ route('properties') }}">Home Interiors in Jaipur</a>
                </div>
            </div>
            <div class="mega-menu" id="sellMenu">
                <div class="mega-column">
                    <h2>For Owner</h2>
                    <a href="{{ route('post.property') }}">Post Property Free</a>
                    <a href="{{ route('myaccount.home') }}">My Dashboard</a>
                </div>

                <div class="mega-column">
                    <h2>For Agent & Builder</h2>
                    <a href="{{ route('myaccount.home') }}">My Dashboard</a>
                    <a href="{{ route('contact') }}">Sales Enquiry</a>
                </div>
            </div>
            <div class="mega-menu" id="rentMenu">
                <div class="mega-column">
                    <h2>Popular Choices</h2>
                    <a href="{{ asset('properties') }}?user_type=owner">Owner Properties</a>
                    <a href="{{ route('properties') }}?verified=1">Verified Properties</a>
                    <a href="{{ route('properties') }}?furnished=1">Furnished Homes</a>
                    <a href="{{ route('properties') }}?availability_status=immediately_available">Immediately Available</a>

                </div>

                <div class="mega-column">
                    <div class="mega-column">
                        <h2>Property Types</h2>
                        @foreach (\App\Models\Property::typeStats() as $type)
                        @php $typeName = $type['type']; @endphp
                        <a href="{{ route('properties') }}?property_type={{ $typeName }}">
                            @if($typeName == 'plot_land')
                                <i class="fa fa-tree"></i>
                            @elseif($typeName == 'flat_apartment')
                                <i class="fa fa-building"></i>
                            @elseif($typeName == 'independent_house_villa')
                                <i class="fa fa-house"></i>
                            @elseif($typeName == 'independent_builder_floor')
                                <i class="fa fa-building"></i>
                            @elseif($typeName == 'office')
                                <i class="fa fa-briefcase"></i>
                            @elseif($typeName == 'retail')
                                <i class="fa fa-shop"></i>
                            @elseif($typeName == 'plot_land_commercial')
                                <i class="fa fa-industry"></i>
                            @else
                                <i class="fa fa-building"></i>
                            @endif
                            {{ $type['item']['name'] }}
                        </a>
                    @endforeach
                    </div>
                </div>
                <div class="mega-column">
                    <div class="mega-column">
                        <h2>Budget</h2>
                        <a href="{{ route('properties') }}?min_price=0&max_price=10000">₹ 10,000</a>
                        <a href="{{ route('properties') }}?min_price=0&max_price=15000">0,000 - ₹ 15,000</a>
                        <a href="{{ route('properties') }}?min_price=15000&max_price=25000">15,000 - ₹ 25,000</a>
                        <a href="{{ route('properties') }}?min_price=0&max_price=25000">Above ₹ 25,000</a>
                    </div>
                </div>
            </div>
            <div class="mega-menu" id="pgMenu">
                <div class="mega-column">
                    <h2>Popular Choices</h2>
                    <a href="{{ route('properties') }}?property_type=pg&user_type=owner">Owner PG</a>
                    <a href="{{ route('properties') }}?property_type=pg&verified=1">Verified PG</a>
                    <a href="{{ route('properties') }}?property_type=pg&furnishing=furnished">Furnished PG</a>
                    <a href="{{ route('properties') }}?property_type=pg&availability_status=immediately_available">Immediately Available</a>
                </div>
                <div class="mega-column">
                    <h2>Sharing Type</h2>
                    <a href="{{ route('properties') }}?property_type=pg&sub_type=single">Single Sharing</a>
                    <a href="{{ route('properties') }}?property_type=pg&sub_type=double">Double Sharing</a>
                    <a href="{{ route('properties') }}?property_type=pg&sub_type=triple">Triple Sharing</a>
                    <a href="{{ route('properties') }}?property_type=pg&sub_type=foursharing">Four Sharing</a>
                </div>
                <div class="mega-column">
                    <h2>Budget (Monthly)</h2>
                    <a href="{{ route('properties') }}?property_type=pg&max_price=5000">Under ₹ 5,000</a>
                    <a href="{{ route('properties') }}?property_type=pg&min_price=5000&max_price=8000">₹ 5,000 - ₹ 8,000</a>
                    <a href="{{ route('properties') }}?property_type=pg&min_price=8000&max_price=12000">₹ 8,000 - ₹ 12,000</a>
                    <a href="{{ route('properties') }}?property_type=pg&min_price=12000">Above ₹ 12,000</a>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-actions mt-4">
        @auth
            <div class="nav-dropdown" id="userDropdown">
                <button class="nav-dropdown-toggle user-menu" id="userToggle" style="padding:0px;">
                    <div class="user-icon user-avatar">
                        @if(auth()->user()->photo)
                            <img width="40" height="40" class="br-100"
                                src="{{ getUserPhoto(auth()->user()) }}" alt="User Photo">
                        @else
                            <i class="fa-regular fa-user"></i>
                        @endif
                    </div>

                    <span class="user-name">Hi, {{ Auth::user()->ShortName }}</span>

                    <svg class="arrow" width="18" height="18" viewBox="0 0 24 24">
                        <path d="M6 9L12 15L18 9"
                            stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>

                <ul class="nav-dropdown-menu">
                    <a class="type-link" href="{{ route('myaccount.profile') }}">
                        <li>Profile</li>
                    </a>
                    <a class="type-link" href="{{ route('myaccount.properties') }}">
                        <li>Properties</li>
                    </a>
                    <a class="type-link" href="{{ route('post.property.primarydetails') }}">
                        <li>Add Property</li>
                    </a>
                    <a class="type-link" href="{{ route('myaccount.leads') }}">
                        <li>All Leads</li>
                    </a>
                    <!-- <a class="type-link" href="{{ route('myaccount.transferred.leads') }}">
                        <li>Transferred Leads</li>
                    </a> -->
                    <li><a href="https://crm.dharadhan.com/" target="_blank" rel="noopener noreferrer">CRM Access</a></li>
                    <a class="type-link" href="{{ route('myaccount.change.password') }}">
                        <li>Change Password</li>
                    </a>
                    <span class="type-link" onClick="$('#logout-form').submit();">
                        <li>Log Out</li>
                    </span>
                </ul>
            </div>
        @endauth

        @guest
            <div class="user-menu">
                <a data-bs-toggle="modal" data-bs-target="#authModal">
                    <div class="user-icon">
                        <i class="fa-regular fa-user"></i>
                    </div>
                </a>
            </div>
        @endguest

        <button onclick="window.location.href='{{ route('post.property.primarydetails') }}'" class="post-property-btn">
            <span>Post property</span>
            <span class="free-badge">Free</span>
        </button>
        <div class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </div>
    </div>
</nav>
<style>
    .city-mega-menu 
    {
        width: 800px;
        background: #fff;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 18px 40px rgba(0,0,0,.15);
    }
    .city-column h4 
    {
        font-size: 16px;
        font-weight: 600;
        color: #103c3b;
        margin-bottom: 12px;
        letter-spacing: 0.2px;
        width: 100%;
    }
    .city-column 
    {
        display: flex;
        flex-wrap: wrap;
        gap: 1px;
        padding: 4px;
    }
    .city-column a 
    {
        width: calc(33.333% - 22px);
        font-size: 15px;
        color: #555;
        text-decoration: none;
        white-space: nowrap;
        transition: color .2s ease;
    }
    .city-column a:hover 
    {
        color: #103c3b;
    }
    .buy-item 
    {
        border-radius: unset !important;
        border: unset !important;
        background: unset !important;
        backdrop-filter: unset !important;
    }
    .nav-buy-item, .nav-buy-item:hover
    {
        width: max-content !important;
        background: unset !important;
        backdrop-filter: blur(10px) !important;
    }
    .mega-menu 
    {
        position: absolute;
        top: 100px;
        left: 50%;
        transform: translateX(-50%);
        width: 65%;
        background: #fff;
        border-radius: 10px;
        padding: 26px 34px;
        box-shadow: 0 18px 40px rgba(0,0,0,0.12);
        display: none;
        z-index: 9999;
    }
    .mega-menu.active 
    {
        display: flex;
    }
    .mega-column 
    {
        flex: 1;
        padding: 0 26px;
        border-right: 1px solid #eeeeee;
    }

    .mega-column:first-child {
        padding-left: 0;
    }

    .mega-column:last-child {
        border-right: none;
        padding-right: 0;
    }
    .mega-column h2 {
        font-size: 16px;
        font-weight: 600;
        color: #103c3b;
        margin-bottom: 12px;
        letter-spacing: 0.2px;
    }

    .mega-column h2:not(:first-child) {
        margin-top: 26px;
    }
    .mega-column a {
        display: block;
        font-size: 13px;
        color: #6b6b6b;
        padding: 6px 0;
        text-decoration: none;
        line-height: 1.35;
        transition: color 0.2s ease;
    }

    .mega-column a:hover {
        color: #103c3b;
    }
    .buy-item {
        cursor: pointer;
    }

    @media (max-width: 900px) {
        .hero-content{
            padding: 0px;
        }

        .hero-content .nav-links{
            padding: 20px;
        }

        .hero-content .hero-text, .hero-content .nav-left, .hero-content .nav-actions{
            padding: 0 24px;
        }

        .mega-menu.active {
            display: grid;
            grid-template-columns: 1fr;
        }

        .mega-menu {
            width: 90%;
        }

        .city-mega-menu {
            width: 250px;
        }

        .city-column a {
            width: 100%;
        }

        .city-mega-inner{
            height: 80vh;
            overflow: scroll;
        }
    }
</style>
<!-- CRM Access Modal -->
<div class="modal fade" id="crmModal" tabindex="-1" role="dialog" aria-labelledby="crmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crmModalLabel">CRM Lead Management Access</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> 
                    <strong>Note:</strong> Your login credentials are the same for lead management CRM.
                </div>
                <div class="text-center mt-3">
                    <a href="https://crm.dharadhan.com/" target="_blank" class="btn btn-primary">
                        <i class="fas fa-external-link-alt"></i> Access CRM
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        const triggers = document.querySelectorAll('.mega-trigger');
        const menus = document.querySelectorAll('.mega-menu');
        const megaWrapper = document.querySelector('.mega-wrapper');

        let hideTimeout = null;
        const HIDE_DELAY = 250;

        function hideMenus() {
            menus.forEach(menu => menu.classList.remove('active'));
        }

        function cancelHide() {
            clearTimeout(hideTimeout);
        }

        function scheduleHide() {
            hideTimeout = setTimeout(hideMenus, HIDE_DELAY);
        }
        triggers.forEach(trigger => {
            const menu = document.getElementById(trigger.dataset.menu);

            trigger.addEventListener('mouseenter', () => {
                cancelHide();
                hideMenus();
                menu.classList.add('active');
            });

            trigger.addEventListener('mouseleave', () => {
                scheduleHide();
            });
        });
        megaWrapper.addEventListener('mouseenter', cancelHide);
        megaWrapper.addEventListener('mouseleave', scheduleHide);
    </script>

@endpush
