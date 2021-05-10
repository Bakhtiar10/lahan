<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Password Reset</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/extra_pages.css') }}" rel="stylesheet" />
</head>

<body class="login-page">
    <div class="limiter">
        <div class="container-login100 page-background">
            <div class="wrap-login100">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible rounded position-absolute"
                        style="top: 0; right: 0; margin-top: 10px; margin-right: 10px" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('status') }}
                    </div>
                @endif
				@if (session('warning'))
                    <div class="alert alert-warning alert-dismissible rounded position-absolute"
                        style="top: 0; right: 0; margin-top: 10px; margin-right: 10px" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('warning') }}
                    </div>
                @endif
                <form class="login100-form validate-form" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <span class="login100-form-logo">
                        <img alt="" src="../../assets/images/loading.png">
                    </span>
                    <span class="login100-form-title p-b-34 p-t-27">
                        Reset Password
                    </span>
                    <div class="text-center">
                        <p class="txt1 p-b-20">
                            Enter your registered email address.
                        </p>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter email">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <i class="material-icons focus-input1001">email</i>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Reset My Password
                        </button>
                    </div>
                    <div class="text-center p-t-50">
                        <a class="txt1" href="{{ route('login') }}">
                            Login?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Plugins Js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- Extra page Js -->
    <script src="{{ asset('assets/js/pages/examples/pages.js') }}"></script>
</body>

</html>
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
