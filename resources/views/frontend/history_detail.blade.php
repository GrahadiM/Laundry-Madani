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
                <h2>Riwayat Pesanan</h2>
            </div>
            <div class="client_container">
                <div class="card border-dark mb-3">
                    <div class="card-header">Daftar Pakaian</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data['clothes'] as $item)
                                <tr>
                                    <td scope="col">{{ $item->name }}</td>
                                    <td scope="col">{{ $item->qty }}</td>
                                    <td scope="col">{{ $item->detail }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3"><center>Data Kosong!</center></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
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
