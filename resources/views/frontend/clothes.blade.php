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
                <p>{{ trans('global.add') . ' ' . trans('menu.clothes.title') }}</p>
            </div>
            <div class="client_container">
                <div class="card border-dark mb-3">
                    <div class="card-header">
                        <a href="{{ route('fe.history_detail', $data['dt']->id) }}" class="btn btn-danger btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('fe.clothes.post') }}" method="POST">
                            @csrf
                            <input type="hidden" name="transaction_id" value="{{ $data['dt']->id }}">
                            <div class="form-group">
                                <div class="font-weight-bold mb-2">Name :</div>
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <div class="font-weight-bold mb-2">Jumlah :</div>
                                <input type="number" min="1" class="form-control" name="qty" value="1" required>
                            </div>
                            <div class="form-group">
                                <div class="font-weight-bold mb-2">Detail :</div>
                                <input type="text" class="form-control" name="detail" placeholder="Detail" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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
