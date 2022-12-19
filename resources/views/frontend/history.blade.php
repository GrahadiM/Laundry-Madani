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
                                @forelse ($data['history'] as $item)
                                <tr>
                                    <td scope="col">{{ $item->code_order }}</td>
                                    <td scope="col">{{ $item->package->name }}</td>
                                    <td scope="col">{{ $item->phone }}</td>
                                    <td scope="col">{{ $item->address }}</td>
                                    <td scope="col">{{ $item->order_by }}</td>
                                    <td scope="col">
                                        {{-- {{ $item->status }} --}}
                                        @if ($item->status == 'Pending')
                                            <h5><span class="badge badge-pill badge-secondary">{{ $item->status }}</span></h5>
                                        @elseif ($item->status == 'Proses')
                                            <h5><span class="badge badge-pill badge-warning">{{ $item->status }}</span></h5>
                                        @elseif ($item->status == 'Success')
                                            <h5><span class="badge badge-pill badge-succes">{{ $item->status }}</span></h5>
                                        @else
                                            <h5><span class="badge badge-pill badge-danger">{{ $item->status }}</span></h5>
                                        @endif
                                    </td>
                                    {{-- <td scope="col">{{  __('Rp.').number_format($item->total,2,',','.') }}</td> --}}
                                    <td scope="col">{{ __('Rp.').number_format($item->package->price,2,',','.').'/'.$item->package->qty.$item->package->type }}</td>
                                    <td scope="col">
                                        <a href="{{ route('fe.history_detail', $item->id) }}" class="btn btn-sm btn-outline-dark">Detail</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8"><center>Data Kosong!</center></td>
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
