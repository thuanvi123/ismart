<?php

namespace App\Http\Controllers;

use App\FrontendCategoryModel;
use App\FrontendMenuModel;
use App\FrontendProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendCategoryController extends Controller
{
    public function index(Request $request, $slug, $categoryId)
    {
        $categories = FrontendCategoryModel::where('parent_id', 0)->get();
        $products = FrontendProductModel::where('cat_id', $categoryId);
        if ($request->price) {
            $pro_price = $request->price;
            switch ($pro_price) {
                case '1':
                    $products->where('price', '<', 1000000);
                    break;
                case '2':
                    $products->whereBetween('price',[1000000,3000000]);
                    break;
                case '3':
                    $products->whereBetween('price',[3000000,5000000]);
                    break;
                case '4':
                    $products->whereBetween('price',[5000000,10000000]);
                    break;
                case '5':
                    $products->whereBetween('price',[10000000,25000000]);
                    break;
                case '6':
                    $products->where('price','>',25000000);
                    break;

            }
        }
        if ($request->orderby){
           $order=$request->orderby;
           switch ($order){
               case 'desc':
                   $products->orderby('id','DESC');
                   break;
               case 'asc':
                   $products->orderby('id','ASC');
                   break;
               case 'price_max':
                   $products->orderby('price','ASC');
                   break;
               case 'price_min':
                   $products->orderby('price','DESC');
                   break;
               default:
                   $products->orderby('id','DESC');
                   break;

           }
        }
        $products = $products->paginate(3);
        return view('frontend.category.index', compact('categories', 'products'));
    }
    public  function getList(){

    }
}
