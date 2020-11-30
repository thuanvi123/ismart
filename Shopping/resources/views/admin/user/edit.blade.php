@extends('admin.layouts.master')
@section('title')
    Sửa thành thành viên
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".select2_int").select2({
                placeholder: "Chọn vai trò",
                allowClear: true
            });
        })
    </script>
@endsection
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Sửa thành viên
            </div>
            <div class="card-body">
                <form action="{{route('admin.update',$user->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input class="form-control" type="text" name="name" value="{{$user->name}}" id="name">
                        <span  class="text-danger"> {{$errors->first('name')}}</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text"  value="{{$user->email}}" name="email" id="email">
                        <span  class="text-danger"> {{$errors->first('email')}}</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Mật khẩu</label>
                        <input class="form-control" type="password" name="password" id="email">
                        <span  class="text-danger"> {{$errors->first('password')}}</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Nhập lại mật khẩu</label>
                        <input class="form-control" type="password" name="password_confirmation" id="email">
                        <span  class="text-danger"> {{$errors->first('password_confirmation')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="">Chọn quyền</label>
                        <select name="roles[]" class="form-control select2_int" multiple >
                            @foreach($roles as $roleItem)
                                <option {{$listRole->contains($roleItem->id)?'selected':''}}
                                        value="{{$roleItem->id}}">{{$roleItem->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Thay đổi</button>
                </form>
            </div>
        </div>
    </div>
@endsection