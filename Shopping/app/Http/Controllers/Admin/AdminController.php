<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RoleModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request ,$next){
            session(['module_active'=>'user']);
            return $next($request);
        });
    }

    public function index(Request $request){
        $status=$request->input('status');
        $list_act=[
            'delete' =>'Xóa tạm thời'
        ];
        if ($status=='trash'){
            $list_act=[
                'restore'=>'Khôi phục',
                'forceDelete'=>'Xóa vĩnh viễn'
            ];
            $users=User::onlyTrashed()->paginate(5);
        }else{
            $key_word="";
            if($request->input('key_word')){
                $key_word=$request->input('key_word');
            }
            $users=User::where('name','LIKE',"%{$key_word}%")->paginate(5);
        }
        $count_active_status=User::count();
        $count_active_trash=User::onlyTrashed()->count();
        $count=[$count_active_status,$count_active_trash];

        return view('admin.user.index',compact('users','count','list_act'));
    }
    public function add(){
        $roles=RoleModel::all();
        return view('admin.user.add',compact('roles'));
    }
    public function store(Request $request){
        try{
            DB::beginTransaction();
            $user=User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            //insert user_role
            $user->roles()->attach($request->roles);
            DB::commit();
            return redirect('admin/user/list')->with('status','Thêm thành công');
        }catch (\Exception $exception){
            DB::rollBack();
        }

        return redirect('admin/user/list')->with('status','Thêm thành công');
    }
    public function action(Request $request){
        $list_check=$request->input('list_check');
        if ($list_check){
            foreach ($list_check as $k=>$id){
                if (Auth::id()==$id){
                    unset($list_check[$k]);
                }
            }
            if (!empty($list_check)){
                $act=$request->input('act');
                if ($act=='restore'){
                    User::withTrashed()->whereIn('id',$list_check)->restore();
                    return redirect('admin/user/list')->with('status','Khôi phục thành công');
                }
                if ($act=='delete'){
                    User::destroy($list_check);
                    return redirect('admin/user/list')->with('status','Vô hiệu hóa thành công');
                }
                if ($act=='forceDelete'){
                    User::withTrashed()->whereIn('id',$list_check)->forceDelete();
                    return redirect('admin/user/list')->with('status','Xóa vĩnh viễn thành công');
                }
            }
            return redirect('admin/user/list')->with('status','Bạn không thể xóa tài khoản của bạn');
        }else{
            return redirect('admin/user/list')->with('status','Bạn cần chọn thao tác trước khi thực hiện');
        }

    }
    public function edit($id){
        $roles=RoleModel::all();
        $user=User::find($id);
        $listRole=DB::table('user_role')->where('user_id',$id)->pluck('role_id');
        return view('admin.user.edit',compact('user','roles','listRole'));
    }
    public function update(Request $request,$id){
        try{
            DB::beginTransaction();
            User::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            //insert user_role
            $user=User::find($id);
            $user->roles()->sync($request->roles);
            DB::commit();
            return redirect('admin/user/list')->with('status','Sửa thành công');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('message'.$exception->getMessage().'Line'.$exception->getLine());
        }


    }
    public function delete($id){
        $users=User::find($id);
        if (Auth::id()!=$id){
            $users->delete();
            return redirect('admin/user/list')->with('status','Xóa thành công');
        }
    }
}
