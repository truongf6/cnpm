@extends('layout.client._Layout')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="{{ asset('client/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Kết Quả Thanh Toán</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">

                @if ($isPaymentSuccess)
                    <h3 style="text-align:center; width: 100%;">Thanh toán thành công.</h3>
                @else
                    <h3 style="text-align:center; width: 100%;">Thanh toán thất bại.</h3>
                @endif

            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
