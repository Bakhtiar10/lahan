<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Landing Page</title>
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
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/responsive.css') }}">
    <script src="{{ asset('assets/landingpage/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <style>
        .button-card {
            margin-top: 10px;
            width: 150px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid cyan;
            font-size: 12px;
            border-radius: 25px;
            color: cyan;
            text-decoration: none
        }

        .button-card:hover {
            text-decoration: none;
            color: blue;
            border: 1px solid blue;
        }

    </style>
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
                                <li><a href="/login">Login</a></li>
                                <li><a href="/">Register</a></li>
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
                        style="width: 200px; height: 200px;">
                    <h4 class="text-uppercase">My-Land</h4>
                </div>
            </div>
            <div class="space-120"></div>
        </div>
    </header>
    <section>
        <div class="space-80"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 wow fadeInUp" data-wow-delay="0.25">
                    <div class="input-group">
                        <input type="text" class="form-control" id="cari" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" id="cari-submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-20"></div>
            <div class="row">
                <div class="col-md-2 col-sm-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card rounded">
                        <div class="body">
                            <div class="w-100">
                                <div class="form-group">
                                    <select name="kecamatan" id="kecamatan" class="form-control kecamatan-select">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="jenis_lahan" id="jenis_lahan" class="form-control">
                                        <option value="">Pilih Jenis Lahan</option>
                                        <option value="Lahan Kavling">Lahan Kavling</option>
                                        <option value="Lahan Pertanian">Lahan Pertanian</option>
                                        <option value="Lahan Perkebunan">Lahan Perkebunan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="harga_lahan" id="harga_lahan" class="form-control">
                                        <option value="">Pilih Harga</option>
                                        <option value="Termurah">Termurah</option>
                                        <option value="Termahal">Termahal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-sm-4 container-show-lahan" style="display: flex; gap: 5%; flex-wrap: wrap;"
                    data-wow-delay="0.2s">

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
    {{-- <script src="{{ asset('assets/landingpagejs/vendor/jquery-1.12.4.min.js') }}" --}}
    {{-- type="e763a39d6fa7d0f8e02806d7-text/javascript"></script> --}}
    <script src="{{ asset('assets/landingpagejs/vendor/bootstrap.min.js') }}"
        type="e763a39d6fa7d0f8e02806d7-text/javascript"></script>
    <script src="{{ asset('assets/landingpagejs/owl.carousel.min.js') }}"
        type="e763a39d6fa7d0f8e02806d7-text/javascript"></script>
    <script src="{{ asset('assets/landingpagejs/scrollUp.min.js') }}"
        type="e763a39d6fa7d0f8e02806d7-text/javascript">
    </script>
    <script src="{{ asset('assets/landingpagejs/magnific-popup.min.js') }}"
        type="e763a39d6fa7d0f8e02806d7-text/javascript"></script>
    <script src="{{ asset('assets/landingpagejs/ripples-min.js') }}" type="e763a39d6fa7d0f8e02806d7-text/javascript">
    </script>
    <script src="{{ asset('assets/landingpagejs/contact-form.js') }}"
        type="e763a39d6fa7d0f8e02806d7-text/javascript">
    </script>
    <script src="{{ asset('assets/landingpagejs/spectragram.min.js') }}"
        type="e763a39d6fa7d0f8e02806d7-text/javascript"></script>
    <script src="{{ asset('assets/landingpagejs/ajaxchimp.js') }}" type="e763a39d6fa7d0f8e02806d7-text/javascript">
    </script>
    <script src="{{ asset('assets/landingpagejs/wow.min.js') }}" type="e763a39d6fa7d0f8e02806d7-text/javascript">
    </script>
    <script src="{{ asset('assets/landingpagejs/plugins.js') }}" type="e763a39d6fa7d0f8e02806d7-text/javascript">
    </script>
    <script src="{{ asset('assets/landingpagejs/main.js') }}" type="e763a39d6fa7d0f8e02806d7-text/javascript">
    </script>
    <script src="{{ asset('assets/landingpagejs/maps.js') }}" type="e763a39d6fa7d0f8e02806d7-text/javascript">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="e763a39d6fa7d0f8e02806d7-|49" defer=""></script> --}}
    <script>
        const kecamatanArray = ["Adiwerna", "Balapulang", "Bojong", "Bumijawa", "Dukuhturi", "Dukuhwaru", "Jatinegara",
            "Kedungbanteng", "Kramat", "Lebaksiu", "Margasari", "Pagerbarang", "Pangkah", "Slawi", "Suradadi",
            "Talang", "Tarub", "Warureja", "Tegal Timur", "Tegal Barat", "Tegal Selatan", "Margadana"
        ];

        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (monthNames[d.getMonth() + 1]),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [day, month, year].join(' ');
        }

        function loadData(kecamatan, jenis_lahan, harga_lahan, cari) {
            $.ajax({
                type: 'GET',
                url: '/lahan-json',
                dataType: 'json',
                data: {
                    kecamatan: kecamatan !== '' ? kecamatan : undefined,
                    jenis_lahan: jenis_lahan !== '' ? jenis_lahan : undefined,
                    harga_lahan: harga_lahan !== '' ? harga_lahan : undefined,
                    cari: cari !== '' ? cari : undefined,
                },
                success: function(data) {
                    var html = '';
                    if (data.data.length > 0) {
                        $.each(data.data, function(key, data) {
                            console.log(data);
                            html += `
                                    <div class="panel text-center single-blog" style="width: 30%; border : 1px solid #e9e9e9">
                                        <img src="${data.images.length > 0 ? `http://localhost:8000/${data.images[0].foto}` : ''}"
                                            class="img-full" alt="" style="width: 250px; height: 100px; Margin-top: 20px;">
                                        <div class="padding-20">
                                            <ul class="list-unstyled list-inline">
                                                <li><span class="ti-user"></span> By : ${data.user.name}</li>
                                                <li><span class="ti-calendar"></span> ${formatDate(data.created_at)}
                                                </li>
                                            </ul>
                                            <div class="space-10"></div>
                                            <ul class="list-unstyled list-inline">
                                                <li><span class=""></span>${data.jenis_lahan}</li>
                                                <li><span class=""></span> ${data.luas_lahan}</li>
                                                <li><span class=""></span> Rp. ${new Intl.NumberFormat('id-ID',{style: 'currency',
                                                    currency: 'IDR'}).format(data.harga_lahan)}
                                                </li>

                                                <div class="space-20"></div>
                                                <li><span class=""></span>${data.judul_lahan}</li>
                                                <div class="space-20"></div>
                                                <a href="/pembeli/detail_lahan/${ data.id }" class="btn btn-link">Lihat Detail</a>
                                            </ul>
                                        </div>
                                    </div>
                                `
                        });
                    } else {
                        html += `
                            <div class="text-center" style="width: 100%; height: 100px; margin-top: 50px">
                                Tidak ada data
                            </div>
                            `
                    }

                    $('.container-show-lahan').html(html);
                }
            })
        }


        let htmlKecamatan = '<option value="">Pilih Kecamatan</option>';
        $.each(kecamatanArray, function(key, item) {
            htmlKecamatan += `<option value="${item}">${item}</option>`
        })
        $('.kecamatan-select').html(htmlKecamatan);
        $(document).ready(function() {

            loadData($('#kecamatan').val(), $('#jenis_lahan').val(), $('#harga_lahan').val(), $('#cari').val());
            $('#kecamatan').on('change', function() {
                console.log($(this).val())
                loadData($(this).val(), $('#jenis_lahan').val(), $('#harga_lahan').val(), $('#cari')
                    .val());
            });

            $('#harga_lahan').on('change', function() {
                loadData($('#kecamatan').val(), $('#jenis_lahan').val(), $(this).val(), $('#cari')
                    .val());
            });

            $('#jenis_lahan').on('change', function() {
                loadData($('#kecamatan').val(), $(this).val(), $('#harga_lahan').val(), $('#cari')
                    .val());
            });

            $('#cari-submit').on('click', function() {
                loadData($('#kecamatan').val(), $('#jenis_lahan').val(), $('#harga_lahan').val(), $(
                    '#cari').val());
            })
        })

    </script>
</body>

</html>
