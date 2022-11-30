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
                    <div class="card-header">Daftar Pesanan</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Paket</th>
                                    <th scope="col">No.Tel</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kurir</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['history'] as $item)
                                <tr>
                                    <td scope="col">{{ $item->code_order }}</td>
                                    <td scope="col">{{ $item->package->name }}</td>
                                    <td scope="col">{{ $item->phone }}</td>
                                    <td scope="col">{{ $item->address }}</td>
                                    <td scope="col">{{ $item->order_by }}</td>
                                    <td scope="col">{{ $item->status }}</td>
                                    <td scope="col">{{  __('Rp.').number_format($item->total,2,',','.') }}</td>
                                    <td scope="col">
                                        <a href="{{ route('fe.history_detail', $item->id) }}" class="btn btn-sm btn-outline-dark">Detail</a>
                                    </td>
                                </tr>
                                @endforeach
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
