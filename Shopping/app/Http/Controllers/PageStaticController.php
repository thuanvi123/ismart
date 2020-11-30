<?php

namespace App\Http\Controllers;

use App\FrontendAboutModel;
use App\FrontendProductModel;
use Illuminate\Http\Request;

class PageStaticController extends Controller
{
    public function aboutUs(){
        $abouts=FrontendAboutModel::latest()->take(1)->get();
        $selling_product =FrontendProductModel::where('total','>',7)->latest()->get();
        return view('frontend.page_static.about',compact('abouts','selling_product'));

    }
}
