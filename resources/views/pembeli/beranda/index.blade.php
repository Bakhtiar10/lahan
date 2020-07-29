@extends("templatepembeli.index")
@section('title') Beranda Pembeli @endsection
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
    <div class="card">
        <div class="row">
            @foreach($lahan as $data)
            <div class="col-xs-12 col-sm-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="panel text-center single-blog">
                    <img src="{{ asset($data->images[0]->foto) }}" style="width: 300px; height: 150px; Margin-top: 20px;">
                    <div class="padding-20">
                        <ul class="list-unstyled list-inline">
                            <li><span class="ti-user"></span> By : {{ $data->penjual->name }}</li>
                            <li><span class="ti-calendar"></span> {{ date("d M Y", strtotime($data->created_at)) }}
                            </li>
                        </ul>
                        <div class="space-10"></div>
                        <ul class="list-unstyled list-inline">
                            <li><span class=""></span>{{ $data->jenis_lahan }}</li>
                            <li><span class=""></span> {{ $data->luas_lahan }}</li>
                            <li><span class=""></span> Rp. {{number_format($data->harga_lahan,0,',','.')}}</li>

                            <div class="space-20"></div>
                            <li><span class=""></span>{{$data->judul_lahan}}</li>
                            <div class="space-20"></div>
                            <a href="/pembeli/detail_lahan/{{$data->id}}" class="btn btn-link">Lihat Detail</a>
                        </ul>
                    </div>
                </div>
                <div class="space-30"></div>
            </div>
            @endforeach
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
                        <textarea class="form-control  @error('content') is-invalid @enderror" name="content" placeholder="Beri Komentar Untuk Website"
                            rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Kirim</button>
                </form>
            </div>
        </div>
    </div>

    @endsection