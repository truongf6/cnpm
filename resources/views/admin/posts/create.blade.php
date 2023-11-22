
@extends('layout.admin._Layout')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Bài viết</h1>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Thêm Bài viết</h5>
                            <!-- Vertical Form -->
                            <form class="row g-3" action="{{ route('admin.posts.store') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                    @error('title')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('title') }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Ảnh nền</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-success" type="button" onclick="openDialog()">Chọn hình ảnh</button>
                                        </div>
                                        <input type="text" class="form-control" name="thumb" id="file_input" aria-describedby="button-addon2">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nội dung</label>
                                    <input type="text" class="form-control" name="content" value="{{ old('content') }}">
                                    @error('content')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('content') }}</small>
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
                                    <a href="{{ route('admin.posts.index') }}" action class="btn btn-secondary">Quay lại</a>
                                </div>
                            </form><!-- Vertical Form -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
