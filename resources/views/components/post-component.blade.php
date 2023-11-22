<!-- Latest Blog Section Begin -->
<section class="latest spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Bài viết gần đây</span>
                    <h2>Xu Hướng Các Nội Thất Đẹp</h2>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="{!! $post->thumb !!}"></div>
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
<!-- Latest Blog Section End -->
