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
                <h2>Riwayat Pesanan (Code : {{ $data['dt']->code_order }})</h2>
                <p>Daftar Pakaian</p>
            </div>
            <div class="client_container">
                <div class="card border-dark mb-3">
                    <div class="card-header">
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Kembali</a>
                        <a href="{{ route('fe.clothes', $data['dt']->id) }}" class="btn btn-success btn-sm">{{ trans('global.add')." ".trans('menu.clothes.title') }}</a>
                    </div>
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
