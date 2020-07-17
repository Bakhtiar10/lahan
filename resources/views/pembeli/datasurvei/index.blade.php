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
                                        <th>No Hp Penjual</th>
                                        <th>Alamat</th>
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
                                        <td>{{ $datas->lahan->no_hp }}</td>
                                        <td>{{ $datas->lahan->alamat}}</td>
                                        <td>{{ $datas->status_survei ? 'Telah dikonfirmasi' : 'Belum dikonfirmasi' }}
                                        </td>
                                        <td>
                                            <a href="{{route('detail_lahan',$datas->id_lahan)}}">Detail Lahan</a>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal">Pesan Lahan</button>
                                                <!-- <a href="" onclick="return confirm('Apakah anda yakin?')" class="btn btn-primary btn-sm">Pesan  </a> -->
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

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <form role="form" action="{{url('pembeli/survei/pesan')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModal">Apakah Data yakin ingin memesan lahan ? </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('/pembeli/detail_lahan') }}" class="btn btn-md btn-danger"
                            type="button">Batal</a>
                        <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection