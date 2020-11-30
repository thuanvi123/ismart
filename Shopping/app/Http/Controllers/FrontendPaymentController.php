<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FrontendPaymentController extends Controller
{
    public function index()
    {
        return view('frontend.payment.index');
    }

    public function saveInfoCart(Request $request)
    {

        $moneyTotal = str_replace(',','',\Cart::subtotal(0,3));
        $orders = Order::insertGetId([
            'name' => $request->fullname,
            'email' => $request->email,
            'total_price' =>(int) $moneyTotal,
            'address' => $request->address,
            'phone' => $request->phone,
            'not' => $request->note,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        if ($orders) {
            $product = \Cart::content();
            foreach ($product as $pro) {
                OrderDetail::insert([
                    'order_id'=>$orders,
                    'pro_id'=>$pro->id,
                    'qty'=>$pro->qty,
                    'price'=>$pro->price
                ]);
            }
        }
        \Cart::destroy();
        return redirect()->route('home');

    }
}
