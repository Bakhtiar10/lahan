@extends("templatepembeli.index")
@section('title') Data Survei @endsection
@section("content")

<div class="container-fluid">
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
                                        <th>Penjual</th>
                                        <th>Harga Lahan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($survei as $datas)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $datas->tanggal }}</td>
                                        <td>{{ $datas->waktu }}</td>
                                        <td>
                                            {{ $datas->lahan->penjual->name }}
                                        </td>
                                        <td>Rp. {{number_format($datas->lahan->harga_lahan,0,',','.')}}</td>
                                        <td>{{ $datas->status_survei ? 'Telah dikonfirmasi' : 'Belum dikonfirmasi' }}
                                        </td>
                                        <td>
                                            <a href="{{route('detail_lahan',$datas->id_lahan)}}">Detail Lahan</a>
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
</div>

@endsection
