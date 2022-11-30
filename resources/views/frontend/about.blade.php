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
    <!-- about section -->
    <section class="about_section about_section1 layout_padding">
        <div class="container  ">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>Tentang Laundry Madani</h2>
                        </div>
                        <p>
                            Berdiri sejak tahun 2010, lebih dikenal sejak awal dengan nama Laundry Madani 24 jam, atau
                            Laundry M24, Kami telah melayani banyak pelanggan dalam memberikan layanan jasa kebersihan
                            laundry untuk produk seperti pakaian sehari-hari, pakaian dinas, sepatu, helm, karpet, keset,
                            boneka, kebaya, ulos, dan berbagai macam bahan yang telah Kami terima.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about_section about_section1">
        <div class="container  ">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="img-box">
                        <img src="{{ asset('frontend') }}/images/about-img.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>VISI</h2>
                        </div>
                        <p>
                        <ol>
                            <li>Layanan siagar 24 Jam sesuai tuntutan kebutuhan masyarakat masa kini.</li>
                            <li>Melayani Pick Up & Delivery (ongkir Maks 2 KM, kami hanya beroperasi pada jam 10 AM - 8 PM).</li>
                            <li>Menyediakan pilihan 6 Paket Waktu (3,6,12 Jam & 1,2,3 Hari) dengan penyelesaian tepat waktu
                                (ontime).</li>
                            <li>Meyediakan pilihan menu layanan degan harga dan hasil yang berbeda.</li>
                        </ol>
                        </p>
                        <div class="heading_container">
                            <h2>MISI</h2>
                        </div>
                        <p>
                            Menjadi laundry yang keratif dan up to date yang dikelolah secara professional dengan memadukan
                            kemajuan teknologi, sehingga memberikan keuntungan maksimal untuk Pelanggan, Pegawai, dan
                            Pemilik.

                            Sekarang semuanya menjadi serba praktis. Anda tidak perlu repot-repot mencuci, mengeringkan, dan
                            menyetrika pakaian Anda sendiri. Anda juga tidak perlu keluar rumah untuk menggotong-gotong
                            pakaian Anda. Anda cukup menghubungi kami, maka kami langsung datang ke rumah Anda untuk
                            menjemput pakaian Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->

    <!-- about section -->
    <section class="about_section about_section2 layout_padding">
        <div class="container  ">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>Tentang Layanan Laundry Madani 24 Jam</h2>
                        </div>
                        <p>
                            Penyedia layanan jasa laundry kini semakin ramai, hampir di setiap tempat, saat ini sangat mudah
                            sekali menemukan layanan jasa laundry, bahkan hampir di setiap daerah, bahkan perumahan tersedia
                            layanan jasa laundry, namun bagaimana dengan Laundry Express 24 jam?
                            <br>
                            Laundry Express 24 Jam, terbilang masih sangat sedikit sekali yang menyediakan layanan tersebut,
                            terlebih lagi dengan hitungan pengerjaan yang sangat kilat, 3 jam, 6 jam, dan 12 jam.
                            <br>
                            Kami menyadari betul, masih banyak keluarga yang mengamali kesulitan terkait pakaian kotor yang
                            bertabrakan dengan kebutuhan acara mereka, berapa banyak keluarga, terlebih lagi mereka yang
                            bermalam di hotel, yang dalam perjalanan dinas, sering sekali ditemukan masalah terkait pakaian
                            kotor yang sebenarnya mereka butuhkan untuk dipakai untuk beberapa acara dalam waktu dekat.
                            <br>
                            Laundry Madani hadir untuk menjawab masalah tersebut, Kami memberikan solusi
                            laundry dengan berbagai pilihan paket kilat, yang dapat mengatasi masalah Anda terkait pakaian
                            kotor yang mungkin saja akan Anda pakai beberapa jam lagi.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="img-box">
                        <img src="{{ asset('frontend') }}/images/about-img2.jpg" alt="">
                        {{-- <div class="play_btn">
                            <button>
                                <i class="fa fa-play" aria-hidden="true"></i>
                            </button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->
@endsection

{{-- Script --}}
@push('app')
@endpush
