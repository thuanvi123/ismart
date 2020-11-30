@extends('layouts.shop')
@section('content')
    <style>
        article, .bottom {
            display: block;
            overflow: hidden;
            width: 800px;
            margin: auto;
        }
        .titledetail {
            display: block;
            overflow: hidden;
            line-height: 53px;
            font-size: 45px;
            color: #333;
            font-family: 'Roboto Condensed',sans-serif;
            font-weight: 600;
            width: 800px;
            margin: auto;
        }
        .userdetail {
            display: block;
            overflow: hidden;
            margin: 0 10px 0 0;
            padding: 15px 0;
        }
        article .imgwrap {
            position: relative;
            min-height: 100px;
            margin-top: 5px;
            background: #f1f1f1;
        }
        article h2 {
            width: 600px;
            margin: 20px auto;
            font-size: 16px;
            color: #333;
            line-height: 28px;
        }
    </style>
    <article>
        <h1 class="titledetail">{{$post->a_description}}</h1>

        <div class="userdetail">
            <span>{{$post->created_at}}</span>

        </div>
        {!! $post->a_content !!}
    </article>
@endsection