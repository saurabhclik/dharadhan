<header id="header-container" class="db-top-header">
    <!-- Header -->
    <div id="header">
        <div class="container-fluid">
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
                            <a href="{{ route('myaccount.home') }}">Dahsboard</a>
                        </li>
                    </ul>
                </nav>
                <div class="clearfix"></div>
                <!-- Main Navigation / End -->
            </div>
            <!-- Left Side Content / End -->
            <!-- Right Side Content / -->
            <div class="header-user-menu user-menu">
                <div class="header-user-name">
                    <span><img src="{{ getUserPhoto(auth()->user()) }}" alt=""></span>
                    Hi, {{ auth()->user()->ShortName }}
                </div>
                <ul>
                    <li><a href="{{ route('myaccount.home') }}"> Dashboard</a></li>
                    <li><a href="{{ route('myaccount.profile') }}"> Profile</a></li>
                    <li><a href="{{ route('myaccount.properties') }}"> Properties</a></li>
                    <li><a href="{{ route('post.property.primarydetails') }}"> Add Property</a></li>
                    <li><a href="{{ route('myaccount.leads') }}"> All Leads</a></li>
                    <li><a href="{{ route('myaccount.transferred.leads') }}"> Transferred Leads</a></li>
                    <li><a href="{{ route('myaccount.change.password') }}"> Change Password</a></li>
                    <li><a href="#" onClick="$('#logout-form').submit();">Log Out</a></li>
                </ul>
            </div>
            <!-- Right Side Content / End -->
        </div>
    </div>
    <!-- Header / End -->
</header>
