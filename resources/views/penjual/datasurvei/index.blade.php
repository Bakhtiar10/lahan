@extends("templatepenjual.index")
@section('title') Data Survei Penjual @endsection
@section("content")

<div class="container">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Data Survei</strong></h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
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
                                        <th>Judul Lahan</th>
                                        <th>Harga Lahan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($survei as $datas)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $datas->tanggal }}</td>
                                        <td>{{ $datas->waktu }}</td>
                                        <td>{{ $datas->nama_penyurvei }}</td>
                                       <td><img src="{{ asset($datas->foto_ktp) }}" alt="" width="100"></td>
                                        <td>{{ $datas->no_hp }}</td>
                                        <td>{{ $datas->lahan->judul_lahan }}</td>
                                        <td>Rp. {{ number_format($datas->lahan->harga_lahan,0,"",".") }}</td>
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
</div>

<div class="container">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Data Pemesanan</strong></h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <div id="tableExport_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable"
                                role="grid" aria-describedby="tableExport_info">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Nama Pemesan</th>
                                        <th>Foto KTP</th>
                                        <th>No Hp</th>
                                        <th>Alamat</th>
                                        <th>Judul Lahan</th>
                                        <th>Harga Lahan</th>
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
                                            <div class="button btn btn-success">Konfirmasi </div>
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
</div>

<div class="container">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Data Lahan Sold Out</strong></h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <div id="tableExport_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable"
                                role="grid" aria-describedby="tableExport_info">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Nama Pembeli</th>
                                        <th>Foto KTP</th>
                                        <th>No Hp</th>
                                        <th>Alamat</th>
                                        <th>Judul Lahan</th>
                                        <th>Harga Lahan</th>
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
                                        <td>Sold Out</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection