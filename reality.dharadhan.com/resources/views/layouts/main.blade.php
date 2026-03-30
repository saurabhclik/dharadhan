<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="{{ get_setting('site_description') }}">
    <meta name="author" content="">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ config('settings.site_favicon') ?? asset('favicon.ico') }}">
    <title>{{ config('app.name', 'Laravel') }} - Find Your Perfect Property in Jaipur</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700&family=Roboto:wght@400;500&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-5-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">

    <!-- LEAFLET MAP -->
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/leaflet-gesture-handling.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/leaflet.markercluster.css') }}">
    <link rel="stylesheet" href="{{ asset('css/leaflet.markercluster.default.css') }}">

    <link rel="stylesheet" href="{{ asset('v2/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('v2/css/pages.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('styles')
</head>

<body>
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    @include('partials.otp-modal')
    <!-- START PRELOADER -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>

    <!-- END PRELOADER -->

    <!-- ARCHIVES JS -->
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/slick.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/nice-select.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/newsletter.js') }}"></script>
    <script src="{{ asset('js/jquery.form.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/ui-lement.js') }}"></script>
    <script src="{{ asset('js/forms.js') }}"></script>
    <script src="{{ asset('js/leaflet.js') }}"></script>
    <script src="{{ asset('js/leaflet-gesture-handling.min.js') }}"></script>
    <script src="{{ asset('js/leaflet-providers.js') }}"></script>
    <script src="{{ asset('js/leaflet.markercluster.js') }}"></script>
    <script src="{{ asset('js/map-single.js') }}"></script>
    @include('partials.scripts')
    @stack('scripts')
    <script>
        if (!localStorage.getItem('device_id')) {
            localStorage.setItem(
                'device_id',
                'dev_' + Math.random().toString(36).substring(2, 12)
            );
        }

        /* Tabs */
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', () => {
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
            });
        });

        /* Mobile Menu */
        const hamburger = document.getElementById('hamburger');
        const nav = document.getElementById('nav');

        // Toggle menu
        hamburger.addEventListener('click', (e) => {
            e.stopPropagation();
            nav.classList.toggle('active');
        });

        // Prevent closing when clicking inside nav
        nav.addEventListener('click', (e) => {
            e.stopPropagation();
        });

        // Close when clicking outside
        document.addEventListener('click', () => {
            nav.classList.remove('active');
        });


        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add("show");
            });
        });

        document.querySelectorAll(".fade-up").forEach(el => observer.observe(el));

        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            const isPassword = input.type === "password";

            input.type = isPassword ? "text" : "password";

            icon.classList.toggle("fa-eye");
            icon.classList.toggle("fa-eye-slash");

            icon.classList.toggle("bi-eye");
            icon.classList.toggle("bi-eye-slash");
        }
</script>

</body>
</html>

