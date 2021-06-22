@extends("template.index")
@section("content")

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
                                    <th>Pada Tanggal</th>
                                </tr>
                            </thead>

                            <tbody>
                            @php $no = 1; @endphp
                               @foreach($sold_out as $so)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $so->lahan->user->name }}</td>
                                        <td>{{ $so->lahan->judul_lahan }}</td>
                                        <td>
                                            @if (count($so->lahan->images) > 0)
                                                <img src="{{ asset($so->lahan->images[0]) }}" alt="" width="50">
                                            @else
                                                <img src="{{ asset('no-image-found.png') }}" alt="" width="50">
                                            @endif
                                        </td>
                                        <td>{{ $so->lahan->harga_lahan }}</td>
                                        <td>{{ $so->lahan->updated_at }}</td>
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