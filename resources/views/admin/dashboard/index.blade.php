{{-- Extends layout --}}
@extends('layouts.adm.base')

{{-- Styles --}}
@push('style')

@endpush

{{-- Content --}}
@section('content')

        <h3 class="mb-3">{{ $title }}</h3>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-primary">
                <div class="inner">
                        <h3>{{ $user }}</h3>
                        <p>Data User</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-address-card"></i>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="small-box-footer">
                        Tampilkan Data <i class="fas fa-arrow-circle-right ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-primary">
                <div class="inner">
                        <h3>{{ $category }}</h3>
                        <p>Data Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <a href="{{ route('admin.categories.index') }}" class="small-box-footer">
                        Tampilkan Data <i class="fas fa-arrow-circle-right ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-primary">
                <div class="inner">
                        <h3>{{ $package }}</h3>
                        <p>Data Paket</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <a href="{{ route('admin.packages.index') }}" class="small-box-footer">
                        Tampilkan Data <i class="fas fa-arrow-circle-right ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                <div class="inner">
                        <h3>{{ $transaction }}</h3>
                        <p>Data Transaksi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <a href="{{ route('admin.transactions.index') }}" class="small-box-footer">
                        Tampilkan Data <i class="fas fa-arrow-circle-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pesanan Baru</h3>
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
                            <th>Total Harga</th>
                            <th>Jasa Kurir</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>{{ trans('global.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pending as $key => $dt)
                        <tr>
                            <td>{{ $dt->code_order }}</td>
                            <td>{{ $dt->customer->name }}</td>
                            <td>{{ __('Rp.').number_format($dt->total,2,',','.') }}</td>
                            <td>{{ $dt->order_by }}</td>
                            <td>
                                @if ($dt->status == 'Pending')
                                    <a href="{{ route('admin.transactions.status', $dt->id) }}" class="btn btn-secondary">{{ $dt->status }}</a>
                                @elseif ($dt->status == 'Proses')
                                    <a href="{{ route('admin.transactions.status', $dt->id) }}" class="btn btn-warning">{{ $dt->status }}</a>
                                @elseif ($dt->status == 'Success')
                                    <a href="{{ route('admin.transactions.status', $dt->id) }}" class="btn btn-succes">{{ $dt->status }}</a>
                                @else
                                    <a href="{{ route('admin.transactions.status', $dt->id) }}" class="btn btn-danger">{{ $dt->status }}</a>
                                @endif
                            </td>
                            <td>{{ $dt->updated_at ? $dt->updated_at : $dt->created_at }}</td>
                            <td class="text-center">
                                {{-- <form action="{{ route('admin.clothes.show', $dt->id) }}" method="GET" class="row">
                                @csrf --}}
                                <div class="row">
                                    <div class="col-md-3">
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.transactions.show', $dt->id) }}">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn btn-success btn-sm" href="{{ route('admin.clothes.show', $dt->id) }}">
                                            <i class="fas fa-clipboard-list"></i>
                                        </a>
                                        {{-- <button class="btn btn-success btn-sm" type="submit">
                                            <i class="fas fa-clipboard-list"></i>
                                        </button> --}}
                                    </div>
                                </div>
                                {{-- </form> --}}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9"><center>Belum Ada Pesanan Terbaru!</center></td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Code</th>
                            <th>Customer</th>
                            <th>Total Harga</th>
                            <th>Jasa Kurir</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>{{ trans('global.actions') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pesanan Dalam Pengerjaan</h3>
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
                            <th>Total Harga</th>
                            <th>Jasa Kurir</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>{{ trans('global.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proses as $key => $dt)
                        <tr>
                            <td>{{ $dt->code_order }}</td>
                            <td>{{ $dt->customer->name }}</td>
                            <td>{{ __('Rp.').number_format($dt->total,2,',','.') }}</td>
                            <td>{{ $dt->order_by }}</td>
                            <td>
                                @if ($dt->status == 'Pending')
                                    <a href="{{ route('admin.transactions.status', $dt->id) }}" class="btn btn-secondary">{{ $dt->status }}</a>
                                @elseif ($dt->status == 'Proses')
                                    <a href="{{ route('admin.transactions.status', $dt->id) }}" class="btn btn-warning">{{ $dt->status }}</a>
                                @elseif ($dt->status == 'Success')
                                    <a href="{{ route('admin.transactions.status', $dt->id) }}" class="btn btn-succes">{{ $dt->status }}</a>
                                @else
                                    <a href="{{ route('admin.transactions.status', $dt->id) }}" class="btn btn-danger">{{ $dt->status }}</a>
                                @endif
                            </td>
                            <td>{{ $dt->updated_at ? $dt->updated_at : $dt->created_at }}</td>
                            <td class="text-center">
                                <form action="{{ route('admin.clothes.show', $dt->id) }}" method="GET" class="row">
                                    @csrf
                                    <div class="col-md-3">
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.transactions.show', $dt->id) }}">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        {{-- <a class="btn btn-success btn-sm" href="{{ route('admin.clothes.show', $dt->id) }}">
                                            <i class="fas fa-clipboard-list"></i>
                                        </a> --}}
                                        <button class="btn btn-success btn-sm" type="submit">
                                            <i class="fas fa-clipboard-list"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9"><center>Belum Ada Pesanan Yang Sedang Di Kerjakan!</center></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

@endsection

{{-- Script --}}
@push('app')

@endpush
