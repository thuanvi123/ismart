@extends('admin.layouts.master')
@section('title')
    Thêm mới menu
@endsection
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm mới menu
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="card-body">
                        <form action="{{route('admin.permission.store')}}" method="post">
                            @csrf
                            <div class=" col-md-12 form-group">
                                <label for="">Chọn module </label>
                                <select name="module_parent" class="form-control" >
                                    <option value="0" >Chọn module</option>
                                       @foreach(config('permission.table_module') as $permissionItem)
                                     <option value="{{$permissionItem}}">{{$permissionItem}}</option>
                                       @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    @foreach(config('permission.module_childrent') as $permissionChildrentItem)
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="{{$permissionChildrentItem}}" name="module_childrent[]">
                                             {{$permissionChildrentItem}}
                                        </label>
                                    </div>
                                     @endforeach
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection