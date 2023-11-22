
@extends('layout.admin._Layout')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Menu</h1>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sửa menu</h5>
                            <!-- Vertical Form -->
                            <form class="row g-3" action="{{ route('admin.menus.update', [ 'menu' => $menu->id ]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col-12">
                                    <label class="form-label">Tên menu</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') ?? $menu->name }}">
                                    @error('name')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('name') }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Route</label>
                                    <input type="text" class="form-control" name="route" value="{{ old('route') ?? $menu->route }}">
                                    @error('route')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('route') }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Thứ tự</label>
                                    <input type="text" class="form-control" name="order" value="{{ old('order') ?? $menu->order }}">
                                    @error('order')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('order') }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Hiển thị</label>
                                    <input type="checkbox" class="toggle-input" name="isActive" @if ($menu->isActive == '1') {{ 'checked' }} @endif id="switch" /><label class="toggle-label" for="switch"></label>
                                    @error('isActive')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('isActive') }}</small>
                                    @enderror
                                </div>
                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                    <a href="{{ route('admin.menus.index') }}" action class="btn btn-secondary">Quay lại</a>
                                </div>
                            </form><!-- Vertical Form -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
