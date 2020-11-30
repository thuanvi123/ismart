<?php

namespace App\Http\Controllers\Admin;

use App\Component\MenuRecusive;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\MenuModel;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $htmlOption;

    public function __construct()
    {
        $this->htmlOption='';

        $this->middleware(function ($request, $next) {
            session(['module_active' => 'menu']);
            return $next($request);
        });
    }

    public function index(Request $request)
    {

        $menu='';
        if ($request->input('menu')){
            $menu=$request->input('menu');
        }
        $menus=MenuModel::where('name','LIKE',"%$menu%")->paginate(5);
        return view('admin.menu.index', compact('menus'));
    }

    public function add()
    {
        $htmlOption=$this->getCategory(0);
        return view('admin.menu.add',compact('htmlOption'));
    }
    public function store(MenuRequest $request){
        $menus=new MenuModel();
        $menus->name=$request->name;
        $menus->slug=str_slug($request->name);
        $menus->parent_id=$request->parent_id;
        $menus->save();
        return redirect('admin/menu/list')->with('status','Thêm thành công');
    }
    public function edit($id){
        $menus=MenuModel::find($id);
        $htmlOption=$this->getCategory($menus->parent_id);
        return view('admin.menu.edit',compact('menus','htmlOption'));
    }
    public function update(Request $request,$id){
        $menus=MenuModel::find($id);
        $menus->name=$request->name;
        $menus->slug=str_slug($request->name);
        $menus->parent_id=$request->parent_id;
        $menus->save();
        return redirect('admin/menu/list')->with('status','Sửa thành công');
    }
    public function delete($id){
        $menus=MenuModel::find($id);
        $menus->delete();
        return redirect('admin/menu/list')->with('status','Xóa thành công');
    }

    public function getCategory($parentId)
    {
        $data = MenuModel::all();
        $recusive=new MenuRecusive($data);
        $htmlOption=$recusive->getMenurecusive($parentId);
        return $htmlOption;
    }
}
