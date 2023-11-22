
@extends('layout.admin._Layout')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Sản phẩm</h1>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Thêm Sản phẩm</h5>
                            <!-- Vertical Form -->
                            <form class="row g-3" action="{{ route('admin.products.store') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Tên Sản phẩm</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('name') }}</small>
                                    @enderror
                                </div>
                                {{-- <div class="form-group col-md-6">
                                    <label class="control-label">Ảnh</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <a class="btn btn-success" href="{{ route('elfinder.filepicker', ['input_id' => 'image']) }}" id="elfinder_button">Chọn hình ảnh</a>
                                        </div>
                                        <input type="text" class="form-control" name="image" id="image" id="file_input" aria-describedby="button-addon2">
                                        <div id = "selectedImages">
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="form-group col-md-6">
                                    <label class="control-label">Ảnh</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-success" type="button" onclick="openDialog()">Chọn hình ảnh</button>
                                        </div>
                                        <input type="text" class="form-control" name="image" id="file_input" aria-describedby="button-addon2">
                                    </div>
                                </div>
                                {{-- <div class="col-12">
                                    <label class="form-label">Ảnh</label>
                                    <input type="button" class="form-control" id="elfinder_button" name="image" value="Chọn ảnh">
                                    @error('image')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('image') }}</small>
                                    @enderror
                                </div> --}}
                                <div class="col-12">
                                    <label class="form-label">Giá</label>
                                    <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                                    @error('price')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('price') }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Mô tả</label>
                                    <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                                    @error('description')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('description') }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Danh mục</label>
                                    {{-- <input type="number" class="form-control" name="category_id" value="{{ old('category_id') }}"> --}}
                                    <select class="form-select" name="category_id">
                                        <option>Chọn danh mục</option>
                                        @foreach ($categories as $category)
                                            <option
                                                value="{{ $category->id }}"
                                                @if ($category->id == old('category_id'))
                                                    selected="selected"
                                                @endif
                                            >
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('category_id') }}</small>
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
                                    <a href="{{ route('admin.products.index') }}" action class="btn btn-secondary">Quay lại</a>
                                </div>
                            </form><!-- Vertical Form -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
