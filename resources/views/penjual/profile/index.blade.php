@extends("templatepenjual.index")
@section('title') Profile Penjual @endsection
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
                    <img src="{{ asset('assets/images/bakhtiar.jpg') }}" class="user-img" alt="">
                    <div class="row">
                        <div class="col-4">
                            <h5>Nama</h5>
                            <small>Penjual</small>
                        </div>
                        <div class="col-4">
                            <h5>Email</h5>
                            <small>penjual@gmail.com</small>
                        </div>
                        <div class="col-4">
                            <h5>No Hp</h5>
                            <small>087730261606</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-8 col-md-12">
    <div class="contaianer">
        <div class="card">
            <div class="profile-tab-box">
                <div class="p-l-20">
                    <ul class="nav ">
                        <li class="nav-item tab-all p-l-20">
                            <a class="nav-link" href="#usersettings" data-toggle="tab">Edit Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane" id="usersettings" aria-expanded="false">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Edit Profile</strong> Anda</h2>
                    </div>
                    <div class="body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <input type="Number" class="form-control" placeholder="No Hp">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Current Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="New Password">
                        </div>
                        <button class="btn btn-info btn-round">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection