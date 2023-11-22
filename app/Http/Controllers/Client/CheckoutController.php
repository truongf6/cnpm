<?php

namespace App\Http\Controllers\Client;

use PDF;
use Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Checkout\ProcessRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->cookie('userid'));
        $cart = json_decode($request->cookie('cartUser')) ?? [];

        $productsInCart = [];
        $totalCart = 0;
        foreach ($cart as $productID => $quantity) {
            $product = Product::find($productID);
            $product->quantity = $quantity;
            $product->totalPrice = ($quantity * $product->price) ?? 0;
            $totalCart += $product->totalPrice;

            array_push($productsInCart, $product);
        }

        return view('client.checkout.index', [
            'user' => $user,
            'productsInCart' => $productsInCart,
            'totalCart' => $totalCart,
        ]);
    }

    public function checkoutResult()
    {
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $vnp_HashSecret = "RRHVANTMQXHUMDMJDLAAMEVGFSLQHWBM";
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        $isPaymentSuccess = false;
        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
                $orderid = $_GET['vnp_TxnRef'];
                Order::where('id', $orderid)->update(['status' => 1]);
                $isPaymentSuccess = true;
            }
        }

        return response(view('client.checkout.checkoutResult', [
            'isPaymentSuccess' => $isPaymentSuccess
        ]))->withCookie(cookie('cartUser', null, -1000 * 60));
    }

    public function processCheckoutVNPay(ProcessRequest $request)
    {
        $cart = json_decode($request->cookie('cartUser')) ?? [];
        if (empty($cart)) {
            return redirect()->back()
                ->with('msg', 'Giỏ hàng trống')
                ->with('type', 'warning');
        }

        $params = $request->validated();
        $params['userid'] = $request->cookie('userid');
        $params['totalOrder'] = 0;
        $params['payMethod'] = 'Thanh toán online';
        $params['status'] = -2;

        $order = Order::query()->create($params);

        foreach ($cart as $productid => $quantity) {
            $paramsOrder = [];
            $product = Product::find($productid);
            $paramsOrder['orderid'] = $order->id;
            $paramsOrder['productid'] = $product->id;
            $paramsOrder['price'] = $product->price;
            $paramsOrder['quantity'] = $quantity ?? 0;
            $paramsOrder['totalPrice'] = ($quantity * $product->price) ?? 0;

            $order->totalOrder += $paramsOrder['totalPrice'];

            OrderDetail::query()->create($paramsOrder);
        }

        $order->update();

        $this->processVNPay($order->id, $order->totalOrder);

    }

    public function processCheckoutCOD(ProcessRequest $request)
    {
        $cart = json_decode($request->cookie('cartUser')) ?? [];
        if (empty($cart)) {
            return redirect()->back()
                ->with('msg', 'Giỏ hàng trống')
                ->with('type', 'warning');
        }

        $params = $request->validated();
        $params['userid'] = $request->cookie('userid');
        $params['totalOrder'] = 0;
        $params['payMethod'] = 'Thanh toán khi nhận hàng';
        $params['status'] = 0;

        $order = Order::query()->create($params);

        foreach ($cart as $productid => $quantity) {
            $paramsOrder = [];
            $product = Product::find($productid);
            $paramsOrder['orderid'] = $order->id;
            $paramsOrder['productid'] = $product->id;
            $paramsOrder['price'] = $product->price;
            $paramsOrder['quantity'] = $quantity ?? 0;
            $paramsOrder['totalPrice'] = ($quantity * $product->price) ?? 0;

            $order->totalOrder += $paramsOrder['totalPrice'];

            OrderDetail::query()->create($paramsOrder);
        }

        $order->update();

        return redirect()->route('client.cart.index')
            ->withCookie(cookie('cartUser', null, -1000 * 60))
            ->with('msg', 'Đặt hàng thành công.')
            ->with('type', 'success');
    }

    public function processVNPay($orderid, $totalAmount)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        // $vnp_Returnurl = route('client.checkout.checkoutResult');
        $vnp_Returnurl = 'http://127.0.0.1:8000/ket-qua-thanh-toan';
        $vnp_TmnCode = env('vnp_TmnCode'); //Mã website tại VNPAY
        $vnp_HashSecret = env('vnp_HashSecret'); //Chuỗi bí mật

        $vnp_TxnRef = $orderid; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toan hoa don $orderid";
        $vnp_OrderType = "orther";
        $vnp_Amount = $totalAmount * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        //Billing
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
}
