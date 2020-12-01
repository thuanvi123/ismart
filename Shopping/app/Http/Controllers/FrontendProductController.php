<?php

namespace App\Http\Controllers;

use App\FrontendCategoryModel;
use App\FrontendImageModel;
use App\FrontendProductModel;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    private $productImage;
    public function __construct(FrontendImageModel $productImage)
    {
        $this->productImage=$productImage;
    }

    public function index(Request $request){
        $arrauUrl=(preg_split("/(-)/i",$request->segment(3)));
        $id=array_pop($arrauUrl);

         if ($id)
         {
             $productDetail=FrontendProductModel::find($id);
         }
        $category=FrontendCategoryModel::all();
        return view('frontend.product.detail',compact('productDetail','category'));
    }
}
