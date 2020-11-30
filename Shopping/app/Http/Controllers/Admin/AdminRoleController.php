<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PermissionModel;
use App\RoleModel;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request,$next){
            session(['module_active'=>'active']);
            return $next($request);
        });
    }

    public function index(){
        $roles=RoleModel::paginate(5);
        return view('admin.role.index',compact('roles'));
    }
    public function add(){
        $permission=PermissionModel::where('parent_id',0)->get();
        return view('admin.role.add',compact('permission'));

    }
    public function store(Request $request){
        $roles=RoleModel::create([
            'name'=>$request->name,
            'display_name'=>$request->display_name
        ]);
        $roles->permissions()->attach($request->permission_id);
        return redirect('admin/roles/list')->with('status','Thêm thành công');
    }
    public function edit($id){
        $permission=PermissionModel::where('parent_id',0)->get();
        $roles=RoleModel::find($id);
        $permissionChecked=$roles->permissions;
        return view('admin.role.edit',compact('permission','roles','permissionChecked'));

    }
    public function update(Request $request,$id){
        $roles=RoleModel::find($id);
        $roles->update([
            'name'=>$request->name,
            'display_name'=>$request->display_name
        ]);
        $roles->permissions()->sync($request->permission_id);

        return redirect('admin/roles/list')->with('status','Sửa thành công');
    }

}
