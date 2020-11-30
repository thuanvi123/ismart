@extends('admin.layouts.master')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm trang
            </div>
            <div class="card-body">
                <form action="{{route('admin.about.update',$about->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tiêu đề trang</label>
                        <input class="form-control" value="{{$about->name}}" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="name">Mô tả ngắn trang</label>
                        <input class="form-control" type="text" value="{{$about->description}}" name="a_description" id="name">
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung trang</label>
                        <textarea name="a_content" class="form-control content" id="content" cols="30" rows="5">{{$about->a_content}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Thay đổi</button>
                </form>
            </div>
        </div>
    </div>
@endsection