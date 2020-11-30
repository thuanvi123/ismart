<?php
$module_active=session('module_active')
?>
<div id="sidebar" class="bg-white">
    <ul id="sidebar-menu">
        <li class="nav-link {{$module_active=='dashboard'?'active':''}}">
            <a href="{{url('dashboard')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Trang chủ
            </a>
            <i class="arrow fas fa-angle-right"></i>
        </li>
        <li class="nav-link  {{$module_active=='about' ?'active':''}}">
            <a href="{{url('admin/about/list')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Trang
            </a>
            <i class="arrow fas fa-angle-right"></i>

            <ul class="sub-menu">
                <li><a href="{{url('admin/about/add')}}">Thêm mới</a></li>
                <li><a href="{{url('admin/about/list')}}">Danh sách</a></li>
            </ul>
        </li>
        <li class="nav-link {{$module_active=='post' ?'active':''}}">
            <a href="{{url('admin/article/list')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Bài viết
            </a>
            <i class="arrow fas fa-angle-right"></i>
            <ul class="sub-menu">
                <li><a href="{{url('admin/article/add')}}">Thêm mới</a></li>
                <li><a href="{{url('admin/article/list')}}">Danh sách</a></li>
                <li><a href="{{url('admin/post/list')}}">Danh mục</a></li>
            </ul>
        </li>
        <li class="nav-link {{$module_active=='product' ?'active':''}} ">
            <a href="{{url('admin/product/list')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Sản phẩm
            </a>
            <i class="arrow fas fa-angle-down"></i>
            <ul class="sub-menu">
                <li><a href="{{url('admin/product/add')}}">Thêm mới</a></li>
                <li><a href="{{url('admin/product/list')}}">Danh sách</a></li>
                <li><a href="{{url('admin/category/list')}}">Danh mục</a></li>
            </ul>
        </li>
        <li class="nav-link {{$module_active=='menu'?'active':''}}">
            <a href="{{url('admin/menu/list')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Menu
            </a>
            <i class="arrow fas fa-angle-right"></i>
        </li>
        <li class="nav-link {{$module_active=='setting'?'active':''}}">
            <a href="{{url('admin/setting/list')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Setting
            </a>
            <i class="arrow fas fa-angle-right"></i>
        </li>
        <li class="nav-link {{$module_active=='slider'?'active':''}}">
            <a href="{{url('admin/slider/list')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Slider
            </a>
            <i class="arrow fas fa-angle-right"></i>
        </li>
        <li class="nav-link {{$module_active=='order'?'active':''}}">
            <a href="{{url('admin/order/list')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Bán hàng
            </a>
            <i class="arrow fas fa-angle-right"></i>
            <ul class="sub-menu">
                <li><a href="{{url('admin/order/list')}}">Đơn hàng</a></li>
            </ul>
        </li>
        <li class="nav-link {{$module_active=='user'?'active':''}}">
            <a href="{{url('admin/user/list')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Users
            </a>
            <i class="arrow fas fa-angle-right"></i>

            <ul class="sub-menu">
                <li><a href="{{url('admin/user/add')}}">Thêm mới</a></li>
                <li><a href="{{url('admin/user/list')}}">Danh sách</a></li>
            </ul>
        </li>
        <li class="nav-link {{$module_active=='roles'?'active':''}}">
            <a href="{{url('admin/roles/list')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Danh sách vai trò(Roles)
            </a>
            <i class="arrow fas fa-angle-right"></i>

            <ul class="sub-menu">
                <li><a href="{{url('admin/roles/add')}}">Thêm mới</a></li>
                <li><a href="{{url('admin/roles/list')}}">Danh sách</a></li>
            </ul>
        </li>
        <li class="nav-link {{$module_active=='roles'?'active':''}}">
            <a href="{{url('admin/permission/add')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Tạo dữ liệu cho quyền
            </a>
        </li>

    </ul>
</div>