<?php

namespace App\Http\Controllers;

use App\FrontendProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendSearchController extends Controller
{
    public function index(Request $request){
        $data=array();
        $products        =FrontendProductModel::paginate(5);
       $input=$request->all();
       if (isset($input['Search']) && (strlen($input['Search'])>2)){
         $data['search']=$search=$input['Search'];
       }else{
           $data['search']=$search='';
       }
        $data['result']= DB::table('products')->where('name','like','%'.$search.'%')->paginate(5);

    return view('frontend.search.index',$data);
    }
}
