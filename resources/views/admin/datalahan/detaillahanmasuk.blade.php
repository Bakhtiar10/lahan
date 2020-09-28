@extends("template.index")
@section("content")
<div class="container">
    <div class="card">
        <div class="header">
            <h2><strong>Detail Data Lahan Masuk</strong></h2>
        </div>
        <div class="card-body">
            <div class="product-store">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="product-gallery">
                            <div class="product-gallery-featured">
                                @foreach($detaillahanmasuk->images as $di)
                                <img src="{{ asset($di->foto) }}" alt="" width="300">
                                @break
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="product-description">
                            <dl class="row mb-5">

                                <dt class="col-sm-3">Email</dt>
                                <dd class="col-sm-9">{{ $detaillahanmasuk->penjual->email }}</dd>

                                <dt class="col-sm-3">Judul</dt>
                                <dd class="col-sm-9">{{  $detaillahanmasuk->judul_lahan }}</dd>

                                <dt class="col-sm-3">Luas</dt>
                                <dd class="col-sm-9">{{ $detaillahanmasuk->luas_lahan }} M2</dd>

                                <dt class="col-sm-3">Jenis</dt>
                                <dd class="col-sm-9">{{ $detaillahanmasuk->jenis_lahan }}</dd>

                                <dt class="col-sm-3">Sertifikat</dt>
                                <dd class="col-sm-9">{{ $detaillahanmasuk->sertifikat }}</dd>

                                <dt class="col-sm-3">Harga</dt>
                                <dd class="col-sm-9">Rp. {{number_format($detaillahanmasuk->harga_lahan,0,',','.')}}</dd>

                                <dt class="col-sm-3">No Hp</dt>
                                <dd class="col-sm-9">{{ $detaillahanmasuk->no_hp }}</dd>

                                <dt class="col-sm-3">Deskripsi</dt>
                                <dd class="col-sm-9">{{ $detaillahanmasuk->deskripsi }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection