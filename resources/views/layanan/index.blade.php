@extends('layouts.master')

@section('title','Data Layanan')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Data Layanan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('layanan.create') }}" class="btn btn-primary mb-3">+ Tambah Layanan</a>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama Layanan</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($layanans as $l)
                    <tr>
                        <td>{{ $l->id }}</td>
                        <td>{{ $l->nama_layanan }}</td>
                        <td>Rp {{ number_format($l->harga,0,',','.') }}</td>
                        <td>
                            <a href="{{ route('layanan.edit', $l->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('layanan.destroy', $l->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin hapus data?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $layanans->links() }}
        </div>
    </div>
@endsection
