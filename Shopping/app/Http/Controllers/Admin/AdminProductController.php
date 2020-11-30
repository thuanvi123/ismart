<?php

namespace App\Http\Controllers\Admin;

use App\CategoryModel;
use App\Component\RecusiveCategory;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProductRequest;
use App\ProductImageModel;
use App\ProductModel;
use App\TagModel;
use App\Traits\TraitsStorageImages;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminProductController extends Controller

{
    use TraitsStorageImages;

    private $htmlOption;

    public function __construct()
    {
        $this->htmlOption='';
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'product']);
            return $next($request);
        });
    }
    public function index(Request $request){
        $search='';
        if ($request->input('product_search')){
            $search=$request->input('product_search') ;
        }
        $products=ProductModel::where('name','LIKE',"%$search%")->first()->paginate(5);

        return view('admin.product.index',compact('products'));
    }
    public function add(){
        $htmlOption=$this->getCategory($parentId='');
        return view('admin.product.add',compact('htmlOption'));
    }
    public function getCategory($parentId){
        $data=CategoryModel::all();
        $recusive=new RecusiveCategory($data);
        $htmlOption=$recusive->RecusiveCategory($parentId);
        return $htmlOption;
    }
    public function store(Request $request){

        try{
            DB::beginTransaction();
            $dataInsert=[
                'name'=>$request->name,
                'code'=>$request->code,
                'slug'=>str_slug($request->name),
                'price'=>$request->price,
                'total'=>$request->total,
                'description'=>$request->description,
                'content'=>$request->contens,
                'cat_id'  =>$request->cat_id,
                'user_id'=>auth()->id()
            ];

            $dataUploadStorage=$this->storageTraitUpload($request,'feature_image','product');
            if (!empty($dataUploadStorage)){
                $dataInsert['feature_image_name']=$dataUploadStorage['file_name'];
                $dataInsert['feature_image']     =$dataUploadStorage['file_path'];
            }


            $product=ProductModel::create($dataInsert);

            //thêm dữ liệu bảng producImage

            if($request->hasFile('image')){
                foreach ($request->image as $fileItem){
                    $dataUploadDetail=$this->storageTraitUploadMutiple($fileItem,'product');
                    $product->detailProductImages()->create([
                        'image'=>$dataUploadDetail['file_path'],
                        'image_name'=>$dataUploadDetail['file_name'],
                    ]);
                }
            }



            //Thêm dữ liệu tag
                foreach ($request->tags as $tagItem){
                    $tagIntance=TagModel::firstOrCreate(['name'=>$tagItem]);
                    $tagIds[]=$tagIntance->id;
                }
            $product->tag()->attach($tagIds);
            DB::commit();
            return redirect('admin/product/list')->with('status','Thêm thành công ');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line '.$exception->getLine());
        }
    }
    public function edit($id){
        $products=ProductModel::find($id);

        $htmlOption=$this->getCategory($products->cat_id);
        return view('admin.product.edit',compact('products','htmlOption'));
    }
    public function update(Request $request,$id){
        try{
            DB::beginTransaction();
            $dataUpdate=[
                'name'=>$request->name,
                'code'=>$request->code,
                'slug'=>str_slug($request->name),
                'price'=>$request->price,
                'total'=>$request->total,
                'description'=>$request->description,
                'content'=>$request->contens,
                'cat_id'  =>$request->cat_id,
                'user_id'=>auth()->id()
            ];
            $dataUploadStorage=$this->storageTraitUpload($request,'feature_image','product');
            if (!empty($dataUploadStorage)){
                $dataUpdate['feature_image_name']=$dataUploadStorage['file_name'];
                $dataUpdate['feature_image']     =$dataUploadStorage['file_path'];
            }
            ProductModel::find($id)->update($dataUpdate);
            $product=ProductModel::find($id);
            //thêm dữ liệu bảng producImage
            if($request->hasFile('image')){
                ProductImageModel::where('product_id',$id)->delete();
                foreach ($request->image as $fileItem){
                    $dataUploadDetail=$this->storageTraitUploadMutiple($fileItem,'product');
                    $product->detailProductImages()->create([
                        'image'=>$dataUploadDetail['file_path'],
                        'image_name'=>$dataUploadDetail['file_name'],
                    ]);
                }
            }
            //Thêm dữ liệu tag
            if (!empty($request->tags)){
                foreach ($request->tags as $tagItem){
                    $tagInstance=TagModel::firstOrCreate(['name'=>$tagItem]);
                    $tagIds[]=$tagInstance->id;
                }
            }
            $product->tag()->sync($tagIds);

            DB::commit();
            return redirect('admin/product/list')->with('status','Thêm thành công ');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line '.$exception->getLine());
        }

    }
    public function delete($id){
        $product=ProductModel::find($id);
        $product->delete();

        return redirect('admin/product/list')->with('status','Xóa thành công');
    }
}
