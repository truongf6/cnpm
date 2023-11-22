
@extends('layout.admin._Layout')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Người dùng</h1>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sửa người dùng</h5>
                            <!-- Vertical Form -->
                            <form class="row g-3" action="{{ route('admin.users.update', [ 'user' => $user->id ]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col-12">
                                    <label class="form-label">Họ tên</label>
                                    <input type="text" class="form-control" name="fullname" value="{{ old('fullname') ?? $user->fullname }}">
                                    @error('fullname')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('fullname') }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Tài khoản</label>
                                    <input type="text" class="form-control" name="username" value="{{ old('username') ?? $user->username }}">
                                    @error('username')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('username') }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Mật khẩu mới</label>
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                    @error('password')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('password') }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" value="{{ old('address') ?? $user->address }}">
                                    @error('address')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('address') }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') ?? $user->email }}">
                                    @error('email')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('email') }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') ?? $user->phone }}">
                                    @error('phone')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('phone') }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Admin</label>
                                    <input type="checkbox" class="toggle-input" name="admin" value="{{ $user->admin ? '1' : '0' }}" id="switch" /><label class="toggle-label" for="switch"></label>
                                    @error('admin')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('admin') }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Hiển thị</label>
                                    <input type="checkbox" class="toggle-input" name="isActive" checked id="switch" /><label class="toggle-label" for="switch"></label>
                                    @error('isActive')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('isActive') }}</small>
                                    @enderror
                                </div>
                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                    <a href="{{ route('admin.users.index') }}" action class="btn btn-secondary">Quay lại</a>
                                </div>
                            </form><!-- Vertical Form -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
