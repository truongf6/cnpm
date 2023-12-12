<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Enums\OrderStatus;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index() {
        $orders = Order::query()->orderBy('id', 'DESC')->get();

        foreach($orders as $order) {
            $order->fullnameOrder = User::find($order->userid)->fullname;
        }

        return view('admin.home.index', [
            'orders' => $orders,
        ]);

    }

    public function showOrder($orderid) {
        $order = Order::query()->find($orderid);
        $orderDetail = OrderDetail::query()->where('orderid', $orderid)->get();

        $products = [];
        foreach ($orderDetail as $item) {
            $product = Product::find($item->productid);
            $product->quantity = $item->quantity;
            $product->price = $item->price;
            $product->totalPrice = $item->totalPrice;

            array_push($products, $product);
        }

        return view('admin.home.showOrder', [
            'order' => $order,
            'products' => $products,
        ]);
    }

    public function accept($id) {
        $order = Order::where('status', OrderStatus::ORDER)->where('id', $id)->firstOrFail();
        $order->status = OrderStatus::CONFIRM_ORDER;
        $order->save();
        return redirect()->route('admin.home.showOrder', ['orderid' => $id]);
    }

    public function success($id) {
        $order = Order::where('status', OrderStatus::CONFIRM_ORDER)->where('id', $id)->firstOrFail();
        $order->status = OrderStatus::ORDER_SUCCESS;
        $order->save();
        return redirect()->route('admin.home.showOrder', ['orderid' => $id]);
    }

    public function cancel(Request $request, $id) {
        $order = Order::where('status', OrderStatus::ORDER)->where('id', $id)->firstOrFail();
        $order->status = OrderStatus::CANCEL_ORDER;
        $order->save();
        return redirect()->route('admin.home.showOrder', ['orderid' => $id]);
    }
}
