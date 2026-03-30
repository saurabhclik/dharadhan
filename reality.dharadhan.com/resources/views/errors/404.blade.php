<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="{{ get_setting('site_description') }}">
    <meta name="author" content="">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ config('settings.site_favicon') ?? asset('favicon.ico') }}">
    <title>Error 404</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body class="inner-pages hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <div class="clearfix"></div>
        <!-- Header Container / End -->
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION 404 -->
        <section class="notfound pt-0">
            <div class="container">
                <div class="top-headings text-center">
                    <img src="{{ asset('images/bg/error-404.jpg') }}" alt="Page 404">
                    <h3 class="text-center">Page Not Found!</h3>
                    <p class="text-center">Oops! Looks Like Something Going Rong We can’t seem to find the page you’re
                        looking for make sure that you have typed the currect URL</p>
                </div>
                <div class="port-info">
                    <a href="{{ url('/') }}" class="btn btn-primary btn-lg">Go To Home</a>
                </div>
            </div>
        </section>
        <!-- END SECTION 404 -->

    </div>
    <!-- Wrapper / End -->
</body>

</html>
