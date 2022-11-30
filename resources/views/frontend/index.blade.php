{{-- Extends layout --}}
@extends('layouts.fe.base')

{{-- Styles --}}
@push('style')
@endpush

{{-- Banner --}}
@section('banner')
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="container">
                <div class="carousel_btn_box">
                    <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="detail-box">
                                    <h1>KAMI MENYEDIAKAN <br> JASA LAUNDRY</h1>
                                    <p>
                                        Penyedia layanan jasa laundry kini semakin ramai, hampir di setiap tempat, saat ini
                                        sangat mudah sekali menemukan layanan jasa laundry, bahkan hampir di setiap daerah,
                                        bahkan perumahan tersedia layanan jasa laundry, namun bagaimana dengan Laundry
                                        Madani 24 jam?
                                        Laundry Madani 24 Jam, terbilang masih sangat sedikit sekali yang menyediakan
                                        layanan tersebut, terlebih lagi dengan hitungan pengerjaan yang sangat kilat, 3 jam,
                                        6 jam, dan 12 jam.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{ asset('frontend') }}/images/slider-img.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="detail-box">
                                    <h1>KAMI MENYEDIAKAN <br> JASA LAUNDRY</h1>
                                    <p>
                                        Penyedia layanan jasa laundry kini semakin ramai, hampir di setiap tempat, saat ini
                                        sangat mudah sekali menemukan layanan jasa laundry, bahkan hampir di setiap daerah,
                                        bahkan perumahan tersedia layanan jasa laundry, namun bagaimana dengan Laundry
                                        Madani 24 jam?
                                        Laundry Madani 24 Jam, terbilang masih sangat sedikit sekali yang menyediakan
                                        layanan tersebut, terlebih lagi dengan hitungan pengerjaan yang sangat kilat, 3 jam,
                                        6 jam, dan 12 jam.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{ asset('frontend') }}/images/slider-img.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="detail-box">
                                    <h1>KAMI MENYEDIAKAN <br> JASA LAUNDRY</h1>
                                    <p>
                                        Penyedia layanan jasa laundry kini semakin ramai, hampir di setiap tempat, saat ini
                                        sangat mudah sekali menemukan layanan jasa laundry, bahkan hampir di setiap daerah,
                                        bahkan perumahan tersedia layanan jasa laundry, namun bagaimana dengan Laundry
                                        Madani 24 jam?
                                        Laundry Madani 24 Jam, terbilang masih sangat sedikit sekali yang menyediakan
                                        layanan tersebut, terlebih lagi dengan hitungan pengerjaan yang sangat kilat, 3 jam,
                                        6 jam, dan 12 jam.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{ asset('frontend') }}/images/slider-img.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- Content --}}
