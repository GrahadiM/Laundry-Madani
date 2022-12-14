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
                <a href="{{ route('admin.transactions.create') }}" class="btn btn-success btn-sm">{{ trans('global.add')." ".trans('menu.transaction.title') }}</a>
            </div> --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Customer</th>
                        <th>Category & Package</th>
                        <th>Price/Qty</th>
                        <th>Cost</th>
                        <th>Order By</th>
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
                        <td>{{ $dt->package->category->name.' - '.$dt->package->name }}</td>
                        <td>{{ __('Rp.').number_format($dt->package->price,2,',','.').'/'.$dt->package->qty.$dt->package->type }}</td>
                        <td>{{ __('Rp.').number_format($dt->cost,2,',','.') }}</td>
                        <td>{{ $dt->order_by }}</td>
                        <td>
                            @if ($dt->status == 'Pending')
                                <button type="button" class="btn btn-secondary">{{ $dt->status }}</button>
                            @elseif ($dt->status == 'Proses')
                                <button type="button" class="btn btn-warning">{{ $dt->status }}</button>
                            @elseif ($dt->status == 'Success')
                                <button type="button" class="btn btn-succes">{{ $dt->status }}</button>
                            @else
                                <button type="button" class="btn btn-danger">{{ $dt->status }}</button>
                            @endif
                        </td>
                        <td>{{ $dt->updated_at ? Carbon\Carbon::parse($dt->updated_at)->diffForHumans() : Carbon\Carbon::parse($dt->created_at)->diffForHumans() }}</td>
                        <td class="text-center">
                            <div class="row">
                                <div class="col-md-3">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.transactions.show', $dt->id) }}">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    {{-- <a class="btn btn-success btn-sm" href="{{ route('admin.clothes.show', $dt->id) }}">
                                        <i class="fas fa-clipboard-list"></i>
                                    </a> --}}
                                    <form action="{{ route('admin.clothes.show', $dt->id) }}" method="GET">
                                        <button class="btn btn-success btn-sm" type="submit">
                                            <i class="fas fa-clipboard-list"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.transactions.edit', $dt->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <form action="{{ route('admin.transactions.destroy', $dt->id) }}" class="row" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Code</th>
                        <th>Customer</th>
                        <th>Category & Package</th>
                        <th>Price/Qty</th>
                        <th>Cost</th>
                        <th>Order By</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>{{ trans('global.actions') }}</th>
                    </tr>
                </tfoot>
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