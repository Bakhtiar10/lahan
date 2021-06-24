@extends("templatepenjual.index")
@section('title') Profile @endsection
@section("content")

<div class="col-lg-4 col-md-12">
    <div class="contaianer">
        <div class="card">
            <div class="m-b-20">
                <div class="contact-grid">
                    <div class="profile-header bg-dark">
                        <div class="user-name"></div>
                        <div class="name-center"></div>
                    </div>

                    @if($penjual->image == NULL)
                    <img src="{{ asset('assets/images/user_default.png') }}" class="user-img" alt="" height="130">
                    @else
                    <img src="{{ asset($penjual->image) }}" class="user-img" alt="" height="130">
                    @endif
                    <div class="row">
                        <div class="col-4">
                            <h5>Nama</h5>
                            <small>{{$penjual->name}}</small>
                        </div>
                        <div class="col-4">
                            <h5>Email</h5>
                            <small>{{$penjual->email}}</small>
                        </div>
                        <div class="col-4">
                            <h5>No Hp</h5>
                            <small>{{$penjual->no_hp}}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal">Edit Foto
            Profile</button>
    </div>
</div>
<div class="col-lg-8 col-md-12">
    <div class="contaianer">

        <div class="tab-content">
            <div id="usersettings" aria-expanded="true">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Edit Profile</strong> Anda</h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('penjual.update_profile', $penjual->id) }}" method="post">
                            @csrf

                            <div class="form-group">
                                @error('name')
                                <span style="color:red">{{ $message }}</span>
                                @enderror
                                <input type="text" class="form-control" placeholder="Nama Lengkap"
                                    value="{{ $penjual->name }}" name="name">

                            </div>
                            <!-- <div class="form-group">
                                @error('email')
                                <span>{{ $message }}</span>
                                @enderror
                                <input type="text" class="form-control" placeholder="Email"
                                    value="{{ $penjual->email }}" name="email">
                            </div> -->

                            <div class="form-group">
                                @error('no_hp')
                                <span style="color:red">{{ $message }}</span>
                                @enderror
                                <input type="Number" class="form-control" placeholder="No Hp"
                                    value="{{ $penjual->no_hp }}" name="no_hp">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Kata Sandi Baru"
                                    name="password">
                            </div>
                            <div class="form-group">
                                @error('password')
                                <span style="color:red">{{ $message }}</span>
                                @enderror
                                <input type="password" class="form-control" placeholder="Konfirmasi Kata Sandi"
                                    name="konfirmasi_password">
                            </div>
                            <button class="btn btn-info btn-round">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('penjual.update_fotoprofile', $penjual->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Foto Baru</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" aria-label="Close" class="btn btn-md btn-danger"
                        type="button">Batal</button>
                    <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection