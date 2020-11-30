<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\ProductModel;
use App\SettingModel;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request,$next){
            session(['module_active'=>'setting']);
            return $next($request);

        });
    }
    public function index(){
        $settings=SettingModel::paginate(4);
        return view('admin.setting.index',compact('settings'));
    }
    public  function add(){
        return view('admin.setting.add');

    }
    public  function store(SettingRequest $request){
        $data=[
            'config_key'=>$request->config_key,
            'config_value'=>$request->config_value
        ];
        //thêm vào db
        SettingModel::create($data);
        return redirect('admin/setting/list')->with('status','Thêm thành công');
    }
    public function edit($id){
        $settings=SettingModel::find($id);
        return view('admin.setting.edit',compact('settings'));
    }
    public function update(Request $request,$id){
        $data=[
            'config_key'=>$request->config_key,
            'config_value'=>$request->config_value
        ];
        //thêm vào db
        SettingModel::find($id)->update($data);
        return redirect('admin/setting/list')->with('status','Sửa thành công');
    }
    public function delete($id){
        $sliders=SettingModel::find($id);
        $sliders->delete();
        return redirect('admin/setting/list')->with('status','Xóa thành công');
    }
}
