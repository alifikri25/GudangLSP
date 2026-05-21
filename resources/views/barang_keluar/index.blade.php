@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Barang Keluar</h5>
        <div>
            <a href="{{ route('barang_keluar.export') }}" class="btn btn-success btn-sm me-2">Export Excel</a>
            <a href="{{ route('barang_keluar.create') }}" class="btn btn-primary btn-sm">Tambah Transaksi</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang_keluars as $transaksi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_keluar)->format('d/m/Y') }}</td>
                    <td>{{ $transaksi->barang->kode_barang }}</td>
                    <td>{{ $transaksi->barang->nama_barang }}</td>
                    <td>{{ $transaksi->jumlah }}</td>
                    <td>{{ $transaksi->keterangan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
