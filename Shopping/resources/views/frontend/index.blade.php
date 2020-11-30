<!DOCTYPE html>
<html>
@include('frontend.partial.head')
<body>
<div id="site">
    <div id="container">
        <!--header-->
       @include('frontend.partial.header')
        <!--endheader-->
        @yield('content')
        @include('frontend.partial.footer')
    </div>
</div>
