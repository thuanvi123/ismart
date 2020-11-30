<?php

namespace App\Http\Controllers;

use App\FrontendContactModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getContact(){
        return view('frontend.contact.index');
    }
    public function saveContact(Request $request){
        //Thêm nhanh
        $data=$request->except('_token');
        $data['created_at']=$data['updated_at']=Carbon::now();
        FrontendContactModel::insert($data);
        return redirect()->back();

    }
}
