@extends('frontend.index')
@section('content')
    @php
        $baseURL='http://localhost/Shopping/public';
    @endphp
    <style>
    </style>
    <div id="main-content-wp" class="home-page clearfix">
        <div class="wp-inner">
            <div class="main-content fl-right">
                <div class="section" id="slider-wp">
                    <div class="section-detail">
                        @foreach($sliders as $slider)
                            <div class="item">
                                <img src="{{$baseURL.$slider->slider_images}}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="section" id="support-wp">
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('font/images/icon-1.png')}}">
                                </div>
                                <h3 class="title">Miễn phí vận chuyển</h3>
                                <p class="desc">Tới tận tay khách hàng</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('font/images/icon-2.png')}}">
                                </div>
                                <h3 class="title">Tư vấn 24/7</h3>
                                <p class="desc">1900.9999</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('font/images/icon-3.png')}}">
                                </div>
                                <h3 class="title">Tiết kiệm hơn</h3>
                                <p class="desc">Với nhiều ưu đãi cực lớn</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('font/images/icon-4.png')}}">
                                </div>
                                <h3 class="title">Thanh toán nhanh</h3>
                                <p class="desc">Hỗ trợ nhiều hình thức</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('font/images/icon-5.png')}}">
                                </div>
                                <h3 class="title">Đặt hàng online</h3>
                                <p class="desc">Thao tác đơn giản</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="section" id="feature-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm nổi bật</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            @foreach($products as $product)
                                <li style="height: 350px" >
                                    @if($product->total==0)
                                    <span style="position: absolute;background: #e91e63;
                                    color: white;padding: 2px 6px;border-radius: 5px;font-size: 10px">Tạm hết hàng</span>
                                    @endif
                                    <a href="{{route('product.detail',[$product->slug,$product->id])}}" title="" class="thumb">
                                        <img style="height:140px" src="{{asset($product->feature_image)}}">
                                    </a>
                                    <a href="{{route('product.detail',[$product->slug,$product->id])}}" title="" class="product-name">{{$product->name}}</a>
                                    <div class="price">
                                        <span class="new">{{number_format($product->price)}}đ</span>
                                    </div>
                                    <div style="margin-top: 30px" class="action clearfix">
                                        <a id="cart_ajax" href="{{route('cart.add',$product->id)}}"
                                           title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="" title="" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @foreach($categories as $category)
                    @if($category->c_active==1)
                        <div class="section" id="list-product-wp">
                            <div class="section-head">
                                <h3 class="section-title">{{$category->name}}</h3>
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
                                                <span class="new">6.990.000đđ</span>
                                                <span class="old">8.990.000đđ</span>
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
                @include('frontend.partial.menu')
                @include('frontend.home.selling_products.index')
                <div class="section" id="banner-wp">
                    <div class="section-detail">
                        <a href="" title="" class="thumb">
                            <img src="{{asset('font/images/banner.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

