@extends('layout.client._Layout')

@section('content')
<style>
    .qtybtn {
        display: none;
    }
</style>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Trang chủ</a>
                            <a href="{{ route('client.shop.index') }}">Cửa hàng</a>
                            <span>Giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productsInCart as $product)
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img style="width: 150px" src="{{ $product->image }}" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $product->name }}</h6>
                                                <h5>{{ number_format($product->price) }} VND</h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty-2">
                                                    <input type="text" value="{{ $product->quantity }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">{{ number_format($product->totalPrice, 0, '', ',') }} VND</td>
                                        <td class="cart__close"><a href="{{ route('client.cart.removeProduct', ['productID' => $product->id]) }}"><i class="fa fa-close"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{ route('client.shop.index') }}">Tiếp tục mua hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Tổng giỏ hàng</h6>
                        <ul>
                            <li>Thành tiền <span>{{ number_format($totalCart) }}  VND</span></li>
                            <li>Tổng <span> {{ number_format($totalCart) }} VND</span></li>
                        </ul>
                        <a href="{{ route('client.checkout.index') }}" class="primary-btn">Tiến hành thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection
