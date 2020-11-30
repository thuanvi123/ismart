<?php

namespace App\Http\Controllers\Admin;

use App\AdminArticleModel;
use App\AdminPostModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\TraitsStorageImages;
use function Sodium\compare;

class AdminArticleController extends Controller
{
    use TraitsStorageImages;
    public function __construct()
    {
        $this->middleware(function ($request,$next){
            session(['module_active'=>'post']);
            return $next($request);
        });
    }

    public function index()
    {
        $article=AdminArticleModel::paginate(6);
        return view('admin.article.index',compact('article'));
    }

    public function add()
    {
        $article=AdminPostModel::all();
        return view('admin.article.add',compact('article'));
    }
    public function store(Request $request){
        $dataInsert=[
            'a_name'=>$request->name,
            'slug'=>str_slug($request->name),
            'a_description'=>$request->a_description,
            'a_content'=>$request->a_content,
            'post_id'=>$request->post_id,

        ];
        $dataUploadStorage=$this->storageTraitUpload($request,'a_images','article');
        if (!empty($dataUploadStorage)){
            $dataInsert['a_images']=$dataUploadStorage['file_path'];
            $dataInsert['image_name']=$dataUploadStorage['file_name'];
        }
        AdminArticleModel::create($dataInsert);

        return redirect('admin/article/list')->with('status','Thêm thành công');

    }
    public function edit($id){
        $article=AdminPostModel::all();
        $post=AdminArticleModel::find($id);
        return view('admin/article/edit',compact('post','article'));
    }
    public function update(Request $request,$id){
        $dataInsert=[
            'a_name'=>$request->name,
            'slug'=>str_slug($request->name),
            'a_description'=>$request->a_description,
            'a_content'=>$request->a_content,
            'post_id'=>$request->post_id,

        ];
        $dataUploadStorage=$this->storageTraitUpload($request,'a_images','article');
        if (!empty($dataUploadStorage)){
            $dataInsert['a_images']=$dataUploadStorage['file_path'];
            $dataInsert['image_name']=$dataUploadStorage['file_name'];
        }
        AdminArticleModel::find($id)->update($dataInsert);

        return redirect('admin/article/list')->with('status','Sửa thành công');
    }
    public function delete($id){
        $post=AdminArticleModel::find($id);
        $post->delete();
        return redirect('admin/article/list')->with('status','Xóa thành công');
    }
}
