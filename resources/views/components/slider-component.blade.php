<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">

        @foreach ($sliders as $slider)
            <div class="hero__items set-bg" data-setbg="{{ $slider->background }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>{{ $slider->subheading }}</h6>
                                <h2>{{ $slider->heading }}</h2>
                                <p>{{ $slider->content }}</p>
                                <a href="{{ route('client.shop.index') }}" class="primary-btn">Xem ngay <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</section>
<!-- Hero Section End -->
