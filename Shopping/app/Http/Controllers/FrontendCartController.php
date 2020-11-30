<?php

namespace App\Http\Controllers;

use App\FrontendMenuModel;
use App\FrontendProductModel;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

class FrontendCartController extends Controller
{
    public function show_add()
    {
        $menus           =FrontendMenuModel::where('parent_id',0)->get();
        return view('frontend.cart.show',compact('menus'));
    }
    public function add($id)
    {
        $product = FrontendProductModel::find($id);
        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' =>1,
            'price'=>$product->price,
            'weight' => 550,
            'options' => [
                'code' => $product->code,
                'feature_image'=>$product->feature_image
            ]
        ]);
        return redirect()->back();

//        $cart = session()->get('cart');;
//        if (isset($cart[$id])) {
//            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
//        } else {
//            $cart[$id] = [
//                'id' => $product->id,
//                'name' => $product->name,
//                'price' => $product->price,
//                'quantity' => 1
//            ];
//        }
//        session()->put('cart', $cart);
    }
    public function update(Request $request,$id){
        $qty=$request->qty;
        $rowId=$request->rowId;
        \Cart::update($rowId, $qty);
        $cartItem=\Cart::content();

        return view('frontend/cart/update',compact('cartItem'));

    }
    public  function remove($rowId){

        \Cart::remove($rowId);
        return redirect()->back();
    }
    public function destroy(){
        \Cart::destroy();
        return redirect()->back();
    }
}
