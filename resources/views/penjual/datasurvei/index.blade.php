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
                                        <th>Nama Penyurvei</th>
                                        <th>Foto KTP</th>
                                        <th>No Hp</th>
                                        <th>Alamat</th>
                                        <th>Judul Lahan</th>
                                        <th>Harga Lahan</th>
                                        <th>Action</th>
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