@section('content')
    <!-- service section -->
    <section class="service_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Kami Siap Membersihkan Pakaian Anda</h2>
                <p class="text-uppercase">
                    Moto Kami "PEKERJAANMU ADALAH IBADAHMU BAGIAN DARI IMANMU", karena "Sesungguhnya Allah mencintai
                    kebersihan (keindahan)".
                </p>
            </div>
            <div class="service_container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box b1">
                            <div class="img-box">
                                <img src="{{ asset('frontend') }}/images/s1.png" alt="" class="" />
                            </div>
                            <div class="detail-box">
                                <h5>Paket Lengkap</h5>
                                <div class="text-left">
                                    <p>
                                        Cuci, Kering, Setrika
                                    </p>
                                    <ol>
                                        <li>Deep Cleaning / Dry Cleaning di hanger</li>
                                        <li>Deep Cleaning (dilipat I ps/1 pack pakai karton punggung)</li>
                                        <li>Kiloan Premium</li>
                                        <li>KK 20 ( Bed cover dan Sejenisnya)</li>
                                        <li>KK 25 ( Karpet dan Sejenisnya)</li>
                                        <li>KK 50 (Spotting Noda)</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box b2">
                            <div class="img-box">
                                <img src="{{ asset('frontend') }}/images/s2.png" alt="" class="" />
                            </div>
                            <div class="detail-box">
                                <h5>Paket Pilih Waktu</h5>
                                <div class="text-left">
                                    <p>
                                        Kami memahami Jakarta adalah kota metropolitan dengan berbagai profesi dan
                                        kesibukan,
                                        Laundry express hokos menyediakan 6 pilihan paket berdasakan waktu yang bias anda
                                        sesuakan dengan kebutuhan anda.
                                    </p>
                                    <div class="mt-2">
                                        <p>
                                            <strong>6 Paket berdasarkan Pilihan waktu</strong>
                                        </p>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 50%; text-align: center;">3 Jam</td>
                                                    <td style="width: 50%; text-align: center;">1 Hari</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 50%; text-align: center;">6 Jam</td>
                                                    <td style="width: 50%; text-align: center;">2 Hari</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 50%; text-align: center;">12 Jam</td>
                                                    <td style="width: 50%; text-align: center;">3 Hari</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box b3">
                            <div class="img-box">
                                <img src="{{ asset('frontend') }}/images/s3.png" alt="" class="" />
                            </div>
                            <div class="detail-box">
                                <h5>Paket Setrika Aja</h5>
                                <div class="text-left">
                                    <ol>
                                        <li>Deep Cleaning / Dry Cleaning di hanger</li>
                                        <li>Deep Cleaning (dilipat I ps/1 pack pakai karton punggung)</li>
                                        <li>Kiloan Premium</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="btn-box">
                <a href="">
                    Read More
                </a>
            </div> --}}
        </div>
    </section>
    <!-- end service section -->

    <!-- about section -->
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
                            <h2>Dapatkan Pengalaman Baru Dalam Mencuci Pakaian Anda</h2>
                        </div>
                        <p>
                            Moto Kami PEKERJAANMU ADALAH IBADAHMU BAGIAN DARI IMANMU.
                            <br>
                            Artinya Imanmu terlihat dan ternilai dari apa yg kamu kerjakan.
                            <br>
                            Berpegang teguh dengan moto Kami, Lakukan pekerjaanmu dengan tulus dan iklas sepenuh hati. Jiwai
                            dan cintai, syukuri pekerjaanmu. Kami berusahaan semaksimal mungkin dalam memberikan pelayanan
                            terbaik Kami untuk seluruh pelanggan.
                        </p>
                        <a href="{{ route('fe.about') }}">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->

    <!-- why section -->
    <section class="why_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Laundry Madani Berbeda Dari Yang Lainnya</h2>
                <p>
                    Apakah Anda sering mengalami pakaian Anda tertukar saat menggunakan jasa laundry? pakaian kurang
                    bersih, dan masih meninggalkan noda? pakaian masih terasa bau apek? setrikaan yang kurang rapi? dan
                    pakaian kesayangan Anda luntur dan rusak?
                    Hilangkan semua keraguan Anda, di Laundry Express Hokos, semua keraguan Anda Kami jamin tidak akan
                    terjadi, dan Kami juga memberikan garansi untuk pakaian Anda, sehingga Anda tidak perlu lagi khawatir.
                </p>
            </div>
            <div class="why_container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box b1">
                            <div class="detail-box">
                                <h5>Gratis Pick Up & Delivery</h5>
                                <p>
                                    Untuk Anda yang berjarak maksimal 2 KM dari tempat Kami, Kami berikan GATIS Pick Up &
                                    Delivery, Anda tidak perlu khawatir lagi bila Anda memiliki acara dan pakaian Anda
                                    ternyata belum bersih, langsung saja hubungi
                                    <a href="https://api.whatsapp.com/send?phone={{ \Setting::getSetting()->wa }}"
                                        target="_blank" rel="noopener noreferrer" class="text-capitalize text-danger">
                                        call center
                                    </a>.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box b2">
                            <div class="detail-box">
                                <h5>Proses Pengerjaan Kilat</h5>
                                <p>
                                    Salah satu yang menjadi keunggulan dan kebanggan Kami adalah proses pengerjaan kilat,
                                    hanya dalam waktu 3 jam*, pakaian Anda Kami antarkan dalam keadaan bersih, rapih, dan
                                    wangi, Anda tidak perlu lagi cemas bila pakaian Anda kotor padahal Anda ada acara
                                    penting.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box b3">
                            <div class="detail-box">
                                <h5>Cuci Segala Jenis</h5>
                                <p>
                                    Di Laundry Express Hokos, Kami bukan saja menerima laundry berupa pakaian, tetapi Kami
                                    juga menerima layanan kebersihan seperti Karpet, Helm, Jas, Boneka, Sepatu, Keset,
                                    Sprei, Sepatu Gunung, Bendera, Kebaya, Ulos, dan masih banyak lagi segala macam jenis
                                    cucian yang bisa Kami kerjakan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end why section -->

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
                            layanan jasa laundry, namun bagaimana dengan Laundry Madani 24 jam?
                            <br>
                            Laundry Madani 24 Jam, terbilang masih sangat sedikit sekali yang menyediakan layanan tersebut,
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
