<?php

namespace App\Http\Controllers\Admin;

use App\CategoryModel;
use App\Component\RecusiveCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    private $htmlOption;

    public function __construct()
    {
        $this->htmlOption = '';

        $this->middleware(function ($request, $next) {
            session(['module_active' => 'product']);
            return $next($request);
        });
    }

    public function index(Request $request)
    {

        $category = '';
        if ($request->input('category')) {
            $category = $request->input('category');
        }
        $categories = CategoryModel::where('name', 'LIKE', "%{$category}%")->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    public function add()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.category.add', compact('htmlOption'));
    }

    public function store(CategoryRequest $request)
    {
        $categories = new CategoryModel();
        $categories->name = $request->name;
        $categories->slug = str_slug($request->name);
        $categories->description = $request->description;
        $categories->parent_id = $request->parent_id;
        $categories->save();
        return redirect('admin/category/list')->with('status', 'Thêm thành công');

    }

    public function getCategory($parentId)
    {
        $data = CategoryModel::all();
        $recusive = new RecusiveCategory($data);
        $htmlOption = $recusive->RecusiveCategory($parentId);
        return $htmlOption;
    }

    public function edit($id)
    {
        $categories = CategoryModel::find($id);
        $htmlOption = $this->getCategory($categories->parent_id);
        return view('admin.category.edit', compact('categories', 'htmlOption'));
    }

    public function update(Request $request, $id)
    {
        $categories = CategoryModel::find($id);
        $categories->name = $request->name;
        $categories->slug = str_slug($request->name);
        $categories->description = $request->description;
        $categories->active = $request->active;
        $categories->parent_id = $request->parent_id;
        $categories->save();
        return redirect('admin/category/list')->with('status', 'Sửa thành công');
    }

    public function action($action,$id)
    {

        if ($action) {

            $category = CategoryModel::find($id);

            switch ($action) {
                case 'delete':
                    $category->delete();
                    break;
                case 'active':
                    $category->c_active= $category->c_active ? 0:1;
                    break;
            }
            $category->save();
        }

        return redirect('admin/category/list');
    }

}
