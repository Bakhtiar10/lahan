@extends("template.index")
@section("content")

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2><strong>Data User</strong></h2>
            </div>

            <div class="body">
                <div class="table-responsive">
                    <div class="dt-buttons">
                        <a href="/admin/penjual_excel" class="btn btn-outline-success btn-border-radius">Export to
                            Excell</a>
                        <a href="{{ route('export_pdf.user_pdf') }}" target="_blank" class="btn btn-outline-danger btn-border-radius">Export to PDF</a>
                    </div>
                    <div id="tableExport_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable"
                            role="grid" aria-describedby="tableExport_info">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Terdaftar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php($id = 1)
                                @foreach($penjual as $datas)
                                <tr>
                                    <th>{{ $id++}}</th>
                                    <td>{{ $datas->name }}</td>
                                    <td>{{ $datas->email }}</td>
                                    <td>{{ date('D, d M Y', strtotime($datas->created_at)) }}</td>
                                    <td> <a href="/admin/detailpenjual/{{$datas->id}}">Detail</a></td>
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