@extends('layouts.adm.base')
@section('title', trans('menu.transaction.title'))

@push('style')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@endpush

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ trans('menu.transaction.title') }}</h3>
            {{-- <div class="card-tools">
                <a href="{{ route('pegawai.transactions.create') }}" class="btn btn-success btn-sm">{{ trans('global.add')." ".trans('menu.transaction.title') }}</a>
            </div> --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Customer</th>
                        <th>Total Harga</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>{{ trans('global.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $dt)
                    <tr>
                        <td>{{ $dt->code_order }}</td>
                        <td>{{ $dt->customer->name }}</td>
                        <td>{{ __('Rp.').number_format($dt->total,2,',','.') }}</td>
                        <td>{{ $dt->address }}</td>
                        <td>
                            @if ($dt->status == 'Pending')
                                <a href="{{ route('pegawai.transactions.status', $dt->id) }}" class="btn btn-secondary">{{ $dt->status }}</a>
                            @elseif ($dt->status == 'Proses')
                                <a href="{{ route('pegawai.transactions.status', $dt->id) }}" class="btn btn-warning">{{ $dt->status }}</a>
                            @elseif ($dt->status == 'Success')
                                <a href="{{ route('pegawai.transactions.status', $dt->id) }}" class="btn btn-success">{{ $dt->status }}</a>
                            @else
                                <a href="{{ route('pegawai.transactions.status', $dt->id) }}" class="btn btn-danger">{{ $dt->status }}</a>
                            @endif
                        </td>
                        <td>{{ $dt->updated_at ? $dt->updated_at : $dt->created_at }}</td>
                        <td class="text-center">
                            <form action="{{ route('pegawai.transactions.destroy', $dt->id) }}" class="row" method="POST">
                                @method('DELETE')
                                @csrf
                                <div class="col-md-3">
                                    <a class="btn btn-info btn-sm" href="{{ route('pegawai.transactions.show', $dt->id) }}">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a class="btn btn-primary btn-sm" href="{{ route('pegawai.clothes.show', $dt->id) }}">
                                        <i class="fas fa-clipboard-list"></i>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    @if ($dt->status == 'Pending' || $dt->status == 'Proses')
                                    <a class="btn btn-success btn-sm" href="https://wa.me/+62{{ $dt->phone }}?text=Saya%20kurir%20dari%20laundry%20madani,%20ingin%20menjemput%20pakaian%20anda" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    @elseif ($dt->status == 'Success')
                                    <a class="btn btn-success btn-sm" href="https://wa.me/+62{{ $dt->phone }}?text=Saya%20kurir%20dari%20laundry%20madani,%20ingin%20mengantar%20pakaian%20anda" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    @endif
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('scripts')

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        "buttons": ["csv"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
    </script>

@endpush
