@extends("templatepenjual.index")
@section('title') Data Saya @endsection
@section('content')

    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="card">
            <div class="header">
                <h2><strong>Data Saya</strong></h2>
            </div>

            <div class="body">
                <div class="table-responsive">
                    <div class="dt-buttons">
                        <a href="/penjual/datalahan/create" class="btn btn-outline-success btn-border-radius">Posting
                            Lahan</a>
                    </div>

                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-12">
                            <h5>Lahan terkonfirmasi</h5>
                        </div>
                        @forelse($lahan as $pe)
                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="#">
                                            @if (count($pe->images) > 0)
                                                <img class="pic-1" src="{{ asset($pe->images[0]->foto) }}" alt=""
                                                    style="width: 200px; height: 150px; Margin-top: 20px;">
                                            @else
                                                <img class="pic-1" src="{{ asset('no-image-found.png') }}" alt=""
                                                    style="width: 200px; height: 150px; Margin-top: 20px;">
                                            @endif
                                            {{-- @foreach ($pe->images as $pi)
                                    
                                    @break
                                    @endforeach --}}
                                        </a>
                                        <ul style="margin-left: -12px; padding: 0"
                                            class="social d-flex justify-content-between">
                                            <li><a href="{{ route('detail', $pe) }}" data-tip="Detail" style=""><i
                                                        class="far fa-eye"></i></a></li>
                                            <li><a href="{{ route('edit', $pe) }}" data-tip="Edit"><i
                                                        class="fas fa-edit"></i></a>
                                            </li>
                                            <li>
                                                <a type="button" data-tip="Hapus" data-toggle="modal"
                                                    data-target="#hapus{{ $pe->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                            </li>
                                            <li>
                                                @if ($pe->status_lahan === 0)
                                                    <a type="button" data-tip="Status" onclick="return alert('Tunggu konfirmasi dari admin')">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                @else
                                                    <a type="button" data-tip="Status" data-toggle="modal"
                                                        data-target="#status{{ $pe->id }}">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                @endif

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="#">{{ $pe->judul_lahan }}</a></h3>
                                        <div>
                                            <span>Rp. {{ number_format($pe->harga_lahan, 0, ',', '.') }}</span>
                                        </div>
                                        <a class="" href="">{{ $pe->no_hp }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="status{{ $pe->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h5 class="modal-title text-white" id="exampleModalLabel">Lahan Terjual</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('pesan.jual') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $pe->id }}" name="lahan_id">
                                            @if ($pe->status_jual == false)
                                                <input type="hidden" name="status_jual" value="1">
                                            @else
                                                <input type="hidden" name="status_jual" value="0">
                                            @endif
                                            <div class="modal-body">
                                                Apakah anda yakin lahan ini telah terjual ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="submit"
                                                    class="btn btn-info button-status-jual">Terjual</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="hapus{{ $pe->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title text-white" id="exampleModalLabel">Hapus Lahan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('destroy', $pe->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <div class="modal-body">
                                                Apakah anda yakin akan menghapus lahan {{ $pe->judul_lahan }} ?
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

                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-12">
                            <h5>Lahan belum terkonfirmasi</h5>
                        </div>
                        @forelse($lahan_belum_terkonfirmasi as $pe)
                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="#">
                                            @if (count($pe->images) > 0)
                                                <img class="pic-1" src="{{ asset($pe->images[0]->foto) }}" alt=""
                                                    style="width: 200px; height: 150px; Margin-top: 20px;">
                                            @else
                                                <img class="pic-1" src="{{ asset('no-image-found.png') }}" alt=""
                                                    style="width: 200px; height: 150px; Margin-top: 20px;">
                                            @endif
                                            {{-- @foreach ($pe->images as $pi)
                                    
                                    @break
                                    @endforeach --}}
                                        </a>
                                        <ul style="margin-left: -12px; padding: 0"
                                            class="social d-flex justify-content-between">
                                            <li><a href="{{ route('detail', $pe) }}" data-tip="Detail" style=""><i
                                                        class="far fa-eye"></i></a></li>
                                            <li><a href="{{ route('edit', $pe) }}" data-tip="Edit"><i
                                                        class="fas fa-edit"></i></a>
                                            </li>
                                            <li>
                                                <a type="button" data-tip="Hapus" data-toggle="modal"
                                                    data-target="#hapus{{ $pe->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                            </li>
                                            <li>
                                                @if ($pe->status_lahan === 0)
                                                    <a type="button" data-tip="Status" onclick="return alert('Tunggu konfirmasi dari admin')">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                @else
                                                    <a type="button" data-tip="Status" data-toggle="modal"
                                                        data-target="#status{{ $pe->id }}">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                @endif

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="#">{{ $pe->judul_lahan }}</a></h3>
                                        <div>
                                            <span>Rp. {{ number_format($pe->harga_lahan, 0, ',', '.') }}</span>
                                        </div>
                                        <a class="" href="">{{ $pe->no_hp }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="status{{ $pe->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h5 class="modal-title text-white" id="exampleModalLabel">Lahan Terjual</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('pesan.jual') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $pe->id }}" name="lahan_id">
                                            @if ($pe->status_jual == false)
                                                <input type="hidden" name="status_jual" value="1">
                                            @else
                                                <input type="hidden" name="status_jual" value="0">
                                            @endif
                                            <div class="modal-body">
                                                Apakah anda yakin lahan ini telah terjual ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="submit"
                                                    class="btn btn-info button-status-jual">Terjual</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="hapus{{ $pe->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title text-white" id="exampleModalLabel">Hapus Lahan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('destroy', $pe->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <div class="modal-body">
                                                Apakah anda yakin akan menghapus lahan {{ $pe->judul_lahan }} ?
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


    <script>
        function changeStatus(id) {
            $('#status').modal('show')
            $('#status').on('click', '.button-status-jual'function() {
                alert("form-lahan-" + id);
            })
        }
    </script>
@endsection
