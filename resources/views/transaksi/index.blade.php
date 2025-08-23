@extends('layouts.master')
@section('title','Data Transaksi')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Data Transaksi</h1>
<a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">+ Tambah Transaksi</a>
<div class="card shadow">
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr><th>ID</th><th>Pelanggan</th><th>Layanan</th><th>Jumlah</th><th>Total Harga</th><th>Aksi</th></tr>
      </thead>
      <tbody>
        @foreach($transaksis as $t)
        <tr>
          <td>{{ $t->id }}</td>
          <td>{{ $t->pelanggan->nama }}</td>
          <td>{{ $t->layanan->nama_layanan }}</td>
          <td>{{ $t->jumlah }}</td>
          <td>Rp {{ number_format($t->total_harga,0,',','.') }}</td>
          <td>
            <form action="{{ route('transaksi.destroy',$t->id) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $transaksis->links() }}
  </div>
</div>
@endsection
