<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Landing Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="{{ asset('assets/landingpage/images/apple-touch-icon.png') }}">
    <link rel="shortcut icon" type="image/ico" href="{{ asset('assets/landingpage/images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/bootstrap.min.css') }}">
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
</head>

<body data-spy="scroll" data-target="#mainmenu" data-offset="50">
    <!-- <div class="preloade">
         <span><i class="ti-mobile"></i></span>
      </div> -->
    <header class="overlay-bg relative fix" id="home">
        <div class="section-bg blog-header ripple"></div>
        <nav class="navbar navbar-default mainmenu-area navbar-fixed-top" data-spy="affix" data-offset-top="60">
            <div class="container">
                @if (Route::has('login'))
                <div class="collapse navbar-collapse navbar-right" id="mainmenu">
                    @auth
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    @else
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('login') }}">Login Admin</a></li>
                        <li><a href="{{ route('penjual.login') }}">Login Penjual</a></li>
                        <li><a href="{{ route('pembeli.login') }}">Login Pembeli</a></li>
                        <li><a href="index.html#contact">Contact</a></li>
                    </ul>
                    @endauth
                </div>
                @endif
            </div>
        </nav>
        <div class="space-120"></div>


        <div class="container text-white">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <img src="{{ asset('assets/landingpage/images/lahan.png') }}" class="img-full" alt=""
                        style="width: 250px; height: 200px;">
                    <h4 class="text-uppercase">Pemesanan Lahan</h4>
                </div>
            </div>
            <div class="space-120"></div>
        </div>
    </header>
    <section>
        <div class="space-80"></div>
        <div class="container">
            <div class="row">
                @foreach($lahan as $data)
                <div class="col-xs-12 col-sm-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="panel text-center single-blog">
                        <img src="{{ asset($data->images[0]->foto) }}" class="img-full" alt="">
                        <div class="padding-20">
                            <ul class="list-unstyled list-inline">
                                <li><span class="ti-user"></span> By: {{ $data->penjual->name }}</li>
                                <li><span class="ti-calendar"></span> {{ date("d M Y", strtotime($data->created_at)) }}
                                </li>
                            </ul>
                            <div class="space-10"></div>
                            <ul class="list-unstyled list-inline">
                                <li><span class=""></span>{{ $data->jenis_lahan }}</li>
                                <li><span class=""></span> {{ $data->luas_lahan }}</li>
                                <li><span class=""></span> {{$data->harga_lahan}}</li>

                                <div class="space-20"></div>
                                <li><span class=""></span>{{$data->judul_lahan}}</li>
                                <div class="space-20"></div>
                                <a href="/pembeli/detail_lahan/{{$data->id}}" class="btn btn-link">Lihat Detail</a>
                                <div class="space-20"></div>
                            </ul>
                        </div>
                    </div>
                    <div class="space-30"></div>
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="space-30"></div>
                <div class="col-xs-12 text-center">
                    <ul class="list-unstyle list-inline paginations">
                        <li><a href="#"><span class="ti-angle-double-left"></span></a></li>
                        <li><a href="#"><span class="ti-angle-left"></span></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#"><span class="ti-angle-right"></span></a></li>
                        <li><a href="#"><span class="ti-angle-double-right"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="space-80"></div>
    </section>
    <div id="contact"></div>
    <div id="maps"></div>
    <footer class="black-bg">
        <div class="container">
            <div class="space-80"></div>
            <div class="row text-white wow fadeIn">
                <div class="col-xs-12 text-center">
                    <div class="social-menu">
                        <a href="#"><span class="ti-facebook"></span></a>
                        <a href="#"><span class="ti-twitter-alt"></span></a>
                        <a href="#"><span class="ti-linkedin"></span></a>
                        <a href="#"><span class="ti-pinterest-alt"></span></a>
                    </div>
                    <div class="space-20"></div>
                    <p>@ 2017 <a href="https://themeforest.net/user/themectg">ThemeCTG</a> all right resurved. Designed
                        by <a href="https://themeforest.net/user/quomodotheme">Quomodotheme</a></p>
                </div>
            </div>
            <div class="space-20"></div>
        </div>
    </footer>
    <!-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
    <script src="{{ asset('assets/landingpagejs/vendor/jquery-1.12.4.min.js') }}"
        type="e763a39d6fa7d0f8e02806d7-text/javascript"></script>
    <script src="{{ asset('assets/landingpagejs/vendor/bootstrap.min.js') }}"
        type="e763a39d6fa7d0f8e02806d7-text/javascript"></script>
    <script src="{{ asset('assets/landingpagejs/owl.carousel.min.js') }}"
        type="e763a39d6fa7d0f8e02806d7-text/javascript"></script>
    <script src="{{ asset('assets/landingpagejs/scrollUp.min.js') }}" type="e763a39d6fa7d0f8e02806d7-text/javascript">
    </script>
    <script src="{{ asset('assets/landingpagejs/magnific-popup.min.js') }}"
        type="e763a39d6fa7d0f8e02806d7-text/javascript"></script>
    <script src="{{ asset('assets/landingpagejs/ripples-min.js') }}" type="e763a39d6fa7d0f8e02806d7-text/javascript">
    </script>
    <script src="{{ asset('assets/landingpagejs/contact-form.js') }}" type="e763a39d6fa7d0f8e02806d7-text/javascript">
    </script>
    <script src="{{ asset('assets/landingpagejs/spectragram.min.js') }}"
        type="e763a39d6fa7d0f8e02806d7-text/javascript"></script>
    <script src="{{ asset('assets/landingpagejs/ajaxchimp.js') }}" type="e763a39d6fa7d0f8e02806d7-text/javascript">
    </script>
    <script src="{{ asset('assets/landingpagejs/wow.min.js') }}" type="e763a39d6fa7d0f8e02806d7-text/javascript">
    </script>
    <script src="{{ asset('assets/landingpagejs/plugins.js') }}" type="e763a39d6fa7d0f8e02806d7-text/javascript">
    </script>
    <script src="{{ asset('assets/landingpagejs/main.js') }}" type="e763a39d6fa7d0f8e02806d7-text/javascript"></script>
    <script src="{{ asset('assets/landingpagejs/maps.js') }}" type="e763a39d6fa7d0f8e02806d7-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="e763a39d6fa7d0f8e02806d7-|49" defer=""></script>
</body>

</html>