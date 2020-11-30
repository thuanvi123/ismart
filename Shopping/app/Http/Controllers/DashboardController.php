<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request,$next){
            session(['module_active'=>'dashboard']);
            return $next($request);
        });
    }

    public function show(){
        $orders=Order::latest()->paginate(2);
        return view('admin.dashboard',compact('orders'));
    }
}
