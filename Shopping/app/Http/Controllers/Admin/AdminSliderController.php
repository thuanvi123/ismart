<?php

namespace App\Http\Controllers\Admin;

use App\AdminSliderModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Http\Request;
use App\Traits\TraitsStorageImages;

class AdminSliderController extends Controller
{
    private $slider;
    use TraitsStorageImages;
    public function __construct(AdminSliderModel $slider)
    {
        $this->slider=$slider;
        $this->middleware(function ($request,$next){
            session(['module_active'=>'slider']);
            return $next($request);
        });
    }
    public function index(){
        $sliders=AdminSliderModel::paginate(6);

        return view('admin.slider.index',compact('sliders'));
    }
    public function add(){
        return view('admin.slider.add');
    }
    public function store(SliderRequest $request){

        $dataInsert=[
            'name'=>$request->name,
            'description'=>$request->description,

        ];
        $dataUploadStorage=$this->storageTraitUpload($request,'slider_images','slider');
        if (!empty($dataUploadStorage)){
            $dataInsert['slider_images']=$dataUploadStorage['file_path'];
            $dataInsert['image_name']=$dataUploadStorage['file_name'];
        }

        AdminSliderModel::create($dataInsert);

        return redirect('admin/slider/list')->with('status','Thêm thành công');
    }
    public function edit($id){
        $sliders=AdminSliderModel::find($id);
        return view('admin.slider.edit',compact('sliders'));
    }
    public function update(Request $request,$id){
        $dataUpdate=[
            'name'=>$request->name,
            'description'=>$request->description,

        ];
        $dataUploadStorage=$this->storageTraitUpload($request,'slider_images','slider');
        if (!empty($dataUploadStorage)){
            $dataUpdate['slider_images']=$dataUploadStorage['file_path'];
            $dataUpdate['image_name']=$dataUploadStorage['file_name'];
        }
        AdminSliderModel::find($id)->update($dataUpdate);

        return redirect('admin/slider/list')->with('status','Sửa  thành công');
    }
    public function delete($id){
        $sliders=AdminSliderModel::find($id);
        $sliders->delete();
        return redirect('admin/slider/list')->with('status','Xóa  thành công');
    }

}
