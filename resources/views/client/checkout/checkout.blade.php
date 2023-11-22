@extends('layout.client._Layout')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Thanh Toán</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Trang Chủ</a>
                            <a href="{{ route('client.shop.index') }}">Cửa Hàng</a>
                            <span>Thanh Toán</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form method="post">
                    @csrf

                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout__input">
                                <p>Tên người nhận<span>*</span></p>
                                <input type="text" name="fullnameReciver" value="{{ $user->fullname }}">
                                @error('fullnameReciver')
                                    <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('fullnameReciver') }}</small>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" name="address" value="{{ $user->address }}" placeholder="" class="checkout__input__add">
                                @error('address')
                                    <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('address') }}</small>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Số điện thoại<span>*</span></p>
                                <input type="text" name="phone" value="{{ $user->phone }}">
                                @error('phone')
                                    <small id="emailHelp" class="form-text text-muted" style="color: red !important;">{{ $errors->first('phone') }}</small>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Ghi chú</p>
                                <input type="text" name="message">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Hóa Đơn</h4>
                                <div class="checkout__order__products">Sản phẩm <span>Tổng</span></div>
                                <ul class="checkout__total__products">
                                    @foreach ($productsInCart as $product)
                                        <li>{{ $product->quantity }}x {{ $product->name }} <span> {{ number_format($product->totalPrice) }} VND</span></li>
                                    @endforeach
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Thành tiền <span>{{ number_format($totalCart) }} VND</span></li>
                                </ul>
                                <button type="submit" formaction="{{ route('client.checkout.processCheckoutCOD') }}" class="site-btn">THANH TOÁN KHI NHẬN HÀNG</button>
                                <button type="submit" formaction="{{ route('client.checkout.processCheckoutVNPay') }}" class="site-btn">THANH TOÁN VNPAY</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

@endsection
