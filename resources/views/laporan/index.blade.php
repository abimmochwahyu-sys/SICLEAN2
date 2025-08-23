@extends('layouts.master')

@section('title','Laporan Transaksi')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Laporan Transaksi</h1>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Pelanggan</th>
                        <th>Layanan</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($transaksis as $t)
                    <tr>
                        <td>{{ $t->id }}</td>
                        <td>{{ $t->pelanggan->nama }}</td>
                        <td>{{ $t->layanan->nama_layanan }}</td>
                        <td>{{ $t->jumlah }}</td>
                        <td>Rp {{ number_format($t->total_harga,0,',','.') }}</td>
                        <td>{{ $t->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $transaksis->links() }}
        </div>
    </div>
@endsection
