@extends('admin.layouts.master')
@section('title')
    Sửa mới menu
@endsection
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Sửa mới menu
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="card-body">
                        <form action="{{route('admin.menu.update',$menus->id)}}" method="post">
                            @csrf
                            <div class="col-md-8 form-group">
                                <label for="name">Tên menu </label>
                                <input class="form-control" type="text" name="name" value="{{$menus->name}}" id="name">
                                <span  class="text-danger"> {{$errors->first('name')}}</span>
                            </div>
                            <div class=" col-md-8 form-group">
                                <label for="">Chọn menu cha</label>
                                <select name="parent_id" class="form-control" >
                                    <option value="0" >Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection