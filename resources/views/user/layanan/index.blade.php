@extends('layouts.master')

@section('title', 'Data Layanan')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Data Layanan</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('layanan.create') }}" class="btn btn-primary mb-3">+ Tambah Layanan</a>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Layanan</th>
                        <th>Harga/Kg (Rp.10.000)</th>
                        <th>Estimasi Waktu (hari)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($layanans as $layanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $layanan->nama_pelanggan }}</td>
                            <td>{{ $layanan->jenis_layanan }}</td>
                            <td>{{ number_format($layanan->harga_per_kilo, 0, ',', '.') }}</td>
                            <td>{{ $layanan->estimasi_waktu }}</td>
                            <td>
                                <a href="{{ route('layanan.edit', $layanan->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('layanan.destroy', $layanan->id) }}" method="POST" style="display: inline-block;"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data layanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $layanans->links() }}
            </div>
        </div>
    </div>
@endsection
