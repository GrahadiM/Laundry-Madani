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
                <h2>Halaman Keranjang</h2>
            </div>
            <div class="service_container">
                <div class="mt-5 mb-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <td style="width: 5%;">Hapus</td>
                                <td style="width: 40%;">Nama Paket</td>
                                <td style="width: 10%;">Jumlah</td>
                                <td style="width: 20%;">Harga</td>
                                <td style="width: 15%;">Update</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $v => $item)
                            <tr>
                                {{-- <td style="width: 5%;">{{ $loop->iteration }}</td> --}}
                                <td>
                                    <form action="{{ route('fe.delete_cart', $item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit" onClick="return confirm('Apakah anda ingin menghapus produk ini?')">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $item->package->name }}</td>
                                <td class="text-center">{{ $item->qty }}</td>
                                <td class="text-right">{{ __('Rp.').number_format($item->package->price,2,',','.') .'/'. $item->package->qty.$item->package->type }}</td>
                                <td>
                                    <form action="{{ route('fe.update_cart', $item->id) }}" method="POST" class="quantity">
                                        @method('PUT')
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control  form-control-sm" id="qty" step="0.01" min="0.01" name="qty" value="{{ $item->qty }}">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Belum ada pesanan! silahkan memesan terlebih dahulu!
                                        <a href="{{ route('fe.service') }}">Lihat Paket</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <td class="font-weight-bold">Total</td>
                                <td class="font-weight-bold" colspan="3">{{ __('Rp.').number_format($total,2,',','.') }}</td>
                                <td>
                                    <a href="{{ route('fe.checkout') }}" class="btn btn-sm btn-outline-success">Bayar?</a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
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

@endsection

{{-- Script --}}
@push('app')
@endpush
