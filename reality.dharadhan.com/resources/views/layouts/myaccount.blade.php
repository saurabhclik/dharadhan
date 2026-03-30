<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="{{ get_setting('site_description') }}">
    <meta name="author" content="">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ config('settings.site_favicon') ?? asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashbord-mobile-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightcase.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" id="color" href="{{ asset('css/default.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('styles')
</head>

<body class="inner-pages maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">

        <!-- START SECTION USER PROFILE -->
        <section class="user-page section-padding pt-5">
            <div class="container-fluid">
                <div class="row">
                  
                    <div class="col-lg-12 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">
                        <!-- Header Container -->
                        <div class="dash-content-wrap">
                            @include('partials.myaccount.header')
                        </div>

                        <div class="clearfix"></div>

                        <!-- Header Container / End -->
                        @include('partials.myaccount.mobile-sidebar')

                        @yield('content')

                        <div class="second-footer">
                            <div class="container">
                                <p>{{ date('Y') }} © Copyright - All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- END SECTION USER PROFILE -->
        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

        <!-- ARCHIVES JS -->
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/tether.min.js') }}"></script>
        <script src="{{ asset('js/moment.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/mmenu.min.js') }}"></script>
        <script src="{{ asset('js/mmenu.js') }}"></script>
        <script src="{{ asset('js/swiper.min.js') }}"></script>
        <script src="{{ asset('js/swiper.js') }}"></script>
        <script src="{{ asset('js/slick.min.js') }}"></script>
        <script src="{{ asset('js/slick2.js') }}"></script>
        <script src="{{ asset('js/fitvids.js') }}"></script>
        <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('js/smooth-scroll.min.js') }}"></script>
        <script src="{{ asset('js/lightcase.js') }}"></script>
        <script src="{{ asset('js/search.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('js/newsletter.js') }}"></script>
        <script src="{{ asset('js/jquery.form.js') }}"></script>
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/searched.js') }}"></script>
        <script src="{{ asset('js/dashbord-mobile-menu.js') }}"></script>
        <script src="{{ asset('js/forms.js') }}"></script>
        <script src="{{ asset('js/color-switcher.js') }}"></script>
        <script src="{{ asset('js/dropzone.js') }}"></script>

        <!-- MAIN JS -->
        <script src="{{ asset('js/script.js') }}"></script>
        <script>
            $(".dropzone").dropzone({
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Click here or drop files to upload",
            });
        </script>
        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });
        </script>

        @auth
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="redirectTo" value="home">
            </form>
        @endauth

        <!-- Toastr CSS & JS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="{{ asset('js/custom.js') }}"></script>

        <script>
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            @if (session('error'))
                toastr.error("{{ session('error') }}");
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            @endif
        </script>

        @stack('scripts')

        <script>
            $(document).ready(function() {
                if($('#country').length) $('#country').niceSelect('destroy');
                if($('#state').length) $('#state').niceSelect('destroy');
                if($('#city').length) $('#city').niceSelect('destroy');

                $.get('/countries', function(data) {
                    $.each(data, function(i, country) {
                        $('#country').append('<option value="' + country.id + '">' + country
                            .country_name + '</option>');
                    });
                });
            });

            $('#country').on('change', function() {
                let countryId = $(this).val();
                $('#state').html('<option value="">Loading...</option>');
                $('#city').html('<option value="">Select City</option>');

                $.get('/states/' + countryId, function(data) {
                    $('#state').html('<option value="">Select State</option>');
                    $.each(data, function(i, state) {
                        $('#state').append('<option value="' + state.id + '">' + state.state +
                            '</option>');
                    });

                });
            });

            $('#state').on('change', function() {
                let stateId = $(this).val();

                $('#city').html('<option value="">Loading...</option>');

                $.get('/cities/' + stateId, function(data) {
                    $('#city').html('<option value="">Select City</option>');
                    $.each(data, function(i, city) {
                        $('#city').append('<option value="' + city.id + '">' + city.city + '</option>');
                    });
                });
            });
        </script>
    </div>
    <!-- Wrapper / End -->
</body>

</html>
