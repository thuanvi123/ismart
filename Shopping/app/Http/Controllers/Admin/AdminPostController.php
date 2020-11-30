<?php

namespace App\Http\Controllers\Admin;

use App\AdminPostModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'post']);
            return $next($request);
        });
    }

    public function index(){
        $post=AdminPostModel::first()->paginate(5);
        return view('admin.post.index',compact('post'));
    }
    public function add(){
        return view('admin.post.add');

    }
    public function store(Request $request){
       $post=new AdminPostModel();
       $post->c_name=$request->name;
       $post->c_slug=str_slug($request->name);
       $post->save();
       return redirect('admin/post/list')->with('status','Thêm thành công');
    }
    public function edit($id){
        $post=AdminPostModel::find($id);

        return view('admin.post.edit',compact('post'));

    }
    public function update(Request $request,$id){
        $post=AdminPostModel::find($id);
        $post->c_name=$request->name;
        $post->c_slug=str_slug($request->name);
        $post->save();
        return redirect('admin/post/list')->with('status','Sửa thành công');

    }
    public function delete($id){
        $post=AdminPostModel::find($id);
        $post->delete();
        return redirect('admin/post/list')->with('status','Xóa thành công');

    }
}
