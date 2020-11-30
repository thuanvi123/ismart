@extends('layouts.shop')
@section('content')
    <style>
        nav{
            display: block;
            margin-left: 350px;
            margin-top: 100px;
        }
        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: .25rem;
        }
        ul {
            margin-top: 0;
            margin-bottom: 1rem;
        }
        li {
            display: list-item;
            text-align: -webkit-match-parent;
        }
        .page-link {
            position: relative;
            display: block;
            padding: .5rem .75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #007bff;
            background-color: #fff;
            border: 1px solid #dee2e6;
        }
        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
    <div id="main-content-wp" class="clearfix blog-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="{{route('home')}}" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content fl-right">
                <div class="section" id="list-blog-wp">
                    <div class="section-head clearfix">
                        <h3 class="section-title">Blog</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            @foreach($blog as $post)
                                <li class="clearfix">
                                    <a href="{{route('post.detail',['slug'=>$post->slug,'id'=>$post->id])}}" title="" class="thumb fl-left">
                                        <img src="{{asset($post->a_images)}}" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="{{route('post.detail',['slug'=>$post->slug,'id'=>$post->id])}}" title="" class="title">{{$post->a_description}}</a>
                                        <span class="create-date">{{$post->created_at}}</span>
                                        <p class="desc">{!! $post->a_description !!} [...]</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                {{$blog->links()}}
            </div>
            <div class="sidebar fl-left">
                @include('frontend.home.selling_products.index')
                <div class="section" id="banner-wp">
                    <div class="section-detail">
                        <a href="?page=detail_blog_product" title="" class="thumb">
                            <img src="{{asset('font')}}/images/banner.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection