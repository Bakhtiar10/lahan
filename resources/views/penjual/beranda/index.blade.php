@extends("templatepenjual.index")
@section('title') Beranda User @endsection
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

.input-group {
    display: table;
    border-collapse: collapse;
    width: 100%;
}

.input-group>div {
    display: table-cell;
    border: 1px solid #ddd;
    vertical-align: middle;
}

.input-group input {
    border: 0;
    display: block;
    width: 100%;
    padding: 20px;
    color: #777
}

.input-group input[type="text"] {
    padding-left: 20px;
}

.input-group input:placeholder {
    padding-left: 20px;
}

.input-group button {
    background: #eee;
    color: #777;
    padding: 0 12px;
    height: 43px;
}

.input-group-btn {
    background: #eee;
    color: #777;
    padding: 0 12px
}

.input-group-area {
    width: 100%;
}

.table-pagination {
    display: table;
    margin: 0 auto;
}

ul#horizontal-list {
    min-width: 100px;
    list-style: none;
    margin-top: 50px;
}

ul#horizontal-list li {
    padding: 10px;
    width: 200px;
    display: inline;
    border: 1px solid #16c9f6;
    border-radius: 5px;
}

ul#horizontal-list li:hover {
    background: #16c9f6;
    cursor: pointer;
}

.active-pagination {
    background: #16c9f6;
    color: white
}

.carousel-flex {
    display: flex;
    justify-content: center;
    align-items: center
}
</style>
<div class="d-flex justify-content-center align-items-center" style="height: 400px;">
    <div class="container">
        <div class="owl-carousel owl-theme" style="width : 100%; padding-top: 20px">
            @foreach ($lahans as $lahan)
            <div class="d-flex justify-content-center align-items-center">
                @if (count($lahan->images) > 0)
                <img src="{{ asset($lahan->images[0]->foto) }}" alt=""
                    style="display: block; margin-left: auto; margin-right: auto; width: 70%; height: 300px">
                @else
                <img src="{{ asset('no-image-found.png') }}" alt=""
                    style="display: block; margin-left: auto; margin-right: auto; width: 70%; height: 300px">
                @endif

            </div>
            @endforeach
        </div>
        <div class="space-20"></div>
        <h1 class="text-center" style="font-weight: bold; text-align: center; margin-top: 20px">Sistem Informasi
            Penjualan Lahan Di Tegal Berbasis
            Website</h1>
    </div>

</div>

<div class="container-fluid">

    <div class="container">
        <div class="card" style="padding: 10px">
            <div class="input-group">
                <div class="input-group-area"><input type="text" id="cari" placeholder="Search..."></div>
                <button class="" id="cari-submit">
                    <i class="glyphicon glyphicon-search"></i>
                    Cari
                </button>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-4">
                    <div class="card rounded">
                        <div class="body">
                            <div class="w-100">
                                <div class="form-group">
                                    <select name="kecamatan" id="kecamatan" class="form-control kecamatan-select"
                                        style="width: 100%"></select>
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
                <div class="col-md-10 col-sm-4 container-show-lahan" style="display: flex; gap: 5%; flex-wrap: wrap;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10" style="display: flex; justify-content: center; gap: 5%; flex-wrap: wrap;">
                    <div class="table-pagination">
                        <ul id="horizontal-list" class="container-pagination-lahan">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
        @endif


        <div class="container">
            <div class="card-body">
                <form action="{{ route('penjual_koment') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Komentar</label>
                        @error('content') <span style="color:red">{{ $message }}</span> @enderror
                        <input type="hidden" value="{{ Auth::user()->id }}" name="id_penjual">
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                            placeholder="Beri Komentar Untuk Website" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
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

function loadData(kecamatan, jenis_lahan, harga_lahan, cari, page = 1) {
    $.ajax({
        type: 'GET',
        url: '/lahan-json?page=' + page,
        dataType: 'json',
        data: {
            kecamatan: kecamatan !== '' ? kecamatan : undefined,
            jenis_lahan: jenis_lahan !== '' ? jenis_lahan : undefined,
            harga_lahan: harga_lahan !== '' ? harga_lahan : undefined,
            cari: cari !== '' ? cari : undefined,
        },
        success: function(data) {
            var html = '';
            if (data.data.data.length > 0) {
                $.each(data.data.data, function(key, data) {
                    html += `
                                <div class="panel single-blog text-center" style="width: 30%; border : 1px solid #e9e9e9; margin-bottom: 20px">
                                    <img src="${data.images.length > 0 ? data.images[0].foto : 'no-image-found.png'}"
                                        class="img-full" alt="" style="width: 250px; height: 100px; Margin-top: 20px;">
                                    <div class="padding-20">
                                        <ul class="list-unstyled list-inline">
                                            <li><span class="ti-user"></span> By: ${data.user.name}</li>
                                            <li><span class="ti-calendar"></span>
                                                ${formatDate(data.created_at)}
                                            </li>
                                        </ul>
                                        <div class="space-5"></div>
                                        <ul class="list-unstyled list-inline">
                                            <li><span class=""></span>${data.jenis_lahan}</li>
                                            <li><span class=""></span> ${data.luas_lahan} M2</li>
                                            <li><span class=""></span> ${new Intl.NumberFormat('id-ID',{style: 'currency',
                                                currency: 'IDR'}).format(data.harga_lahan)}
                                            </li>
                                            <li><span class=""></span>${data.judul_lahan}</li>
                                            <div class="space-20"></div>
                                            <div style="display:flex; justify-content: center;">
                                                <a href="/detail_lahan/${data.id}" class="button-card">Detail Lahan</a>
                                            </div>
                                            <div class="space-20"></div>
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

            var htmlPagination = ''
            if (data.data.data.length > 0) {
                for (var totalPage = 1; totalPage <= data.data.last_page; totalPage++) {
                    if (data.data.current_page === totalPage) {
                        htmlPagination +=
                            `<li style="margin: 2px" id="page" data-id="${totalPage}" class="active-pagination">${totalPage}</li>`
                    } else {
                        htmlPagination +=
                            `<li style="margin: 2px" id="page" data-id="${totalPage}" >${totalPage}</li>`
                    }

                }
            }
            $('.container-pagination-lahan').html(htmlPagination);
        }
    })
}


let htmlKecamatan = '<option value="">Pilih Kecamatan</option>';
$.each(kecamatanArray, function(key, item) {
    htmlKecamatan += `<option value="${item}">${item}</option>`
})
$('.kecamatan-select').html(htmlKecamatan);
$(document).ready(function() {

    $('.container-pagination-lahan').on('click', '#page', function() {
        loadData($('#kecamatan').val(), $('#jenis_lahan').val(), $('#harga_lahan').val(), $('#cari')
            .val(), $(this).data('id'));
    })

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
    });
})
</script>

@endsection
@section('script')
<script>
$(document).ready(function() {
    $(".owl-carousel").owlCarousel({
        margin: 10,
        loop: true,
        autoWidth: true,
        items: 1,
        autoPlay: true
    });
})
</script>
@endsection
