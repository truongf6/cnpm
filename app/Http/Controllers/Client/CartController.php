<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CartController extends Controller
{
    public function index(Request $request) {
        $cart = (object)[];
        if ($request->cookie('cartUser')) {
            $cart = json_decode($request->cookie('cartUser'));
        }

        $productsInCart = [];
        $totalCart = 0;
        foreach ($cart as $productID => $quantity) {
            $product = Product::find($productID);
            $product->quantity = $quantity;
            $product->totalPrice = ($quantity * $product->price) ?? 0;
            $totalCart += $product->totalPrice;

            array_push($productsInCart, $product);
        }

        return view('client.cart.index', [
            'productsInCart' => $productsInCart,
            'totalCart' => $totalCart,
        ]);
    }

    public function addToCart(Request $request) {
        $response = (object)[
            'message' => '',
            'status' => 'error',
            'title' => 'Lỗi',
        ];

        $productID = $request->productID;
        $quantity = $request->quantity;

        if (!$productID || !$quantity || $quantity <= 0) {
            $response->message = 'Thiếu mã sản phẩn hoặc số lượng';
            return response()->json($response);
        }

        $cart = (object)[];
        if ($request->cookie('cartUser')) {
            $cart = json_decode($request->cookie('cartUser'));
        }

        if (!property_exists($cart, 'productID')) {
            $cart->$productID = 0;
        }
        $cart->$productID += $quantity;

        $response->status = 'success';
        $response->title = 'Thành công';
        $response->message = 'Thêm vào giỏ hàng thành công!';
        return response()->json($response)->withCookie(cookie('cartUser', json_encode($cart), 6000 * 24 * 30));
    }

    public function removeProduct(Request $request) {
        $productID = $request->productID;

        $cart = (object)[];
        if ($request->cookie('cartUser')) {
            $cart = json_decode($request->cookie('cartUser'));
        }

        unset($cart->$productID);

        return redirect()->route('client.cart.index')->withCookie(cookie('cartUser', json_encode($cart), 6000 * 24 * 30));
    }
}
