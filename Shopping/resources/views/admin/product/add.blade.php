@extends('admin.layouts.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('title')
    Sản phẩm
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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
                <form action="{{route('admin.product.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input class="form-control" type="text" name="name" value="{{old('name')}}" id="name">
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            </div>
                            <div class="form-group">
                                <label for="name">Code</label>
                                <input class="form-control" type="text" value="{{old('code')}}" name="code" id="name">
                                <span class="text-danger">{{$errors->first('code')}}</span>
                            </div>
                            <div class="form-group">
                                <label for="name">Giá</label>
                                <input class="form-control" value="{{old('price')}}" type="text" name="price" id="name">
                                <span class="text-danger">{{$errors->first('price')}}</span>
                            </div>
                            <div class="form-group">
                                <label for="name">Số lượng</label>
                                <input class="form-control" value="{{old('total')}}" type="number" min="0" name="total"
                                       id="name">
                                <span class="text-danger">{{$errors->first('total')}}</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="intro">Mô tả sản phẩm</label>
                                <textarea name="description" class="form-control content" id="intro" cols="30"
                                          rows="5">{{old('description')}}</textarea>
                                <span class="text-danger">{{$errors->first('description')}}</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="intro">Avatar:</label><br>
                                <input type="file" multiple name="feature_image"><br>
                                <span class="text-danger">{{$errors->first('feature_image')}}</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="intro">ảnh chi tiết:</label><br>
                                <input type="file" multiple name="image[]"><br>
                                <span class="text-danger">{{$errors->first('image')}}</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="intro">Tag</label>
                                <select name="tags[]" class="form-control tag_product" multiple="multiple">
                                </select>
                                <span class="text-danger">{{$errors->first('tags')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="intro">Chi tiết sản phẩm</label>
                        <textarea name="contens" class="form-control content" id="intro" cols="30"
                                  rows="5">{{old('contens')}}</textarea>
                        <span class="text-danger">{{$errors->first('contens')}}</span>
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="cat_id" class="form-control select2_int" id="">
                            <option value="">Chọn danh mục</option>
                            {!! $htmlOption !!}
                        </select>
                        <span class="text-danger">{{$errors->first('cat_id')}}</span>
                    </div>

                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>

    <script>  $('#lfm').filemanager('image');</script>
    <script>
        var route_prefix = "http://localhost:8080/Imart.vn/filemanager";
        $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>
@endsection

