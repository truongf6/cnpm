@extends('layout.admin._Layout')

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
		{{-- @if (true)
			<div class="d-flex justify-content-center mt-2">
				<a class="btn btn-success fw-bold text-dark" style="color: #fff;">Xác nhận đơn</a>
			</div>
        @else
			<div class="d-flex justify-content-center mt-2">
				<a href="#" class="fw-bold text-dark">Đơn hàng đã gửi</a>
			</div>
		@endif --}}
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
