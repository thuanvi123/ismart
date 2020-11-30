@extends('admin.layouts.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('title')
   Sủa sản phẩm
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".tag_product").select2({
                tags: true,
                tokenSeparators: [',']
            });
            $(".select2_int").select2({
                placeholder: "Chọn danh mục",
                allowClear: true
            });
        })
    </script>
@endsection
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm sản phẩm
            </div>
            <div class="card-body">
                <form action="{{route('admin.product.update',$products->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input class="form-control" type="text" value="{{$products->name}}" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="name">Code</label>
                                <input class="form-control" type="text" value="{{$products->code}}" name="code" id="name">
                            </div>
                            <div class="form-group">
                                <label for="name">Giá</label>
                                <input class="form-control" type="text" value="{{$products->price}}" name="price" id="name">
                            </div>
                            <div class="form-group">
                                <label for="name">Số lượng</label>
                                <input class="form-control" type="number" value="{{$products->total}}"   min="0" name="total" id="name">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="intro">Mô tả sản phẩm</label>
                                <textarea name="description" class="form-control content"  id="intro" cols="30" rows="5">{{$products->description}}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="intro">Avatar:</label><br>
                               <input type="file" multiple name="feature_image">
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <img style="width: 180px" src="{{asset($products->feature_image)}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="intro">ảnh chi tiết:</label><br>
                                <input type="file" multiple name="image[]">
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    @foreach($products->productImage as $productImage)
                                        <div class="col-3">
                                            <img style="width: 180px;padding-left: 5px" src="{{asset($productImage->image)}}" alt="">
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="intro">Tag</label>
                                <select name="tags[]" class="form-control tag_product" multiple="multiple">
                                    @foreach($products->tag as $tagItem)
                                        <option value="{{$tagItem->id}}" selected>{{$tagItem->name}}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="intro">Chi tiết sản phẩm</label>
                        <textarea name="contens" class="form-control content" id="intro" cols="30" rows="5">{{$products->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="cat_id" class="form-control select2_int" id="">
                            <option value="0">Chọn danh mục</option>
                                   {!! $htmlOption !!}
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>

{{--<script>  $('#lfm').filemanager('image');</script>--}}
{{--   <script>--}}
{{--       var route_prefix = "http://localhost/Shopping/filemanager";--}}
{{--       $('#lfm').filemanager('image', {prefix: route_prefix});--}}
{{--   </script>--}}
@endsection

