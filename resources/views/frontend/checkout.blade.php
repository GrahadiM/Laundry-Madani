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
                <h2>Halaman Pembayaran</h2>
            </div>
            <div class="service_container">
                <div class="mt-5 mb-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <td style="width: 5%;">No</td>
                                <td style="width: 40%;">Nama Paket</td>
                                <td style="width: 20%;">Harga</td>
                                <td style="width: 10%;">Jumlah</td>
                                <td style="width: 15%;">Total Harga</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $v => $item)
                            <tr>
                                {{-- <td style="width: 5%;">{{ $loop->iteration }}</td> --}}
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->package->name }}</td>
                                <td class="text-right">{{ __('Rp.').number_format($item->package->price,2,',','.') .'/'. $item->package->qty.$item->package->type }}</td>
                                <td class="text-center">{{ $item->qty }}</td>
                                <td class="text-right">
                                    {{ __('Rp.').number_format($cost,2,',','.') }}
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
                                <td class="font-weight-bold text-left" colspan="4">Total</td>
                                <td class="font-weight-bold text-right">{{ __('Rp.').number_format($total,2,',','.') }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold" colspan="5">
                                    <h2 class="text-center mt-4"><u>Silahkan sesuaikan alamat dan nomer whatsapp anda pada formulir dibawah ini!</u></h2>
                                    <form action="{{ route('fe.post_checkout') }}" method="POST" class="mt-5" enctype="multipart/form-data">
                                        @csrf

                                        <input required type="hidden" name="total" value="{{ Auth::user()->hasRole('customer') ? $total : 0 }}">
                                        <input required type="hidden" name="status" value="{{ Auth::user()->hasRole('customer') ? 'Pending' : 'Proses' }}">
                                        {{-- <input required type="hidden" name="order_by" value="{{ Auth::user()->hasRole('customer') ? 'Ya' : 'Tidak' }}"> --}}
                                        <div class="form-group row">
                                            <label for="kurir" class="col-sm-2 col-form-label">Kurir</label>
                                            <div class="col-sm-10">
                                                <select name="order_by" id="kurir" class="form-control">
                                                    <option value="ya" selected>Apakah Anda Ingin Menggunakan Kurir?</option>
                                                    <option value="ya">Ya</option>
                                                    <option value="tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <label for="bukti_tf" class="col-sm-2 col-form-label">Bukti Pembayaran</label>
                                            <div class="col-sm-10">
                                                <input required type="file" class="form-control" name="bukti_tf" id="bukti_tf">
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-2 col-form-label">Nomer WhatsApp</label>
                                            <div class="col-sm-10">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">+62</span>
                                                    </div>
                                                    <input required type="text" class="form-control" name="phone" id="phone" value="{{ auth()->user()->phone }}" placeholder="85767113554">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <input required type="text" class="form-control" name="address" id="address" value="{{ auth()->user()->address }}" placeholder="Jalan Suka Karya No. 90, Tuah Karya, Kecamatan Tampan, Kota Pekanbaru, Riau">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_penjemputan" class="col-sm-2 col-form-label">Tanggal Penjemputan Pakaian Kotor</label>
                                            <div class="col-sm-10">
                                                <input required type="datetime-local" class="form-control datetime-local" name="tgl_penjemputan" id="tgl_penjemputan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_pengantaran" class="col-sm-2 col-form-label">Tanggal Pengantaran Pakaian Bersih</label>
                                            <div class="col-sm-10">
                                                <input required type="datetime-local" class="form-control datetime-local" name="tgl_pengantaran" id="tgl_pengantaran">
                                            </div>
                                        </div>
                                        <div class="form-group d-flex justify-content-end">
                                            @if ($total == 0)
                                                <button type="submit" class="btn btn-sm btn-primary" disabled>Lanjutkan Transaksi?</button>
                                            @else
                                                <button type="submit" class="btn btn-sm btn-primary">Lanjutkan Transaksi?</button>
                                            @endif
                                        </div>
                                    </form>
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

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <script src="https://momentjs.com/downloads/moment-timezone-with-data-10-year-range.min.js"></script>
    <!-- <script>
        $(document).ready(function(){
            var d = new Date().toISOString();
            d = moment.tz(d, "Asia/Jakarta").format();
            var minDate = d.substring(0, 11) + "00:00";
            console.log(minDate);
            $(".datetimepicker").attr({
                "value" : minDate,
                "min" : minDate,
            });
        });
    </script> -->
    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        //
        var hh = today.getHours();
        var m = today.getMinutes();

        if (dd < 10)
        {
            dd = '0' + dd;
        }

        if (mm < 10)
        {
            mm = '0' + mm;
        }

        today_min = `${yyyy}-${mm}-${dd}T00:00`;

        //or Year-Month-Day
        document.getElementById("tgl_penjemputan").setAttribute("min", today_min);
        document.getElementById("tgl_penjemputan").setAttribute("value", today_min);
    </script>
    <script>
        var today = new Date();
        var dd = today.getDate() + 1;
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        //
        var hh = today.getHours();
        var m = today.getMinutes();

        if (dd < 10)
        {
            dd = '0' + dd;
        }

        if (mm < 10)
        {
            mm = '0' + mm;
        }

        today_min = `${yyyy}-${mm}-${dd}T00:00`;

        //or Year-Month-Day
        document.getElementById("tgl_pengantaran").setAttribute("min", today_min);
        document.getElementById("tgl_pengantaran").setAttribute("value", today_min);
    </script>

@endpush
