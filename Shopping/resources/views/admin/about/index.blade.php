@extends('admin.layouts.master')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách bài viết</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="text" class="form-control form-search" name="category" value="{{request()->input('category')}}" placeholder="Tìm kiếm">
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
                    <a style="width: 100px" class="btn btn-success" href="{{url('admin/about/add')}}" >Thêm</a>
                </div>
                <table class="table table-striped table-checkall">
                    <thead>
                    <tr>
                        <th scope="col">#</th>

                        <th scope="col">Tên trang</th>
                        <th scope="col">Mô tả ngắn </th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($abouts as $about)
                        <tr>
                            <td >{{$about->id}}</td>
                            <td >{{$about->name}}</td>
                            <td>{{$about->description}}</td>
                            <td>{{$about->created_at->format('d-m-y')}}</td>
                            <td>
                                <a href="{{route('admin.about.edit',$about->id)}}" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>

                                <a href="{{route('admin.get.action.about',$about->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không')" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection