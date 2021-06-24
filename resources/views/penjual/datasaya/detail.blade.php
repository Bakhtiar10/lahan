@extends("templatepenjual.index")
@section('title') Detail Lahan @endsection
@section("content")
<style>
    .child-comment {
        padding-left: 50px;
    }

</style>

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
                                @if (count($lahan->images) > 0)
                                    <img src="{{asset($lahan->images[0]->foto)}}" alt="" style="width: 400px; height: 200px;">
                                @else
                                <img src="{{asset('no-image-found.png')}}" alt="" style="width: 400px; height: 200px;">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="product-description">
                            <dl class="row mb-5">
                                <dt class="col-sm-3">Nama Penjual</dt>
                                <dd class="col-sm-9">{{ $lahan->user->name }}</dd>

                                <dt class="col-sm-3">Harga</dt>
                                <dd class="col-sm-9">Rp. {{number_format($lahan->harga_lahan,0,',','.')}}</dd>

                                <dt class="col-sm-3">Judul Lahan</dt>
                                <dd class="col-sm-9">{{$lahan->judul_lahan}}</dd>

                                <dt class="col-sm-3">Luas Lahan</dt>
                                <dd class="col-sm-9">{{$lahan->luas_lahan}}</dd>

                                <dt class="col-sm-3">Jenis Lahan</dt>
                                <dd class="col-sm-9">{{$lahan->jenis_lahan}}</dd>

                                <dt class="col-sm-3">Sertifikat</dt>
                                <dd class="col-sm-9">{{$lahan->sertifikat}}</dd>

                                <dt class="col-sm-3">Alamat</dt>
                                <dd class="col-sm-9">{{$lahan->alamat}}</dd>

                                <dt class="col-sm-3">No Penjual</dt>
                                <dd class="col-sm-9">{{$lahan->no_hp}}</dd>

                                <dt class="col-sm-3">Deskripsi</dt>
                                <dd class="col-sm-9">{{$lahan->deskripsi}}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('penjual.komentar') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $lahan->id }}" class="form-control">
                        <input type="hidden" name="parent_id" id="parent_id" class="form-control">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="email" value="{{ Auth::user()->email }}">
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="form-group" style="display: none" id="formReplyComment">
                            <label for="">Balas Komentar</label>
                            <input type="text" id="replyComment" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Komentar</label>
                            <textarea name="comment" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <button class="btn btn-primary btn-sm">Kirim</button>
                    </form>
                </div>
                <div class="col-md-6">
                    @foreach ($lahan->comments as $row)
                    <blockquote>
                        <h6>{{ $row->email }}</h6>
                        <hr>
                        <p>{{ $row->comment }}</p><br>
                        <a href="javascript:void(0)"
                            onclick="balasKomentar({{ $row->id }}, '{{ $row->comment }}')">Balas</a>
                    </blockquote>
                    @foreach ($row->child as $val)
                    <div class="child-comment">
                        <blockquote>
                            <h6>{{ $val->email }}</h6>
                            <hr>
                            <p>{{ $val->comment }}</p><br>
                        </blockquote>
                    </div>
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('assets/js/pages/ecommerce/product-detail.js') }}"></script>
<script>
    function balasKomentar(id, title) {
        $('#formReplyComment').show();
        $('#parent_id').val(id)
        $('#replyComment').val(title)
    }

</script>
@endsection
