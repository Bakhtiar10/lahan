@extends("templatepembeli.index")
@section('title') lihat lahan @endsection
@section("content")


<div class="container">
    <div class="card">
        <div class="header">
            <h2><strong>Detail Lahan</strong></h2>
        </div>
        <div class="card-body ">
            <div class="product-store">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="product-gallery">
                            <div class="product-gallery-thumbnails">
                                <ol class="thumbnails-list list-unstyled">
                                    @foreach($peta->images as $dp)
                                    <li><img src="{{asset($dp->foto)}}" alt=""></li>
                                    @endforeach
                                </ol>
                            </div>
                            <div class="product-gallery-featured">

                                @foreach($peta->images as $dp)
                                <img src="{{asset($dp->foto)}}" alt="">
                                @break
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="product-payment-details">
                            <h4 class="product-title mb-2">{{$peta->judul_lahan}}</h4>
                            <h2 class="product-price display-4">Rp. {{number_format($peta->harga_lahan,0,',','.')}}</h2>
                            <p><i class=""></i> <strong>{{$peta->luas_lahan}}</strong></p>
                            <p><i class=""></i> <strong>{{$peta->jenis_lahan}}</strong></p>
                            <p><i class=""></i> <strong>{{$peta->sertifikat}}</strong></p>
                            <p><i class=""></i> <strong>{{$peta->alamat}}</strong></p>
                            <p><i class=""></i> <strong>{{$peta->no_hp}}</strong></p>

                            <button type="button" class="btn btn-danger btn-border-radius waves-effect">
                                <i class="fas fa-flag"></i>
                                <span>Pesan Lahan</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="boxs mail_listing">
            <div class="inbox-center table-responsive">
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
                @endif
                <div class="header">
                    <h2><strong> Komentar</strong></h2>
                </div>
               
                <table class="table table-hover">
                    <tbody>
                        <tr class="unread">
                            <td class="hidden-xs">email</td>
                            <td class="text-right"> tanggal </td>
                        </tr>
                        <tr>
                            <td>isi</td>
                        </tr>
                    </tbody>
                   
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row clearfix">
        <div class="card-body">
            <form action="" method="POST">
                
                <div class="form-group">
                    <label>Komentar</label>
                    <input type="hidden" value="" name="id_user">
                    <input type="hidden" value="" name="id_lahan">
                    <textarea class="form-control" name="content" placeholder="Beri komentar untuk postingan"
                        rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Kirim</button>
            </form>
        </div>
    </div>
</div>


@endsection
@section('script')
<script src="{{ asset('assets/js/pages/ecommerce/product-detail.js') }}"></script>
@endsection