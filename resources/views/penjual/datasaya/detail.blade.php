@extends("templatepenjual.index")
@section('title') Detail Lahan @endsection
@section("content")

<div class="container">
    <div class="card">
        <div class="header">
            <h2><strong>Detail Lahan</strong></h2>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <form action="{{ route('add_image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table>
                        <tr>
                            <td> <input type="hidden" name="id_lahan" value="{{ $lahan->id }}">
                                <input type="file" class="form-control" name="foto"></td>
                            <td><button class="btn btn-info form-control">Tambah</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="card-body ">
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
                                <img src="{{asset($dp->foto)}}" alt="">
                                @break
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="product-payment-details">
                            <h4 class="product-title mb-2">{{$lahan->judul_lahan}}</h4>
                            <h2 class="product-price display-4">Rp.
                                {{number_format($lahan->harga_lahan,0,',','.')}}</h2>
                            <p><i class=""></i> <strong>{{$lahan->luas_lahan}}</strong></p>
                            <p><i class=""></i> <strong>{{$lahan->jenis_lahan}}</strong></p>
                            <p><i class=""></i> <strong>{{$lahan->sertifikat}}</strong></p>
                            <p><i class=""></i> <strong>{{$lahan->alamat}}</strong></p>
                            <p><i class=""></i> <strong>{{$lahan->no_hp}}</strong></p>


                            <button type="button" class="btn btn-info btn-border-radius waves-effect">
                                <i class="fas fa-map-marked"></i>
                                <span>Status Jual</span>
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