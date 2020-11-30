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
                <form action="{{route('admin.setting.update',$settings->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="col-8">
                        <div class="form-group">
                            <label for="intro">Key config</label>
                            <input class="form-control" type="text" value="{{$settings->config_key}}" name="config_key" id="name">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="intro">Key value</label>
                            <input class="form-control" type="text" value="{{$settings->config_value}}" name="config_value" id="name">
                        </div>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Thay đổi </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

