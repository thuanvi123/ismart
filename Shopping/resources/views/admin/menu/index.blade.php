@extends('admin.layouts.master')
@section('title')
    Danh sách menu
@endsection
@section('content')

    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách menu</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="text" class="form-control form-search" name="menu" value="{{request()->input('menu')}}" placeholder="Tìm kiếm">
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
                    <a style="width: 100px" class="btn btn-success" href="{{url('admin/menu/add')}}" >Thêm</a>
                </div>
                <table class="table table-striped table-checkall">
                    <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>

                        <th scope="col">Tên menu</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $temp=0;
                    ?>
                    @foreach($menus as $menu)
                        <?php
                        $temp++;
                        ?>
                    <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td >{{$temp}}</td>
                        <td >{{$menu->name}}</td>
                        <td>{{$menu->slug}}</td>
                        <td>{{$menu->created_at}}</td>
                        <td>
                            <a href="{{url('admin/menu/edit',$menu->id)}}" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{url('admin/menu/delete',$menu->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không')" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$menus->links()}}
            </div>
        </div>
    </div>
@endsection