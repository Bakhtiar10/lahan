<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="icon" href="../../assets/images/favicon.ico" type="image/x-icon">
	<!-- Plugins Core Css -->
    
	<link href="../../assets/css/app.min.css" rel="stylesheet">
    <link href="../../assets/css/form.min.css" rel="stylesheet">
	<!-- Custom Css -->
	<link href="../../assets/css/style.css" rel="stylesheet" />
	<link href="../../assets/css/pages/extra_pages.css" rel="stylesheet" />
    <style>
        .select-role{
            border: none; 
            border-bottom: 1px solid; 
            background: transparent; 
            outline: 0; 
            padding-left: 30px; 
            font-size: 16px; 
            color: white; 
            height: 50px; 
            padding-top: 10px; 
            padding-bottom: 10px;
        }
        .select-role:focus{
            color : black;
            padding-left: 30px; 
            background: transparent; 
        }

        .select-role:required{
            padding-left: 30px; 
        }
    </style>
</head>
<body>
    <div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="{{ route('register') }}" method="POST">
                    @csrf
					<span class="login100-form-title p-b-34 p-t-27">
						Registration
					</span>
					<div class="row">
                        <div class="col-lg-12 p-t-20">
							<div class="wrap-input100 validate-input">
								<select class="form-control select-role" name="role_id" id="">
                                    <option value="">Pilih Salah satu</option>
                                    @foreach ($roles as $role)
                                        <option @if(old('role_id') == $role->id) selected @endif value="{{ $role->id }}">{{ $role->role }}</option>
                                    @endforeach
                                </select>
								<i class="material-icons focus-input1001">person</i>
                                @error('role_id')
                                    <span class="text-danger mt-2" >{{ $message }}</span>
                                @enderror
							</div>
						</div>
                        <div class="col-lg-12 p-t-20">
							<div class="wrap-input100">
								<input class="input100" type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}">
								<i class="material-icons focus-input1001">person</i>
                                @error('name')
                                    <span class="text-danger mt-2" >{{ $message }}</span>
                                @enderror
							</div>
						</div>
                        <div class="col-lg-12 p-t-20">
							<div class="wrap-input100">
								<input class="input100" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
								<i class="material-icons focus-input1001">email</i>
                                @error('email')
                                    <span class="text-danger mt-2" >{{ $message }}</span>
                                @enderror
							</div>
						</div>
						<div class="col-lg-6 p-t-20">
							<div class="wrap-input100">
								<input class="input100" type="text" name="username" placeholder="Username" value="{{ old('username') }}">
								<i class="material-icons focus-input1001">stars</i>
                                @error('username')
                                    <span class="text-danger mt-2" >{{ $message }}</span>
                                @enderror
							</div>
						</div>
						<div class="col-lg-6 p-t-20">
							<div class="wrap-input100">
								<input class="input100" type="text" name="no_hp" placeholder="No. Handphone" value="{{ old('no_hp') }}">
								<i class="material-icons focus-input1001">phone</i>
                                @error('no_hp')
                                    <span class="text-danger mt-2" >{{ $message }}</span>
                                @enderror
							</div>
						</div>
						<div class="col-lg-6 p-t-20">
							<div class="wrap-input100">
								<input class="input100" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
								<i class="material-icons focus-input1001">lock</i>
                                @error('password')
                                    <span class="text-danger mt-2" >{{ $message }}</span>
                                @enderror
							</div>
						</div>
						<div class="col-lg-6 p-t-20">
							<div class="wrap-input100">
								<input class="input100" type="password" name="confirm_password" placeholder="Confirm password" value="{{ old('confirm_password') }}">
								<i class="material-icons focus-input1001">lock</i>
                                @error('confirm_password')
                                    <span class="text-danger mt-2" >{{ $message }}</span>
                                @enderror
							</div>
						</div>
					</div>
					<div class="contact100-form-checkbox">
						<div class="form-check">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" value=""> Remember me
								<span class="form-check-sign">
									<span class="check"></span>
								</span>
							</label>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Sign Up
						</button>
					</div>
					<div class="text-center p-t-50">
						<a class="txt1" href="{{ route('login') }}">
							You already have a membership?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

    <!-- Plugins Js -->
	<script src="../../assets/js/app.min.js"></script>
    <script src="../../assets/js/form.min.js"></script>
	<!-- Extra page Js -->
	<script src="../../assets/js/pages/examples/pages.js"></script>
     <!-- Custom Js -->
     <script src="../../assets/js/admin.js"></script>
     <script src="../../assets/js/pages/forms/advanced-form-elements.js"></script>
</body>
</html>

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
