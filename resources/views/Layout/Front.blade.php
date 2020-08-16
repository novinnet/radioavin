<!doctype html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
     <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title' , env('APP_NAME'))</title>
    <link rel="stylesheet" href="{{asset('frontend/assets/bootstrap-4.5.0-dist/css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/bootstrap-4.5.0-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/swiper/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/fontawesome-free-5.13.1-web/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/style.css')}}">
</head>


<body 
@if (\Request::route()->getName() == "login" || \Request::route()->getName() == "S.Register" 
     )
    style="background: #fff"
    @endif
>
    @include('Includes.Front.Header')
    @yield('main')
    @include('Includes.Front.Footer')

    @include('Includes.Front.MobileMenu')
</body>
<script src="{{asset('frontend/assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('frontend/assets/bootstrap-4.5.0-dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/swiper/swiper.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-validate/jquery.validate.js')}}"></script>
<script src="{{asset('frontend/assets/Generic-Mobile-friendly-Slider-Plugin-with-jQuery-touchSlider/jquery.touchSlider.js')}}"></script>
<script src="{{asset('frontend/assets/js/index.js')}}"></script>
@yield('js')
</html>