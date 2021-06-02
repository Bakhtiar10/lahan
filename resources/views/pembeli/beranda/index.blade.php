@extends("templatepembeli.index")
@section('title') Beranda Pembeli @endsection
@section('content')

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
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Penjualan</strong> Lahan
                        </h2>
                    </div>
                    <div class="body">
                        <div class="owl-carousel owl-theme" id="single_slide_autoplay">
                            <div class="item">
                                <img src="../../assets/images/image-gallery/lahan_pertanian.jpg" alt="" style="width:1000px; height:250px; Margin-left: 45px;
                                                                    Margin-right: 50px;">
                            </div>
                            <div class="item">
                                <img src="../../assets/images/image-gallery/lahan_perkebunan.jpg" alt="" style="width:1000px; height:250px; Margin-left: 45px;
                                                                    Margin-right: 50px;">
                            </div>
                            <div class="item">
                                <img src="../../assets/images/image-gallery/lahan_kavling.png" alt="" style="width:1000px; height:250px; Margin-left: 45px;
                                                                    Margin-right: 50px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Single Slide -->
    <div class="space-30"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp" data-wow-delay="0.25">
                <div class="card">
                    <div class="body">
                        <div class="d-flex">
                            <input type="text" class="form-control" id="cari" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" id="cari-submit">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
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
            <div class="col-md-10">
                <div class="card">

                    <div class="container-show-lahan" style="display: flex; gap: 5%; flex-wrap: wrap;"
                        data-wow-delay="0.2s">

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row clearfix">
                <div class="card-body">
                    <form action="{{ route('pembeli_koment') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Komentar</label>
                            @error('content') <span style="color:red">{{ $message }}</span> @enderror
                            <input type="hidden" value="{{ Auth::user()->id }}" name="id_pembeli">
                            <textarea class="form-control  @error('content') is-invalid @enderror" name="content"
                                placeholder="Beri Komentar Untuk Website" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </form>
                </div>
            </div>
        </div>

    @endsection
    @section('script')
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
                        }else{
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
    @endsection
