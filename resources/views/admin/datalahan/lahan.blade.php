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
                    <div class="dt-buttons">
                        <a href="/admin/lahanmasuk_excel" class="btn btn-outline-success btn-border-radius">Export to
                            Excell</a>
                        <a href="{{ route('export_pdf.lahanmasuk') }}" target="_blank"
                            class="btn btn-outline-danger btn-border-radius">Export to
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

                                            <button class="btn btn-success">Konfirmasi</button>
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
                        <a href="/admin/lahanjual_excel" class="btn btn-outline-success btn-border-radius">Export to
                            Excell</a>
                        <a href="{{ route('export_pdf.lahanjual') }}" target="_blank"
                            class="btn btn-outline-danger btn-border-radius">Export to
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

                                            <button class="btn btn-success">Terpublish</button>
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
                    <div class="dt-buttons">
                        <a href="/admin/soldout_excel" class="btn btn-outline-success btn-border-radius">Export to
                            Excell</a>
                        <a href="{{ route('export_pdf.soldout') }}" target="_blank"
                            class="btn btn-outline-danger btn-border-radius">Export to
                            PDF</a>
                    </div>
                    <div id="tableExport_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable"
                            role="grid" aria-describedby="tableExport_info">
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
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <p>SOLD OUT</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection