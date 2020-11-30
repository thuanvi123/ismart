<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'order']);
            return $next($request);
        });
    }

    public function index()
    {
        $orders = Order::paginate(2);
        return view('admin.order.index', compact('orders'));

    }

    public function viewOrder(Request $request, $id)
    {
        if ($request->ajax()) {
            $order_detail = OrderDetail::with('product')->where('order_id', $id)->get();
            $html=view('admin.compoment.order',compact('order_detail'))->render();
            return \response()->json($html);
        }
    }
    public function action($action,$id){
        if ($action) {

            $order = Order::find($id);

            switch ($action) {
                case 'delete':
                    $order->delete();
                    break;
                case 'active':
                    $order->status= $order->status ? 0:1;
                    break;
            }
            $order->save();
        }

        return redirect('admin/order/list')->with('status','Thay đổi thành công');

    }


}
