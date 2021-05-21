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
                                        <td>{{ $datas->user->name }}</td>
                                        <td><img src="{{ asset($datas->foto_ktp) }}" alt="" width="100"></td>
                                        <td>{{ $datas->no_hp }}</td>
                                        <td>{{ $datas->lahan->judul_lahan }}</td>
                                        <td>Rp. {{ number_format($datas->lahan->harga_lahan,0,"",".") }}</td>
                                        
                                        <td>
                                            <form action="{{ route('pesan.jual') }}" method="post">
                                            @csrf
                                                <input type="hidden" value="{{ $datas->lahan->id }}" name="lahan_id">
                                                <input type="hidden" name="id_pembeli" value="{{ $datas->user->id }}">
                                                <input type="hidden" name="foto_ktp" value="{{ $datas->foto_ktp }}">
                                                <input type="hidden" name="status_jual" value="1">
                                                <input type="submit" value="Jual">
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
                                        <th>Tanggal Pesan</th>
                                        <th>Nama Pembeli</th>
                                        <th>Foto KTP</th>
                                        <th>No Hp</th>
                                        <th>Judul Lahan</th>
                                        <th>Jenis Lahan</th>
                                        <th>Harga Lahan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @php $no = 1; @endphp
                                    @foreach($sold_out as $so)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $so->lahan->updated_at }}</td>
                                            <td>{{ $so->user->name }}</td>
                                            <td><img src="{{ asset($so->foto_ktp) }}" alt="" width="100"></td>
                                            <td>{{ $so->user->no_hp }}</td>
                                            <td>{{ $so->lahan->judul_lahan }}</td>
                                            <td>{{ $so->lahan->jenis_lahan }}</td>
                                            <td>Rp. {{ number_format($so->lahan->harga_lahan) }}</td>
                                            <td>Sold Out</td>
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
