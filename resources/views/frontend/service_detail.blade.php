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
    <section class="about_section about_section2 layout_padding">
        <div class="container  ">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="{{ asset('frontend') }}/images/loker.jpeg" alt="loker">
                        {{-- <div class="play_btn">
                        <button>
                            <i class="fa fa-play" aria-hidden="true"></i>
                        </button>
                    </div> --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>{{ $package->category->name }}</h2>
                        </div>
                        <p>Nama : {{ $package->name }}</p>
                        <p>Price : {{ __('Rp.').number_format($package->price,2,',','.') .'/'. $package->qty.$package->type }}</p>
                        <p>Deskripsi : {{ $package->body }}</p>
                        <form action="{{ route('fe.post_cart') }}" method="post">
                            @csrf
                            <input type="hidden" name="package_id" value="{{ $package->id }}">
                            <button class="btn btn-lg btn-outline-primary" type="submit"><i class="fa fa-cart-plus" aria-hidden="true"></i> Tambahkan Ke Keranjang</button>
                        </form>
                        {{-- <a href="{{ route('fe.checkout', $package->slug) }}">Pesan Sekarang</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
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
