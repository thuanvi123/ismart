@extends('layouts.shop')
@section('content')
    <div id="main-content-wp" class="clearfix detail-blog-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="{{route('home')}}" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Giới thiệu</a>
                        </li>
                    </ul>
                </div>
            </div>
            @foreach($abouts as $abou)
            <div class="main-content fl-right">
                <div class="section" id="detail-blog-wp">
                    <div class="section-head clearfix">
                        <h3 class="section-title">{{$abou->name}}</h3>
                    </div>
                    <div class="section-detail">
                        <span class="create-date">{{$abou->created_at}}</span>
                        <div class="detail">
                            <p><strong>{{$abou->description}}</strong></p>
                            {!! $abou->a_content  !!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="sidebar fl-left">
              @include('frontend.home.selling_products.index')
                <div class="section" id="banner-wp">
                    <div class="section-detail">
                        <a href="?page=detail_product" title="" class="thumb">
                            <img src="{{asset('fonts')}}/images/banner.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
