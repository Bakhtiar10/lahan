@extends("templatepenjual.index")
@section('title') Beranda Penjual @endsection
@section('content')

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
                            Lahan <strong>Belum Terjual</strong>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable"
                            role="grid" aria-describedby="tableExport_info">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Judul</th>
                                    <th>Luas</th>
                                    <th>Jenis</th>
                                    <th>Sertifikat</th>
                                    <th>Foto</th>
                                    <th>Harga</th>
                                    <th>No Hp</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($data_lahan_belum_terjual as $lahan_belum_terjual)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $lahan_belum_terjual->user->email }}</td>
                                    <td>{{ $lahan_belum_terjual->judul_lahan }}</td>
                                    <td>{{ $lahan_belum_terjual->luas_lahan }} M2</td>
                                    <td>{{ $lahan_belum_terjual->jenis_lahan }}</td>
                                    <td>{{ $lahan_belum_terjual->sertifikat }}</td>
                                    <td>
                                        @foreach($lahan_belum_terjual->images as $di)
                                        <img src="{{ asset($di->foto) }}" alt="" width="50">
                                        @break
                                        @endforeach
                                    </td>
                                    <td>{{ $lahan_belum_terjual->harga_lahan }}</td>
                                    <td>{{ $lahan_belum_terjual->no_hp }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Lahan <strong>Terjual</strong>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penjual</th>
                                        <th>Judul Lahan</th>
                                        <th>Foto Lahan</th>
                                        <th>Harga Lahan</th>
                                        <th>Di Beli oleh</th>
                                        <th>Pada Tanggal</th>
                                        <th>Foto KTP</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_lahan_terjual as $lahan_terjual)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $lahan_terjual->lahan->user->name }}</td>
                                        <td>{{ $lahan_terjual->lahan->judul_lahan }}</td>
                                        <td>
                                        @foreach($lahan_terjual->lahan->images as $di)
                                        <img src="{{ asset($di->foto) }}" alt="" width="50">
                                        @break
                                        @endforeach
                                        </td>
                                        <td>{{ $lahan_terjual->lahan->harga_lahan }}</td>
                                        <td>{{ $lahan_terjual->user->name }}</td>
                                        <td>{{ $lahan_terjual->lahan->updated_at }}</td>
                                        <td><img src="{{ asset($lahan_terjual->foto_ktp) }}" width="50" alt=""></td>
                                        <td>Sold Out</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
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

@endsection
