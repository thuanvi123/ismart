@extends('admin.layouts.master')
@section('title')
    Thêm mới danh mục
@endsection
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm mới danh mục
            </div>
            <div class="col-md-12">
               <div class="row">
                   <div class="card-body">
                       <form action="{{route('admin.category.update',$categories->id)}}" method="post">
                           @csrf
                           <div class="col-md-8 form-group">
                               <label for="name">Tên danh mục </label>
                               <input class="form-control" type="text" value="{{$categories->name}}" name="name" id="name">
                               <span  class="text-danger"> {{$errors->first('name')}}</span>
                           </div>
                           <div class="col-md-8 form-group">
                               <label for="name">Mô tả </label>
                               <textarea class="content" name="description">{{$categories->description}}</textarea>
                               <span  class="text-danger"> {{$errors->first('description')}}</span>
                           </div>
                           <div class=" col-md-8 form-group">
                               <label for="">Chọn danh mục cha</label>
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