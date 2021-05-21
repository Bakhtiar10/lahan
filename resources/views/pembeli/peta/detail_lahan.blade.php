@extends("templatepembeli.index")
@section('title') lihat lahan @endsection
@section('content')


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
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="card-body">
                <div class="product-store">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="product-gallery">
                                <div class="product-gallery-thumbnails">
                                    <ol class="thumbnails-list list-unstyled">
                                        @foreach ($peta->images as $dp)
                                            <li><img src="{{ asset($dp->foto) }}" alt=""></li>
                                        @endforeach
                                    </ol>
                                </div>
                                <div class="product-gallery-featured">

                                    @foreach ($peta->images as $dp)
                                        <img src="{{ asset($dp->foto) }}" alt="" style="width: 400px; height: 200px;">
                                    @break
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="product-description">
                                <dl class="row mb-5">
                                    <dt class="col-sm-3">Nama Penjual</dt>
                                    <dd class="col-sm-9">{{ $peta->user->name }}</dd>

                                    <dt class="col-sm-3">Harga</dt>
                                    <dd class="col-sm-9">Rp. {{ number_format($peta->harga_lahan, 0, ',', '.') }}</dd>

                                    <dt class="col-sm-3">Judul Lahan</dt>
                                    <dd class="col-sm-9">{{ $peta->judul_lahan }}</dd>

                                    <dt class="col-sm-3">Luas Lahan</dt>
                                    <dd class="col-sm-9">{{ $peta->luas_lahan }} M2</dd>

                                    <dt class="col-sm-3">Jenis Lahan</dt>
                                    <dd class="col-sm-9">{{ $peta->jenis_lahan }}</dd>

                                    <dt class="col-sm-3">Sertifikat</dt>
                                    <dd class="col-sm-9">{{ $peta->sertifikat }}</dd>

                                    <dt class="col-sm-3">Alamat</dt>
                                    <dd class="col-sm-9">{{ $peta->alamat }}</dd>

                                    <dt class="col-sm-3">No Penjual</dt>
                                    <dd class="col-sm-9">{{ $peta->no_hp }}</dd>


                                    <dt class="col-sm-3">Deskripsi</dt>
                                    <dd class="col-sm-9">{{ $peta->deskripsi }}</dd>
                                </dl>
                                <br>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">Survei Lahan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <form role="form" action="{{ url('pembeli/survei/simpan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModal">Apakah anda yakin ingin mensurvei lahan ? </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_lahan" value="{{ $peta->id }}">
                            <input type="hidden" class="form-control" name="id_pembeli" value="{{ Auth::user()->id }}">

                            <div class="form-group">
                                <div class="form-line">
                                    <input type="hidden" class="form-control" name="no_hp" placeholder="Masukan No Telepon "
                                        value="{{ Auth::user()->no_hp }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <img src="{{ asset('assets/images/contohktp.png') }}"
                                        style="width: 150px; height: 150px;"> Contoh Selfie dengan Foto KTP
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="foto_ktp">Selfie Foto KTP</label>
                                    <input type="file" class="form-control" name="foto_ktp">
                                </div>
                                @error('foto_ktp')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tanggal</label>
                                    <input type="text" class="datepicker" name="tanggal">
                                </div>
                                @error('tanggal')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Waktu</label>
                                    <input type="text" class="timepicker" name="waktu">
                                </div>
                                @error('waktu')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('/pembeli/detail_lahan') }}" class="btn btn-md btn-danger"
                                type="button">Batal</a>
                            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('penjual.komentar') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $peta->id }}" class="form-control">
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
                        @foreach ($peta->comments as $row)
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

    @if (Session::has('errors'))
        <script>
            $('#exampleModal').modal({show: true});
        </script>
    @endif

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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.timepicker');
            var instances = M.Timepicker.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function() {
            $('.timepicker').timepicker();
        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function() {
            $('.datepicker').datepicker();
        });

    </script>


@endsection
