@extends('admin.layouts.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('title')
   Sửa slider
@endsection
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm sản phẩm
            </div>
            <div class="card-body">
                <form action="{{route('admin.slider.update',$sliders->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="col-12">
                        <div class="form-group">
                            <label for="intro">Tên slider</label>
                            <input class="form-control" type="text" value="{{$sliders->name}}" name="name" id="name">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="intro">Mô tả sản phẩm</label>
                            <textarea name="description" class="form-control content" id="intro" cols="30" rows="5">{{$sliders->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="intro">Avatar:</label><br>
                            <input type="file" multiple name="slider_images">
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <img style="width: 180px" src="{{asset($sliders->slider_images)}}" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Thay đổi</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

