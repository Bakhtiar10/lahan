@extends("template.index")
@section("content")
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2><strong>Data Masuk</strong></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <div class="dt-buttons">
                        <a href="" class="btn btn-outline-success btn-border-radius">Export to
                            Excell</a>
                        <a href="" target="_blank" class="btn btn-outline-danger btn-border-radius">Export to
                            PDF</a>
                    </div>
                    <div id="tableExport_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable"
                            role="grid" aria-describedby="tableExport_info">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Survei</th>
                                    <th>Waktu</th>
                                    <th>Nama Penyurvei</th>
                                    <th>Foto KTP</th>
                                    <th>No Hp</th>
                                    <th>Lokasi</th>
                                    <th>Judul Lahan</th>
                                    <th>Nama Penjual</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($survei_masuk as $datas)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $datas->tanggal }}</td>
                                    <td>{{ $datas->waktu }}</td>
                                    <td>{{ $datas->pembeli->name }}</td>
                                    <td>
                                        <img src="{{ asset($datas->foto_ktp) }}" alt="" width="100">
                                    </td>
                                    <td>{{ $datas->no_hp }}</td>
                                    <td>{{ $datas->lahan->alamat}}</td>
                                    <td>{{ $datas->lahan->judul_lahan}}</td>
                                    <td>{{ $datas->lahan->penjual->name }}</td>
                                    <td> <a href="">Detail</a></td>
                                    <td>
                                        <form action="{{ route('admin.status.survei', $datas->id) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success">Konfirmasi</button>
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
                <h2><strong>History Survei</strong></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <div class="dt-buttons">
                        <a href="" class="btn btn-outline-success btn-border-radius">Export to
                            Excell</a>
                        <a href="" target="_blank" class="btn btn-outline-danger btn-border-radius">Export to
                            PDF</a>
                    </div>
                    <div id="tableExport_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable"
                            role="grid" aria-describedby="tableExport_info">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Survei</th>
                                    <th>Waktu</th>
                                    <th>Nama Penyurvei</th>
                                    <th>Foto KTP</th>
                                    <th>No Hp</th>
                                    <th>Lokasi</th>
                                    <th>Judul Lahan</th>
                                    <th>Nama Penjual</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                                @php $no = 1; @endphp
                                @foreach($konfirmasi as $datas)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $datas->tanggal }}</td>
                                    <td>{{ $datas->waktu }}</td>
                                    <td>{{ $datas->pembeli->name }}</td>
                                    <td>
                                        <img src="{{ asset($datas->foto_ktp) }}" alt="" width="100">
                                    </td>
                                    <td>{{ $datas->no_hp }}</td>
                                    <td>{{ $datas->lahan->alamat}}</td>
                                    <td>{{ $datas->lahan->judul_lahan}}</td>
                                    <td>{{ $datas->lahan->penjual->name }}</td>
                                    <td>
                                    <form action="{{ route('admin.status.survei', $datas->id) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-danger">Cancel</button>
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
@endsection