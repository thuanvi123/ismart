@extends('layouts.shop')
@section('css')
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div id="main-content-wp" class="clearfix category-product-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Điện thoại</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content fl-right">
                <div class="section" id="list-product-wp">
                    <div class="section-head clearfix">
                        <h3 class="section-title fl-left">Laptop</h3>
                        <div class="filter-wp fl-right">
                            <label class="desc">Sắp xếp</label>
                            <div class="form-filter">
                                <form id="form_order" method="get" action="">
                                    <select name="orderby" class="orderby">
                                        <option {{Request::get('orderby')=="md"||!Request::get('orderby')?"selected='selected'":""}}value="md">Mặc định</option>
                                        <option {{Request::get('orderby')=="desc"?"selected='selected'":""}}value="desc">Mới nhất</option>
                                        <option {{Request::get('orderby')=="asc"?"selected='selected'":""}}value="asc">Sản phẩm cũ</option>
                                        <option {{Request::get('orderby')=="price_max"?"selected='selected'":""}}value="price_max">Giá tăng dần</option>
                                        <option {{Request::get('orderby')=="price_min"?"selected='selected'":""}}value="price_min">Giá giảm dần</option>
                                    </select>
                                    <button type="submit">Lọc</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            @foreach($result as $product)
                                <li>
                                    <a href="?page=detail_product" title="" class="thumb">
                                        <img style="height: 140px" src="{{asset($product->feature_image)}}">
                                    </a>
                                    <a href="?page=detail_product" title="" class="product-name">{{$product->name}}</a>
                                    <div class="price">
                                        <span class="new">{{number_format($product->price)}}đ</span>
                                        {{--                                        <span class="old">20.900.000đ</span>--}}
                                    </div>
                                    <div class="action clearfix">
                                        <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ
                                            hàng</a>
                                        <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                {{$result->links()}}
            </div>
            @include('frontend.partial.sidebar')
        </div>
    </div>
    <script>
        $(function () {
            $(".orderby").change(function () {
                $("#form_order").submit();
            })
        })
    </script>
@endsection
@section('js')

@endsection