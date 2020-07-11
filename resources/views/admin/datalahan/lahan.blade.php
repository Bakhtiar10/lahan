@extends("template.index")
@section("content")

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2><strong>Data Lahan (Masuk)</strong></h2>
            </div>

            <div class="body">
                <div class="table-responsive">
                    <div id="tableExport_wrapper" class="dataTables_wrapper dt-bootstrap4">
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
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($lahan_masuk as $masuk)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $masuk->penjual->email }}</td>
                                    <td>{{ $masuk->judul_lahan }}</td>
                                    <td>{{ $masuk->luas_lahan }}</td>
                                    <td>{{ $masuk->jenis_lahan }}</td>
                                    <td>{{ $masuk->sertifikat }}</td>
                                    <td>
                                        @foreach($masuk->images as $di)
                                        <img src="{{ asset($di->foto) }}" alt="" width="50">
                                        @break
                                        @endforeach
                                    </td>
                                    <td>{{ $masuk->harga_lahan }}</td>
                                    <td>{{ $masuk->no_hp }}</td>
                                    <td>
                                        <form action="{{ url('/admin/status') }}" method="get">
                                            <input type="hidden" name="lahan_id" value="{{ $masuk->id }}">
                                            <input type="hidden" name="status_lahan" value="1">

                                            <button class="btn btn-success">Dijual</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2><strong>Data Lahan (Di Jual)</strong></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <div class="dt-buttons">
                        <a href="" class="btn btn-outline-success btn-border-radius">Export to
                            Excell</a>
                        <a href="" class="btn btn-outline-danger btn-border-radius">Export to
                            PDF</a>
                    </div>
                    <div id="tableExport_wrapper" class="dataTables_wrapper dt-bootstrap4">
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
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($lahan_jual as $jual)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $jual->penjual->email }}</td>
                                    <td>{{ $jual->judul_lahan }}</td>
                                    <td>{{ $jual->luas_lahan }}</td>
                                    <td>{{ $jual->jenis_lahan }}</td>
                                    <td>{{ $jual->sertifikat }}</td>
                                    <td>
                                        @foreach($jual->images as $di)
                                        <img src="{{ asset($di->foto) }}" alt="" width="50">
                                        @break
                                        @endforeach
                                    </td>
                                    <td>{{ $jual->harga_lahan }}</td>
                                    <td>{{ $jual->no_hp }}</td>
                                    <td>
                                    <form action="{{ url('/admin/status') }}" method="get">
                                            <input type="hidden" name="lahan_id" value="{{ $jual->id }}">
                                            <input type="hidden" name="status_lahan" value="0">

                                            <button class="btn btn-success">Tidak Dijual</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2><strong>Data Lahan (SOLD OUT)</strong></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <div id="tableExport_wrapper" class="dataTables_wrapper dt-bootstrap4">
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
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($sold_out as $so)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $so->penjual->email }}</td>
                                    <td>{{ $so->judul_lahan }}</td>
                                    <td>{{ $so->luas_lahan }}</td>
                                    <td>{{ $so->jenis_lahan }}</td>
                                    <td>{{ $so->sertifikat }}</td>
                                    <td>
                                        @foreach($so->images as $di)
                                        <img src="{{ asset($di->foto) }}" alt="" width="50">
                                        @break
                                        @endforeach
                                    </td>
                                    <td>{{ $so->harga_lahan }}</td>
                                    <td>{{ $so->no_hp }}</td>
                                    <td>
                                        <p>SOLD OUT</p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection