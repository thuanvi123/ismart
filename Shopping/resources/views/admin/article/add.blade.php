@extends('admin.layouts.master')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm bài viết
            </div>
            <div class="card-body">
                <form action="{{route('admin.article.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tiêu đề bài viết</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="name">Mô tả ngắn bài viết</label>
                        <input class="form-control" type="text" name="a_description" id="name">
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung bài viết</label>
                        <textarea name="a_content" class="form-control content" id="content" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Avatar:</label><br>
                        <input type="file" multiple name="a_images">
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select class="form-control" id="" name="post_id">
                            <option>Chọn danh mục</option>
                            @foreach($article as $cate)
                                <option value="{{$cate->id}}">{{$cate->c_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
@endsection