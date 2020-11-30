@extends('admin.layouts.master')
@section('title')
    Danh sách slider
@endsection
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách slider</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="" class="form-control form-search" name="product_search" value="{{request()->input('product_search')}}" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-danger">
                    {{session('status')}}
                </div>
            @endif
            <div class="card-body">
                <div class="form-action form-inline py-3">
                    <a style="width: 100px" class="btn btn-success" href="{{url('admin/slider/add')}}" >Thêm</a>
                </div>
                <table class="table table-striped table-checkall">
                    <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Tên slider</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $temp=0;
                    ?>
                    @foreach($sliders as $slider)
                        <?php
                                $temp++;
                        ?>
                    <tr class="">
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>{{$temp}}</td>
                        <td>{{$slider->name}}</td>
                        <td><img style="width: 150px" src="{{asset($slider->slider_images)}}" alt=""></td>
                        <td>{!! $slider->description !!}</td>
                        <td>{{$slider->created_at}}</td>
                        <td>
                            <a href="{{url('admin/slider/edit',$slider->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{url('admin/slider/delete',$slider->id)}}" onclick="return confirm('Bạn chắc chắn muốn xóa không ')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection