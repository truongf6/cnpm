@extends('layout.client._Layout')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="{{ asset('client/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Đơn hàng của tôi</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Người nhận</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Tổng hóa đơn</th>
                            <th scope="col">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <th scope="row">Mã đơn hàng {{ $order->id }}</th>
                                <td>{{ $order->fullnameReciver }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ number_format($order->totalOrder) }} VND</td>
                                <td>{{ $order->getStatus() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
