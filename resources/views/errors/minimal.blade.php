<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>@yield('title')</title>

    <meta name="description" content="@yield('title') created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="@yield('title')">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="@yield('title') created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
    <!-- Page Container -->
    <div id="page-container" class="main-content-boxed">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="hero bg-body-extra-light">
                <div class="hero-inner">
                    <div class="content content-full">
                        <div class="py-4 text-center">
                            <div class="display-1 fw-bold text-danger">@yield('code')</div>
                            <h1 class="fw-bold mt-5 mb-2">Oops.. @yield('message')..</h1>
                            <h2 class="fs-4 fw-medium text-muted mb-5">We are sorry but your request contains bad syntax
                                and cannot be fulfilled..</h2>
                            <a class="btn btn-lg btn-alt-secondary" href="{{ url('/') }}">
                                <i class="fa fa-arrow-left opacity-50 me-1"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
    <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>
</body>

</html>