<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $settings = Helper::getSettings();
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta property="og:url" content=""/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Nước Khoáng Vĩnh Hảo, Đích Thực Từ Nguồn Khoáng Thiên Nhiên, Tốt Cho Sức Khỏe"/>
    <meta property="og:description"
          content="Nước Khoáng Vĩnh Hảo, Đích Thực Từ Nguồn Khoáng Thiên Nhiên, Tốt Cho Sức Khỏe"/>

    <meta name="title" content="@yield('meta-title')">
    <meta name="description" content="@yield('meta-description')">
    <meta property="og:image" content="bitrix/templates/vinhhao_140617/img/fb_share.png"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="robots" content="index, follow"/>

    <link href='{{url("css/app.css")}}' type="text/css" rel="stylesheet"/>
    <style>
        .serach-mobile-ios {
            transform: translate(0, -120px) !important;
            -webkit-transform: translate(0, -120px) !important;
            -moz-transform: translate(0, -120px) !important;
            -o-transform: translate(0, -120px) !important;
        }

        .money {
            color: red !important;
            font-weight: bold;
        }
    </style>


</head>

<body class="home blog layout-default">
<div id="panel"></div>
<div class="loading">
    <div class="bottle-w">
        <div class="top"><img src="{{url('/images/site')}}/vh_01.png"></div>
        <div class="bottom animation-full"><img src="{{url('/images/site')}}/vh_02.png"></div>
    </div>
</div>
<div class="overplay-mobile hidden-sm hidden-md hidden-lg"></div>

@include('frontend.partials.sidebar')
<!-- <div id="content-wrapper"> -->
<div id="page-wrapper" class="container-w">
    @include('frontend.partials.header')
    <div class="content-wrapper">
        @yield('content')
    </div>

    @include('frontend.partials.footer')
</div>
<!-- global scripts -->
<script src="{{url('js/jsmain.min.js')}}"></script>
<script src="{{url('js/main.js')}}"></script>
<script src="{{url('js/jquery.fullpage.min.js')}}"></script>
<script type='text/javascript' src='{{url("js/frontend.js")}}'></script>
</body>

</html>
