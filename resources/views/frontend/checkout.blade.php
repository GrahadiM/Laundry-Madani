{{-- Extends layout --}}
@extends('layouts.fe.base')

{{-- Styles --}}
@push('style')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
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
                @guest
                    <h2>Silahkan Login Atau Registerasi Terlebih Dahulu!</h2>
                    <p>Masuk atau buatlah akun agar dapat melanjutkan pesanan</p>
                @else
                    <h2>Pastikan Anda Telah Memilih Paket Yang Benar!</h2>
                    <p>Isi semua kolom formulir untuk melanjutkan ke langkah berikutnya</p>
                @endguest
            </div>
            <div class="client_container">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>{{ $package->category->name . ' - ' . $package->name }}</strong></h2>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" method="POST" action="{{ route('fe.checkout.post') }}">
                                @csrf
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Account</strong></li>
                                    <li id="personal"><strong>Personal</strong></li>
                                    <li id="payment"><strong>Payment</strong></li>
                                    <li id="confirm"><strong>Finish</strong></li>
                                </ul>
                                <!-- fieldsets -->
                                @guest
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Account Information</h2>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('login') }}" class="btn btn-lg btn-success mr-3">Login</a>
                                                <button class="btn btn-lg btn-outline-light text-dark"
                                                    disabled="disabled">OR</button>
                                                <a href="{{ route('register') }}"
                                                    class="btn btn-lg btn-warning ml-3">Register</a>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-lg btn-outline-light text-dark"
                                            disabled="disabled">Next Step</button>
                                    </fieldset>
                                @else
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title">Account Information</h2>
                                            <div class="row justify-content-center mt-5">
                                                <div class="col-7 text-center">
                                                    <h5>Login Berhasil!</h5>
                                                </div>
                                            </div>

                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Next Step" />
                                    </fieldset>
                                @endguest
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Personal Information</h2>
                                        <div class="row">
                                            <input class="col-12" type="hidden" name="package_id"
                                                value="{{ $package->id }}" />
                                            <input class="col-12" type="text" name="name"
                                                value="{{ auth()->user()->name }}" placeholder="Name" required />
                                            <input class="col-12" type="email" name="email"
                                                value="{{ auth()->user()->email }}" placeholder="Email Address" required />
                                            <input class="col-12" type="text" name="phone"
                                                placeholder="WhatsApp atau No.Telp" required />
                                            <input class="col-12" type="text" name="address" placeholder="Alamat" required />
                                            <select class="list-dt col-12" id="order_by" name="order_by" required>
                                                <option selected disabled>Apakah anda memerlukan kurir?</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                    <input type="button" name="next" class="next action-button" value="Next Step" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Payment Information</h2>
                                        <div class="row justify-content-center">
                                            <div class="col-10 text-center">
                                                <h5>Pembayaran setelah pakaian anda selesai ditimbang!</h5>
                                                <h5>Jika anda menggunakan kurir dapat membayar langsung dirumah!</h5>
                                                <h5>Jika anda tidak menggunakan kurir dapat membayar langsung ditoko!</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                    <input type="submit" name="save" class="next action-button" value="Confirm" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Pesanan Anda Gagal Terkirim!</h2>
                                        <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-3">
                                                <img src="https://img.icons8.com/color/96/000000/fail--v2.png"
                                                    class="fit-image">
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5>Silahkan Lengkapi Formulir Sebelumnya</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>
                            </form>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/form.js') }}"></script>
@endpush
