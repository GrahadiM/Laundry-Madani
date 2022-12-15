<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>{{ \Setting::getSetting()->title_web }}</title>

    @include('layouts.fe.css')
    @stack('style')

</head>
<body @yield('page')>

    <div class="hero_area">
        <div class="hero_bg_box">
            <img src="{{ asset('frontend') }}/images/slider-bg.jpg" alt="">
        </div>
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                @include('layouts.fe.navbar')
            </div>
        </header>
        <!-- end header section -->
        <!-- slider section -->
        @yield('banner')
        <!-- end slider section -->
    </div>

    @yield('content')

    <!-- footer section -->
    @include('layouts.fe.footer')
    <!-- footer section -->

    @include('layouts.fe.js')
    @stack('app')

</body>
</html>
