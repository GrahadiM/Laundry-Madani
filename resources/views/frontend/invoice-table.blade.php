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
                <h2>Halaman Invoice</h2>
            </div>
            <div class="service_container">
                <div class="mt-5 mb-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <td>Kode Order</td>
                                <td>Nama Customer</td>
                                <td>WhatsApp</td>
                                <td>Alamat</td>
                                <td>Kurir</td>
                                <td>Status</td>
                                <td>Total</td>
                                <td>Tanggal Penjemputan</td>
                                <td>Tanggal Pengantaran</td>
                                <td>Tanggal Pemesanan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $transaksi->code_order }}</td>
                                <td>{{ $transaksi->customer->name }}</td>
                                <td>{{ $transaksi->phone }}</td>
                                <td>{{ $transaksi->address }}</td>
                                <td>{{ $transaksi->order_by }}</td>
                                <td>{{ $transaksi->status }}</td>
                                <td>{{ __('Rp.').number_format($transaksi->total,2,',','.') }}</td>
                                <td>{{ $transaksi->tgl_penjemputan }}</td>
                                <td>{{ $transaksi->tgl_pengantaran }}</td>
                                <td>{{ $transaksi->created_at }}</td>
                            </tr>
                        </tbody>
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
