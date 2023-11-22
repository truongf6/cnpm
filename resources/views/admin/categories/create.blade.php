
@extends('layout.admin._Layout')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Danh mục</h1>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Thêm danh mục</h5>
                            <!-- Vertical Form -->
                            <form class="row g-3" action="{{ route('admin.categories.store') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Tên danh mục</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('name') }}</small>
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
                                    <button type="submit" class="btn btn-primary">Thêm</button>
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
