@extends('admin.layouts.master')
@section('title')
    Thêm  vai trò
@endsection
@section('content')
    <style>
        .border-primary {
            border-color: #d7f3e3!important;
        }
    </style>

    <div  class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm vai trò
            </div>
            <div class="card-body">
                <form action="{{route('admin.roles.update',$roles->id)}}" method="post">
                    @csrf
                    <div class="col-12">
                        <div class="row form-group">
                            <label for="intro">Tên vai trò</label>
                            <input class="form-control" value="{{$roles->name}}" type="text" name="name" id="name">
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row form-group">
                            <label for="intro">Mô tả vai trò</label>
                            <textarea name="display_name" class="form-control "  id="intro" cols="30" rows="5">{{$roles->display_name}}</textarea>
                            <span class="text-danger">{{$errors->first('display_name')}}</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row checka">
                            <div class="col-12">
                                <label>
                                    <input type="checkbox" class="checkall">
                                    Checkall
                                </label>
                            </div>
                            @foreach($permission as $permissionItem)
                                <div class="card_thuan border-primary mb-3 col-md-12" >
                                    <div class="card-header">
                                        <label >
                                            <input class="checkboxall" type="checkbox" value="">
                                        </label>
                                        Module {{$permissionItem->name}}
                                    </div>
                                    <div class="row">
                                        @foreach($permissionItem->permissionChidrent as $permissionChidrentItem)
                                            <div class="card-body text-primary col-md-3">
                                                <h6 class="card-title">
                                                    <label>
                                                        <input type="checkbox" name="permission_id[]"
                                                               class="checkbox_childrent"
                                                               {{$permissionChecked->contains('id',$permissionChidrentItem->id) ? 'checked':''}}
                                                               value="{{$permissionChidrentItem->id}}">
                                                        {{$permissionChidrentItem->name}}
                                                    </label>
                                                </h6>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('role/add.js')}}"></script>
@endsection
