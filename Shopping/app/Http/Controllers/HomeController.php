<?php

namespace App\Http\Controllers;

use App\FrontendCategoryModel;
use App\FrontendMenuModel;
use App\FrontendProductModel;
use App\FrontenSliderdModel;

class HomeController extends Controller
{
    public function index()
    {
        $sliders         =FrontenSliderdModel::latest()->limit(3)->get();
        $categories      =FrontendCategoryModel::where('parent_id',0)->get();
        $products        =FrontendProductModel::latest()->take(5)->get();
        $selling_product =FrontendProductModel::where('total','>',7)->latest()->get();
        $menus           =FrontendMenuModel::where('parent_id',0)->get();
        return view('frontend.home.home',compact('sliders','categories','products','selling_product','menus'));
    }
}
