@extends('layouts.shop')
@section('content')
    <div id="main-content-wp" class="clearfix detail-product-page">
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
                <div class="section" id="detail-product-wp">
                    <div class="section-detail clearfix">
                        <div class="thumb-wp fl-left">
                            <a href="" title="" id="main-thumb">
                                <img style="height: 250px" id="zoom" src="{{asset($productDetail->feature_image)}}"/>
                            </a>
                            <div id="list-thumb">
                                @foreach($productDetail->productImages as $key=> $producti)
                                    <a style="height: 70px" href="" data-image="{{asset($producti->image)}} " data-zoom-image="{{asset($producti->image)}}">
                                        <img style="height: 70px" id="zoom"
                                             src="{{asset($producti->image)}}"/>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="thumb-respon-wp fl-left">
                            <img src="public/images/img-pro-01.png" alt="">
                        </div>
                        <div class="info fl-right">
                            <h3 class="product-name">{{$productDetail->name}}</h3>
                            <div class="desc">
                                {!! $productDetail->description !!}
                            </div>
                            <div class="num-product">
                                <span class="title">Sản phẩm: </span>
                                @if($productDetail->total>0)
                                    <span class="status">Còn hàng</span>
                                @endif
                            </div>
                            <p class="price">{{number_format($productDetail->price,0,',','.')}}đ</p>
                            <div id="num-order-wp">
                                <span>Số lượng :</span>
                                <a title="" id="minus"><i class="fa fa-minus"></i></a>
                                <input type="text" name="num-order" value="1" id="num-order">
                                <a title="" id="plus"><i class="fa fa-plus"></i></a>
                            </div>
                            <a href="{{route('cart.add',$productDetail->id)}}" title="Thêm giỏ hàng" class="add-cart">Thêm
                                giỏ hàng</a>
                        </div>
                    </div>
                </div>
                <div class="section" id="post-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Mô tả sản phẩm</h3>
                    </div>
                    <div class="section-detail">
                        {!! $productDetail->content !!}
                    </div>
                </div>
                @foreach($categories as $category)
                    @if($category->id==$productDetail->cat_id)
                        <div class="section" id="list-product-wp">
                            <div class="section-head">
                                <h3 class="section-title">Cùng chuyên mục</h3>
                            </div>
                            <div class="section-detail">
                                <ul class="list-item clearfix">

                                    @foreach($category->products as $productItem)
                                        <li>
                                            <a href="{{route('product.detail',[$productItem->slug,$productItem->id])}}" title="" class="thumb">
                                                <img style="height:140px" src="{{asset($productItem->feature_image)}}">
                                            </a>
                                            <a href="?page=detail_product" title="" class="product-name">{{$productItem->name}}</a>
                                            <div class="price">
                                                <span class="new">{{number_format($productItem->price,0,'.','.')}}đ</span>
                                            </div>
                                            <div class="action clearfix">
                                                <a href="#" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm
                                                    giỏ
                                                    hàng</a>
                                                <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua
                                                    ngay</a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="sidebar fl-left">
                <div class="section" id="category-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Danh mục sản phẩm</h3>
                    </div>
                    <div class="secion-detail">
                        <ul class="list-item">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{route('category',['slug'=>$category->slug,'id'=>$category->id])}}"
                                       title="">{{$category->name}}</a>
                                    @include('frontend.partial.menu_childrent',['category'=>$category])
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="section" id="banner-wp">
                    <div class="section-detail">
                        <a href="" title="" class="thumb">
                            <img src="{{asset('font')}}/images/banner.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection