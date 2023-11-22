<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Sản phẩm bán chạy</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">

            @foreach ($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ $product->image }}">

                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{ route('client.shop.show', ['product_id' => $product->id, 'slug' => $product->name]) }}">{{ $product->name }}</a></h6>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>{{ number_format($product->price) }} VND</h5>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</section>
<!-- Product Section End -->
