@extends('layout.client._Layout')

@section('content')
    <div class="container" style="padding: 150px 0">
        <form method="POST" action="{{ route('client.forgotPassword.handleResetPassword') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $userForgotPassword->token }}" class="form-control">
            <input type="hidden" name="userid" value="{{ $userForgotPassword->userid }}" class="form-control">
            <div class="form-group">
                <label for="exampleInputEmail1">Mật khẩu mới</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
        </form>
    </div>
@endsection
