
@extends('layout.client._Layout')

@section('content')

    <x-SliderComponent/>

    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-4">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="{{ asset('client/img/banner/banner-1.jpg') }}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Bộ Sưu Tập 2030</h2>
                            <a href="{{ route('client.shop.index') }}">Cửa Hàng</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="{{ asset('client/img/banner/banner-2.jpg') }}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Tủ Kính</h2>
                            <a href="{{ route('client.shop.index') }}">Cửa Hàng</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img src="{{ asset('client/img/banner/banner-3.jpg') }}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Giường 2023</h2>
                            <a href="{{ route('client.shop.index') }}">Cửa Hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <x-ProductsComponent/>

    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="categories__text">
                        <h2>Tủ Bếp <br /> <span>Bộ sưu tập tủ</span> <br /> Gối Đệm</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories__hot__deal">
                        <img src="{{ asset('client/img/product-sale.png') }}" alt="">
                        <div class="hot__deal__sticker">
                            <span>Giảm giá</span>
                            <h5>$29.99</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Giảm trong tuần</span>
                        <h2>Nội Thất</h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <div class="cd-item">
                                <span>3</span>
                                <p>Ngày</p>
                            </div>
                            <div class="cd-item">
                                <span>1</span>
                                <p>Giờ</p>
                            </div>
                            <div class="cd-item">
                                <span>50</span>
                                <p>Phút</p>
                            </div>
                            <div class="cd-item">
                                <span>18</span>
                                <p>Giây</p>
                            </div>
                        </div>
                        <a href="{{ route('client.shop.index') }}" class="primary-btn">Cửa hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <x-PostComponent/>
@endsection
