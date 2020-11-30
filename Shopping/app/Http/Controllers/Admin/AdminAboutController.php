<?php

namespace App\Http\Controllers\Admin;

use App\AdminAboutModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAboutController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request,$next){
            session(['module_active'=>'about']);
           return $next($request);
        });
    }

    public function index(){
        $abouts=AdminAboutModel::paginate(5);
        return view('admin.about.index',compact('abouts'));
    }
    public function add(){
        return view('admin.about.add');
    }
    public function store(Request $request){
        $dataInsert=[
            'name'=>$request->name,
            'description'=>$request->a_description,
            'a_content'=>$request->a_content
        ];
        AdminAboutModel::create($dataInsert);
        return redirect('admin/about/list')->with('status','Thêm thành công');
    }
    public function edit($id){
        $about=AdminAboutModel::find($id);
        return view('admin.about.edit',compact('about'));
    }
    public function update(Request $request,$id){
        $dataUpdate=[
            'name'=>$request->name,
            'description'=>$request->a_description,
            'a_content'=>$request->a_content
        ];
        AdminAboutModel::find($id)->update($dataUpdate);
        return redirect('admin/about/list')->with('status','Thay đổi thành công');
    }
    public function delete($id){
        $about=AdminAboutModel::find($id);
        $about->delete();
        return redirect('admin/about/list')->with('status','Xóa thành công');
    }
}
