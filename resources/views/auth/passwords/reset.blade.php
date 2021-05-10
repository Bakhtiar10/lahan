<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Lorax - Bootstrap 4 Admin Dashboard Template</title>
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
                <form class="login100-form validate-form" method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    <span class="login100-form-logo">
                        <img alt="" src="../../assets/images/loading.png">
                    </span>
                    <span class="login100-form-title p-b-34 p-t-27">
                        Reset Password
                    </span>
                    <div class="text-center">
                        <p class="txt1 p-b-20">
                            Enter your new password.
                        </p>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter email">
                        <input class="input100 @error('email') is-invalid @enderror" id="email" type="email" placeholder="Email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                        autofocus>
                        <i class="material-icons focus-input1001">email</i>
                        @error('email')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100 @error('password') is-invalid @enderror" id="password" type="password" id="password" name="password" placeholder="Password" required autocomplete="new-password">
                        <i class="material-icons focus-input1001">lock</i>
                        @error('password')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter confirm password">
                        <input id="password-confirm" class="input100" id="password" type="password" name="password_confirmation" placeholder="Confirm Password"  required autocomplete="new-password">
                        <i class="material-icons focus-input1001">lock</i>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
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
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                                    {{ __('Reset Password') }}
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
