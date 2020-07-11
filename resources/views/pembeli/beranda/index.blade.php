@extends("templatepembeli.index")
@section('title') beranda @endsection
@section("content")

<div class="container">
@if(Session::has('message'))
<div class="alert alert-success" role="alert">
    {{Session::get('message')}}
</div>
@endif
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        <strong>Penjualan</strong> Lahan</h2>
                </div>
                <div class="body">
                    <div class="owl-carousel owl-theme" id="single_slide_autoplay">
                        <div class="item">
                            <img src="../../assets/images/image-gallery/lahan_pertanian.jpg" alt="" style="width:1000px; height:350px; Margin-left: 45px;
                                Margin-right: 50px;">
                        </div>
                        <div class="item">
                            <img src="../../assets/images/image-gallery/lahan_perkebunan.jpg" alt="" style="width:1000px; height:350px; Margin-left: 45px;
                                Margin-right: 50px;">
                        </div>
                        <div class="item">
                            <img src="../../assets/images/image-gallery/lahan_kavling.png" alt="" style="width:1000px; height:350px; Margin-left: 45px;
                                Margin-right: 50px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Single Slide -->
<div class="container">
    <div class="row clearfix">
        @foreach($lahan as $data)
        <!-- Single Slide -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <ul class="right">
                        <li class="header-dropdown m-r--5">
                            <a href="">Lihat Detail</a>
                        </li>
                    </ul>
                    <h4 class="product-title mb-2">{{$data->judul_lahan}}</h4>
                    <h2 class="product-price display-4">Rp. {{number_format($data->harga_lahan,0,',','.')}}</h2>
                </div>
                <div class="body">
                    <div class="item">
                        <img src="{{asset($data->images[0]->foto)}}" alt=""
                            style="width: 300px; height: 120px; margin-bottom: 10px">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container">
    <div class="row clearfix">
        <div class="card-body">
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label>Komentar</label>
                <input type="hidden" value="" name="id_user">
                <textarea class="form-control" name="content" placeholder="Beri Komentar Untuk Website" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Kirim</button>
        </form>
    </div>
    </div>
</div>



@endsection