<header id="header-container" class="db-top-header">
    <!-- Header -->
    <div id="header">
        <div class="row mt-0">
            <!-- Left Side Content -->
            <div class="left-side">
                <!-- Mobile Navigation -->
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
                <!-- Main Navigation -->
                <nav id="navigation" class="style-1">
                    <ul id="responsive">
                        <li>
                            <a href="{{ route('myaccount.home') }}"><img src="{{ config('settings.site_logo_lite') ?? asset('images/logo-blue.svg') }}"
            alt="{{ config('app.name') }}" width="70" height="70"></a>
                        </li>
                    </ul>
                </nav>
                <div class="clearfix"></div>
                <!-- Main Navigation / End -->
                 <!-- CRM Access Button -->

            </div>
            <!-- Left Side Content / End -->
            <!-- Right Side Content / -->
             
            <div class="header-user-menu user-menu">
                <div class="header-user-name">
                    <span class="user-img-wrapper">
                        <img src="{{ getUserPhoto(auth()->user()) }}" alt="">
                    </span>
                    <span class="verify-badge">
                        <i class="fa fa-check text-success" style="font-size:16px !important;position:absolute;left: 28px;top: 0px;"></i>
                    </span>

                    Hi, {{ auth()->user()->ShortName }}
                </div>

                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('myaccount.profile') }}"> Profile</a></li>
                    <li><a href="{{ route('myaccount.properties') }}"> Properties</a></li>
                    <li><a href="{{ route('post.property.primarydetails') }}"> Add Property</a></li>
                    <li><a href="{{ route('myaccount.leads') }}"> All Leads</a></li>
                    <li><a href="{{ route('myaccount.change.password') }}"> Change Password</a></li>
                    <!-- <li><a href="#" data-toggle="modal" data-target="#crmModal">CRM Access</a></li> -->
                    <li><a href="#" onClick="$('#logout-form').submit();">Log Out</a></li>
                </ul>
            </div>
            <!-- Right Side Content / End -->
        </div>
    </div>
    <!-- Header / End -->
</header>

<!-- CRM Access Modal -->
<!-- <div class="modal fade" id="crmModal" tabindex="-1" role="dialog" aria-labelledby="crmModalLabel" aria-hidden="true">
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
</div> -->