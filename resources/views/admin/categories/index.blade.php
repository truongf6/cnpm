
@extends('layout.admin._Layout')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Danh mục</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Thêm mới</a></h5>

                            <!-- Table with stripped rows -->
                            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">

                                <div class="datatable-container">
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th class="col-1 text-center">#</th>
                                                <th class="col-3 text-center">Tên danh mục</th>
                                                <th class="col-3 text-center">Hiển thị</th>
                                                <th class="col-3 text-center">Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <th class="text-center" scope="row">{{ $category->id }}</th>
                                                    <td>
                                                        {{ $category->name }}
                                                    </td>
                                                    <td>
                                                        {{ $category->isActive == '0' ? 'Ẩn' : 'Hiện' }}
                                                    </td>

                                                    <td class="ext-center">
                                                        <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" class="btn btn-primary btn-sm"
                                                    title="Sửa danh mục"><i class="bi bi-pencil"></i></a>
                                                    <form style="display: inline; margin-left: 5px;" action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button style="border: none; background: red; border-radius: 2px; transform: scale(1.15);"><i style="color: #fff" class="bi bi-trash"></i></button>
                                                    </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Table with stripped rows -->


                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
