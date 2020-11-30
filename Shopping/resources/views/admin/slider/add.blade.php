@extends('admin.layouts.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('title')
    Sản phẩm
@endsection
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm sản phẩm
            </div>
            <div class="card-body">
                <form action="{{route('admin.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="col-12">
                        <div class="form-group">
                            <label for="intro">Tên slider</label>
                            <input class="form-control" value="{{old('name')}}" type="text" name="name" id="name">
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="intro">Mô tả sản phẩm</label>
                            <textarea name="description" class="form-control content" id="intro" cols="30" rows="5">{{old('description')}}</textarea>
                            <span class="text-danger">{{$errors->first('description')}}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Avatar:</label><br>
                            <input type="file" multiple name="slider_images">
                        </div>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>

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

