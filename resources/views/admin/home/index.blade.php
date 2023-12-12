@extends('layout.admin._Layout')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Đơn hàng</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">
                            <h5 class="card-title">Đơn hàng gần đây</span></h5>

                            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                <div class="datatable-top">
                                    <div class="datatable-search">
                                        <input class="datatable-input" placeholder="Search..." type="search"
                                            title="Search within table">
                                    </div>
                                </div>
                                <div class="datatable-container">
                                    <table class="table table-borderless datatable datatable-table">
                                        <thead>
                                            <tr>
                                                <th data-sortable="true" style="width: 10.911602209944752%;"><a
                                                        href="#" class="datatable-sorter">#</a></th>
                                                <th data-sortable="true" style="width: 24.03314917127072%;"><a
                                                        href="#" class="datatable-sorter">Người đặt</a></th>
                                                <th data-sortable="true" style="width: 35.193370165745854%;"><a
                                                        href="#" class="datatable-sorter">Người nhận</a></th>
                                                <th data-sortable="true" style="width: 9.806629834254144%;"><a
                                                        href="#" class="datatable-sorter">Giá</a></th>
                                                <th data-sortable="true" style="width: 9.806629834254144%;"><a
                                                        href="#" class="datatable-sorter">Trạng Thái</a></th>
                                                <th data-sortable="true" style="width: 20.05524861878453%;"><a
                                                        href="#" class="datatable-sorter">Hình thức thanh toán</a></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($orders as $order)
                                                <tr data-index="{{ $order->id }}">
                                                    <td><a style="text-decoration: none;" href="{{ route('admin.home.showOrder', ['orderid' => $order->id]) }}">Đơn hàng {{ $order->id }}</a></td>
                                                    <td>{{ $order->fullnameOrder }}</td>
                                                    <td>{{ $order->fullnameReciver }}</td>
                                                    <td>{{ number_format($order->totalOrder) }} VND</td>
                                                    <td>{{ $order->getStatus() }}</td>
                                                    <td>{{ $order->payMethod }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
