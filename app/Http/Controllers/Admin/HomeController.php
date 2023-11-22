<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

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
}
