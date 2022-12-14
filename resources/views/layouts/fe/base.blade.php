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

    <!-- info section -->
    <section class="info_section layout_padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3 info-col">
                    <div class="info_detail">
                        <h4>Moto Kami</h4>
                        <p>{{ \Setting::getSetting()->desc_footer }}</p>
                        {{-- <div class="info_social">
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-4 col-lg-6  info-col">
                    <div class="map_container">
                        <div class="map">
                            <div id="googleMap"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 info-col">
                <div class="info_contact">
                    <h4>Kontak</h4>
                    <div class="contact_link_box">
                        <p>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>{{ \Setting::getSetting()->address }}</span>
                        </p>
                        <a href="https://api.whatsapp.com/send?phone={{ \Setting::getSetting()->wa }}" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>Call {{ \Setting::getSetting()->wa }}</span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>{{ \Setting::getSetting()->mail }}</span>
                        </a>
                        <p>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>{{ \Setting::getSetting()->working_hours }}</span>
                        </p>
                        {{-- <p>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>Sunday: closed</span>
                        </p> --}}
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end info section -->

    <!-- footer section -->
    @include('layouts.fe.footer')
    <!-- footer section -->

    @include('layouts.fe.js')
    @stack('app')

</body>
</html>
