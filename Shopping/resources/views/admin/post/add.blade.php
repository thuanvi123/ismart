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
                       <form action="{{route('admin.post.store')}}" method="post">
                           @csrf
                           <div class="col-md-8 form-group">
                               <label for="name">Tên danh mục </label>
                               <input class="form-control" type="text" name="name" id="name" >
                               <span  class="text-danger"> {{$errors->first('name')}}</span>
                           </div>
                           <button type="submit" class="btn btn-primary">Thêm mới</button>
                       </form>
                   </div>
               </div>
            </div>

        </div>
    </div>
@endsection