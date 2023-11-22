@extends('layout.client._Layout')

@section('content')
    <link rel="icon" type="image/png" href="{{ asset('login/images/icons/favicon.ico') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/css/main.css') }}">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="{{ route('client.login.processLogin') }}">
                    <span class="login100-form-title p-b-26">
                        Đăng Nhập
                    </span>
                    <span class="login100-form-title p-b-48">
                        <i class="zmdi zmdi-font"></i>
                    </span>

                    @csrf

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" value="{{ old('username') }}" placeholder=" " name="username">
                        <span class="focus-input100" data-placeholder="Tài khoản"></span>
                        @error('username')
                            <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('username') }}</small>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" value="{{ old('password') }}" placeholder=" " name="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                        @error('password')
                            <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('password') }}</small>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" style="border-bottom: 2px solid transparent;" data-validate="Enter password">
                        <a href="{{ route('client.forgotPassword.index') }}">
                            <span class="btn-show-pass">
                                Quên mật khẩu?
                            </span>
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Đăng Nhập
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-115">
                        <span class="txt1">
                            Chưa có tài khoản?
                        </span>

                        <a class="txt2" href="{{ route('client.register.index') }}">
                            Đăng ký
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

