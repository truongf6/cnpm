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
                <form class="login100-form validate-form" method="post" action="{{ route('client.register.store') }}">
                    <span class="login100-form-title p-b-26">
                        Đăng Ký
                    </span>
                    <span class="login100-form-title p-b-48">
                        <i class="zmdi zmdi-font"></i>
                    </span>

                    @csrf

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" value="{{ old('fullname') }}" placeholder=" " name="fullname">
                        <span class="focus-input100" data-placeholder="Họ tên"></span>
                        @error('fullname')
                            <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('fullname') }}</small>
                        @enderror
                    </div>

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

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" value="{{ old('address') }}" placeholder=" " name="address">
                        <span class="focus-input100" data-placeholder="Địa chỉ"></span>
                        @error('address')
                            <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('address') }}</small>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" value="{{ old('phone') }}" placeholder=" " name="phone">
                        <span class="focus-input100" data-placeholder="Số điện thoại"></span>
                        @error('phone')
                            <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('phone') }}</small>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" value="{{ old('email') }}" placeholder=" " name="email">
                        <span class="focus-input100" data-placeholder="Email"></span>
                        @error('email')
                            <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('email') }}</small>
                        @enderror
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Đăng ký
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-115">
                        <span class="txt1">
                            Đã có tài khoản?
                        </span>

                        <a class="txt2" href="{{ route('client.login.index') }}">
                            Đăng nhập
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

