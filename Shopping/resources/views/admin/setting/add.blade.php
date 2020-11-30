@extends('admin.layouts.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('title')
    Setting
@endsection
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm setting
            </div>
            <div class="card-body">
                <form action="{{route('admin.setting.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="col-8">
                        <div class="form-group">
                            <label for="intro">Key config</label>
                            <input class="form-control" type="text" name="config_key" id="name">
                            <span class="text-danger">{{$errors->first('config_key')}}</span>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="intro">Value config</label>
                            <input class="form-control" type="text" name="config_value" id="name">
                            <span class="text-danger">{{$errors->first('config_value')}}</span>
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

