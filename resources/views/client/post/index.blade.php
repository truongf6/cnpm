@extends('layout.client._Layout')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="{{ asset('client/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Bài viết</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">

                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{ $post->thumb }}"></div>
                            <div class="blog__item__text">
                                <span><img src="{{ asset('client/img/icon/calendar.png') }}" alt=""> {{ $post->created_at->format('d - m - Y') }}</span>
                                <h5>{{ $post->title }}</h5>
                                <a href="{{ route('client.post.show', [
                                    'post_id' => $post->id,
                                    'slug' => $post->title,
                                ]) }}">Xem Ngay</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
