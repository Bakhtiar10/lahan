@extends("template.index")
@section("content")

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2><strong>Data Komentar</strong></h2>
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal & Waktu</th>
                                    <th>Komentar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $id = 1; @endphp
                                @foreach($koments as $koment)
                                <tr>
                                    <td>{{ $id++ }}</td>
                                    <td>{{ $koment->user->name }}</td>
                                    <td>{{ $koment->user->email }}</td>
                                    <td>{{ $koment->created_at }}</td>
                                    <td>{{ $koment->content }}</td>
                                    <td>
                                        <form action=" {{ route('koment.destroy', $koment->id)}}" method="post"
                                            id="form-delete">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                        <button class="btn btn-danger btn-sm" onclick="deleteRow({{$koment->id}})"><i
                                                class="fa fa-trash"></i></button>
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

<script>
function deleteRow(id) {
    swal({
            title: 'Apakah Anda Yakin?',
            text: "Anda Tidak Akan Dapat Mengembalikannya!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        })
        .then((willDelete) => {
            if (willDelete) {
                $('#form-delete').submit();
            }
        });
}
</script>

@endsection