<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Favicon-->

    <link rel="apple-touch-icon" href="{{ asset('assets/landingpage/images/apple-touch-icon.png') }}">
    <link rel="shortcut icon" type="image/ico" href="{{ asset('assets/landingpage/images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/space.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/overright.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/normalize.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/landingpage/style.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/responsive.css') }}">
    <script src="{{ asset('assets/landingpage/js/vendor/modernizr-2.8.3.min.js') }}"
    type="e763a39d6fa7d0f8e02806d7-text/javascript"></script>
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <!-- Plugins Core Css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    
    <!-- Custom Css -->
    {{-- <link href="{{ asset('assets/user/css/shop-item.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

    <!-- Theme style. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('assets/css/styles/all-themes.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/extra_pages.css') }}" rel="stylesheet" />
    <!-- <link href="{{ asset('/dist/css/sweetalert.css') }}" rel="stylesheet"> -->
    
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <script src="{{ asset('assets/user/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css' rel='stylesheet' />
    

</head>