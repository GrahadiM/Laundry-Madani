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
    <!-- service section -->
    <section class="service_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Kami Siap Membersihkan Pakaian Anda</h2>
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
                                        @foreach ($data['service1'] as $item)
                                            <li>
                                                @guest
                                                <a href="{{ route('login') }}">{{ $item->name }}</a>
                                                @else
                                                <a href="{{ route('fe.service.detail', $item->id) }}">{{ $item->name }}</a>
                                                @endguest
                                            </li>
                                        @endforeach
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
                                                    <td style="width: 50%; text-align: center;">
                                                        <a href="{{ url('service/3-jam') }}" class="list-group-item list-group-item-secondary" rel="noopener noreferrer">
                                                            3 Jam
                                                        </a>
                                                    </td>
                                                    <td style="width: 50%; text-align: center;">
                                                        <a href="{{ url('service/1-hari') }}" class="list-group-item list-group-item-secondary" rel="noopener noreferrer">
                                                            1 Hari
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 50%; text-align: center;">
                                                        <a href="{{ url('service/6-jam') }}" class="list-group-item list-group-item-secondary" rel="noopener noreferrer">
                                                            6 Jam
                                                        </a>
                                                    </td>
                                                    <td style="width: 50%; text-align: center;">
                                                        <a href="{{ url('service/2-hari') }}" class="list-group-item list-group-item-secondary" rel="noopener noreferrer">
                                                            2 Hari
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 50%; text-align: center;">
                                                        <a href="{{ url('service/12-jam') }}" class="list-group-item list-group-item-secondary" rel="noopener noreferrer">
                                                            12 Jam
                                                        </a>
                                                    </td>
                                                    <td style="width: 50%; text-align: center;">
                                                        <a href="{{ url('service/3-hari') }}" class="list-group-item list-group-item-secondary" rel="noopener noreferrer">
                                                            3 Hari
                                                        </a>
                                                    </td>
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
                                        @foreach ($data['service3'] as $item)
                                            <li>
                                                @guest
                                                <a href="{{ route('login') }}">{{ $item->name }}</a>
                                                @else
                                                <a href="{{ route('fe.service.detail', $item->id) }}">{{ $item->name }}</a>
                                                @endguest
                                            </li>
                                        @endforeach
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
                                        rel="noopener noreferrer" class="text-capitalize text-danger">
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
@endsection

{{-- Script --}}
@push('app')
@endpush
