<style>
    @media print {
        .noPrint{
            display:none;
        }
    }
    .body {
        margin: 0;
        padding-top: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #invoice {
        width: 600px;
        padding: 50px;
        background-color: #FFFFFF;
        border: 5px solid;
        border-style: dashed;

    }
</style>

<body>
    <button onclick="location.href='{{ route('fe.history') }}';" class="noPrint">Riwayat</button>
    <button onclick="window.print();" class="noPrint">Print PDF</button>
    <div class="body">
        <div id="invoice" class="center">
            <div class="card">
                <div class="card-body mx-4">
                    <div class="container">
                        <p class="my-5 mx-5" style="font-size: 30px;">Terimakasih atas pesanan anda</p>
                        <div class="row">
                            <ul class="list-unstyled">
                                <li class="text-black" style="text-transform: uppercase;">{{ $transaksi->status }}</li>
                                <li class="text-muted mt-1"><span class="text-black">Invoice</span> #{{ $transaksi->code_order }}</li>
                                <li class="text-black mt-1">{{ $transaksi->created_at }}</li>
                            </ul>
                            <hr>
                            <div class="col-xl-10">
                                <p><b><u>Informasi Pribadi</u></b></p>
                            </div>
                            <div class="col-xl-2">
                                <p class="float-end">Nama : {{ $transaksi->customer->name }}</p>
                                <p class="float-end">WhatsApp: {{ "+62".$transaksi->phone }}</p>
                                <p class="float-end">Alamat : {{ $transaksi->address }}</p>
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-xl-10">
                                <p>Penggunaan Jasa</p>
                            </div>
                            <div class="col-xl-2">
                                <p class="float-end">Kurir : {{ $transaksi->order_by }}</p>
                                <p class="float-end">Tanggal Penjemputan : {{ $transaksi->tgl_penjemputan }}</p>
                                <p class="float-end">Tanggal Pengantaran : {{ $transaksi->tgl_pengantaran }}</p>
                            </div>
                        </div>
                        <hr style="border: 2px solid black;">
                        <div class="row text-black">
                            <div class="col-xl-12">
                                <p class="float-end fw-bold">Total : {{ __('Rp.').number_format($transaksi->total,2,',','.') }}</p>
                            </div>
                            <hr style="border: 2px solid black;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
