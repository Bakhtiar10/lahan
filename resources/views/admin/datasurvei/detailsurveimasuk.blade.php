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
                            <img src="{{ asset($detailsurveimasuk->foto_ktp) }}" alt="" width="300">

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="product-description">
                            <dl class="row mb-5">
                                <dt class="col-sm-5">Tanggal Survei</dt>
                                <dd class="col-sm-5">{{ $detailsurveimasuk->tanggal }}</dd>

                                <dt class="col-sm-5">Waktu</dt>
                                <dd class="col-sm-5">{{ $detailsurveimasuk->waktu }}</dd>

                                <dt class="col-sm-5">No Hp Penyurvei</dt>
                                <dd class="col-sm-5">{{ $detailsurveimasuk->no_hp }}</dd>

                                <dt class="col-sm-5">Nama Penyurvei</dt>
                                <dd class="col-sm-5">{{ $detailsurveimasuk->pembeli->name }}</dd>

                                <dt class="col-sm-5">Alamat Lahan</dt>
                                <dd class="col-sm-5">{{ $detailsurveimasuk->lahan->alamat}}</dd>

                                <dt class="col-sm-5">Judul Lahan</dt>
                                <dd class="col-sm-5">{{ $detailsurveimasuk->lahan->judul_lahan}}</dd>

                                <dt class="col-sm-5">Nama Penjual</dt>
                                <dd class="col-sm-5">{{ $detailsurveimasuk->lahan->penjual->name }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection