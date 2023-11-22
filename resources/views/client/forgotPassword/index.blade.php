@extends('layout.client._Layout')

@section('content')
    <div class="container" style="padding: 150px 0">
        <form method="POST" action="{{ route('client.forgotPassword.sendMail') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email đăng ký tài khoản</label>
                <input type="email" name="email" class="form-control">
                <small id="emailHelp" class="form-text text-muted">Đường dẫn thay đổi mật khẩu sẽ được gửi qua email đăng ký tài khoản.</small>
            </div>
            <button type="submit" class="btn btn-primary">Lấy lại mật khẩu</button>
        </form>
    </div>
@endsection
