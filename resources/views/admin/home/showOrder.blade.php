@extends('layout.admin._Layout')

@php
    use App\Enums\OrderStatus;
@endphp

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h2>Chi tiết đơn hàng</h2>
        </div>
        <p>
        <div class="activity-content">
            Người nhận: <a href="#" class="fw-bold text-dark">{{ $order->fullnameReciver }}</a>
        </div>
        <div class="activity-content">
            Địa chỉ: <a href="#" class="fw-bold text-dark">{{ $order->address }}</a>
        </div>
        <div class="activity-content">
            Tin nhắn: <a href="#" class="fw-bold text-dark">{{ $order->message }}</a>
        </div>
        <div class="activity-content">
            Tổng hóa đơn: <a href="#" class="fw-bold text-dark">{{ number_format($order->totalOrder) }} VND</a>
        </div>
        <div class="activity-content">
            Ngày đặt: <a href="#" class="fw-bold text-dark">{{ $order->created_at->format('d/m/Y H:m:s') }}</a>
        </div>
        <div class="my-3 d-flex align-items-center justify-content-center">
            @switch($order->status)
                @case(OrderStatus::ORDER)
                    <a href="{{ route('admin.order.cancel', ['id' => $order->id]) }}" class="btn btn-danger mx-1">Hủy</a>
                    <a href="{{ route('admin.order.accept', ['id' => $order->id]) }}" class="btn btn-success mx-1">Chấp nhận</a>
                @break

                @case(OrderStatus::CANCEL_ORDER)
                    <h5 class="text-center">Đơn hàng đã bị hủy.</h5>
                @break

                @case(OrderStatus::CONFIRM_ORDER)
                    <a href="{{ route('admin.order.cancel', ['id' => $order->id]) }}" class="btn btn-danger mx-1">Hủy</a>
                    <a href="{{ route('admin.order.success', ['id' => $order->id]) }}" class="btn btn-success mx-1">Giao thành
                        công</a>
                @break

                @case(OrderStatus::ORDER_SUCCESS)
                    <h5 class="text-center">Đơn hàng đã giao thành công.</h5>
                @break

                @default
            @endswitch
        </div>
        </p>



        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body mt-4">
                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th class="col-3 text-center">Sản phẩm</th>
                                        <td class="col-2 text-center">Hình ảnh</td>
                                        <td class="col-2 text-center">Đơn giá</td>
                                        <th class="col-2 text-center">Số lượng</th>
                                        <th class="col-2 text-center">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                {{ $product->name }}
                                            </td>
                                            <td class="ext-center">
                                                <img src="{{ $product->image }}" alt="Girl in a jacket" height="100">
                                            </td>
                                            <td class="ext-center">{{ number_format($product->price) }} VND</td>
                                            <td class="ext-center">{{ $product->quantity }}</td>
                                            <td class="ext-center">{{ number_format($product->totalPrice) }} VND</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
