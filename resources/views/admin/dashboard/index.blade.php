{{-- Extends layout --}}
@extends('layouts.adm.base')

{{-- Styles --}}
@push('style')

@endpush

{{-- Content --}}
@section('content')

        <h3 class="mb-3">{{ $title }}</h3>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-primary">
                <div class="inner">
                        <h3>{{ $user }}</h3>
                        <p>Data User</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-address-card"></i>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="small-box-footer">
                        Tampilkan Data <i class="fas fa-arrow-circle-right ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-primary">
                <div class="inner">
                        <h3>{{ $category }}</h3>
                        <p>Data Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <a href="{{ route('admin.categories.index') }}" class="small-box-footer">
                        Tampilkan Data <i class="fas fa-arrow-circle-right ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-primary">
                <div class="inner">
                        <h3>{{ $package }}</h3>
                        <p>Data Paket</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <a href="{{ route('admin.packages.index') }}" class="small-box-footer">
                        Tampilkan Data <i class="fas fa-arrow-circle-right ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                <div class="inner">
                        <h3>{{ $transaction }}</h3>
                        <p>Data Transaksi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <a href="{{ route('admin.transactions.index') }}" class="small-box-footer">
                        Tampilkan Data <i class="fas fa-arrow-circle-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

@endsection

{{-- Script --}}
@push('app')

@endpush
