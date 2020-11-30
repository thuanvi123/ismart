@extends('admin.layouts.master')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách danh mục bài viết</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="text" class="form-control form-search" name="category"
                               value="{{request()->input('category')}}" placeholder="Tìm kiếm">
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
                    <a style="width: 100px" class="btn btn-success" href="{{url('admin/post/add')}}">Thêm</a>
                </div>
                <table class="table table-striped table-checkall">
                    <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>

                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($post as $pos)
                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td>{{$pos->id}}</td>
                            <td>{{$pos->c_name}}</td>
                            <td>{{$pos->c_slug}}</td>
                            <td>{{$pos->created_at->format('d-m-Y')}}</td>
                            <td>
                                <a href="{{route('admin.post.edit',$pos->id)}}" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                   data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>

                                <a href="{{route('admin.get.action.post',$pos->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không')"
                                   class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                   data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$post->links()}}
@endsection