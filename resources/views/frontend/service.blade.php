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
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="box b2">
                            <div class="img-box">
                                <img src="{{ asset('frontend') }}/images/s2.png" alt="" class="" />
                            </div>
                            <div class="detail-box">
                                <h5>Silahkan Memilih Paket Sesuai Kebutuhan Anda</h5>
                                <div class="text-left">
                                    <p>
                                        Kami memahami Jakarta adalah kota metropolitan dengan berbagai profesi dan
                                        kesibukan,
                                        Laundry express hokos menyediakan 6 pilihan paket berdasakan waktu yang bias anda
                                        sesuakan dengan kebutuhan anda.
                                    </p>
                                    <div class="mt-2">
                                        <table class="table table-bordered">
                                            <tbody>
                                                @foreach ($service as $item)
                                                <tr>
                                                    <td style="width: 5%; text-align: center;">{{ $loop->iteration }}</td>
                                                    <td style="width: 25%;">
                                                        @guest
                                                        <a href="{{ route('login') }}">
                                                        @else
                                                        <a href="{{ route('fe.service.detail', $item->slug) }}">
                                                        @endguest
                                                            {{ $item->name }}
                                                        </a>
                                                    </td>
                                                    <td style="width: 20%; text-align: center;">{{ $item->price."/".$item->type }}</td>
                                                    <td style="width: 45%;">{!! $item->body !!}</td>
                                                    <td style="width: 5%;">
                                                        <form action="{{ route('fe.post_cart') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="package_id" value="{{ $item->id }}">
                                                            <button class="btn btn-sm btn-outline-primary" type="submit"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
