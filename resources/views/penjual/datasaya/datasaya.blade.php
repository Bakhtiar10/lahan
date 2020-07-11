@extends("templatepenjual.index")
@section('title') Data Saya @endsection
@section("content")

<div class="container">
    @if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{Session::get('message')}}
    </div>
    @endif
    <div class="card">
        <div class="header">
            <h2><strong>Data Saya</strong></h2>
        </div>

        <div class="body">
            <div class="table-responsive">
                <div class="dt-buttons">
                    <a href="/penjual/datalahan/create" class="btn btn-outline-success btn-border-radius">Posting Lahan</a>
                </div>

                <div class="row" style="margin-top: 20px">
                    @forelse($lahan as $pe)
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="#">
                                    @foreach($pe->images as $pi)
                                    <img class="pic-1" src="{{asset($pi->foto)}}" alt=""
                                        style="width: 200px; height: 150px; Margin-top: 20px;">
                                    @break
                                    @endforeach
                                </a>
                                <ul class="social">
                                    <li><a href="{{route('detail', $pe)}}" data-tip="Detail"><i
                                                class="far fa-eye"></i></a></li>
                                    <li><a href="{{route('edit', $pe)}}" data-tip="Edit"><i class="fas fa-edit"></i></a>
                                    </li>
                                    <li>
                                        <a type="button" data-tip="Hapus" data-toggle="modal"
                                            data-target="#hapus{{$pe->id}}">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                    </li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#">{{$pe->judul_lahan}}</a></h3>
                                <div>
                                    <span>Rp. {{number_format($pe->harga_lahan,0,',','.')}}</span>
                                </div>
                                <a class="" href="">{{$pe->no_hp}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="hapus{{$pe->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h5 class="modal-title text-white" id="exampleModalLabel">Hapus Lahan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('destroy', $pe->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <div class="modal-body">
                                        Apakah anda yakin akan menghapus lahan {{$pe->judul_lahan}} ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <h5 style="text-align:center;">Tidak ada Data</h5>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
