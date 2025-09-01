@extends('layouts.master')

@section('title','Data Layanan')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Data Layanan</h1>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tombol Tambah --}}
    <a href="{{ route('layanan.create') }}" class="btn btn-primary mb-3">+ Tambah Layanan</a>

    {{-- Tabel Data Layanan --}}
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-primary text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Layanan</th>
                        <th>Estimasi Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($layanans as $l)
                    <tr>
                        <td>{{ $l->id }}</td>
                        <td>{{ $l->nama_pelanggan }}</td>
                        <td>{{ $l->jenis_layanan }}</td>                        
                        <td>{{ $l->estimasi_waktu }} hari</td>
                        <td class="text-center">
                            <a href="{{ route('layanan.edit', $l->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('layanan.destroy', $l->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Data layanan belum tersedia.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $layanans->links() }}
            </div>
        </div>
    </div>
@endsection
