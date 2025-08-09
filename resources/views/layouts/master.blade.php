<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">

    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">

    @yield('extend_css')
</head>

<body>

    <div class="theme-loader">
        <div class="ball-scale">
            <div class="contain">
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            {{-- Navbar --}}
            @include('layouts.navbar')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    {{-- Sidebar --}}
                    @include('layouts.sidebar')

                    @yield('content')

                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('assets/popper.js/dist/umd/popper.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/modernizr/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/modernizr/feature-detects/css-scrollbars.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/i18next/i18next.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/i18next-xhr-backend/i18nextXHRBackend.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/jquery-i18next/jquery-i18next.min.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('assets/js/vartical-layout.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>

    @yield('extend_js')
</body>

</html>
