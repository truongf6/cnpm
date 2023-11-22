<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index(Request $request) {
        $myOrders = Order::query()->where('userid', $request->cookie('userid'))->get();
        return view('client.my.index', [
            'orders' => $myOrders
        ]);
    }
}
