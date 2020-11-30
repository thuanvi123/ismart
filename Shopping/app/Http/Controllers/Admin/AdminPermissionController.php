<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PermissionModel;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    //tạo dữ liệu bảng permission
    public function add(){
        return view('admin.permission.add');
    }
    public function store(Request $request){
        $permission=PermissionModel::create([
            'name'=>$request->module_parent,
            'display_name'=>$request->module_parent,
            'parent_id'=>0
        ]);
        foreach ($request->module_childrent as $value){
            PermissionModel::create([
                'name'=>$value,
                'display_name'=>$value,
                'key_code'=>$request->module_parent. '_'.$value,
                'parent_id'=>$permission->id,

            ]);
        }
        return redirect('admin/permission/add');
    }

}
