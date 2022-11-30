{{-- Extends layout --}}
@extends('layouts.fe.base')

{{-- Styles --}}
@push('style')
@endpush

{{-- Sub-Page --}}
@section('page')
    class="sub_page"
@endsection

{{-- Content --}}
@section('content')
    <!-- client section -->
    <section class="client_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    What Says Our Client
                </h2>
            </div>
            <div class="client_container">
                <div class="carousel-wrap ">
                    <div class="owl-carousel">
                        <div class="item">
                            <div class="box">
                                <div class="img-box">
                                    <img src="{{ asset('frontend') }}/images/client-1.jpg" alt="" class="img-1">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        Alina Hill
                                    </h5>
                                    <h6>
                                        Magna
                                    </h6>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim Lorem ipsum dolor sit
                                        amet, consectetur adipiscing elit
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box">
                                <div class="img-box">
                                    <img src="{{ asset('frontend') }}/images/client-2.jpg" alt="" class="img-1">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        Fiona MacBeth
                                    </h5>
                                    <h6>
                                        Magna
                                    </h6>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim Lorem ipsum dolor sit
                                        amet, consectetur adipiscing elit
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box">
                                <div class="img-box">
                                    <img src="{{ asset('frontend') }}/images/client-1.jpg" alt="" class="img-1">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        Alina Hill
                                    </h5>
                                    <h6>
                                        Magna
                                    </h6>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim Lorem ipsum dolor sit
                                        amet, consectetur adipiscing elit
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box">
                                <div class="img-box">
                                    <img src="{{ asset('frontend') }}/images/client-2.jpg" alt="" class="img-1">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        Fiona MacBeth
                                    </h5>
                                    <h6>
                                        Magna
                                    </h6>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim Lorem ipsum dolor sit
                                        amet, consectetur adipiscing elit
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end client section -->
@endsection

{{-- Script --}}
@push('app')
@endpush
