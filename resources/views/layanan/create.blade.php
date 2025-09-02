@extends('layouts.master')

@section('title', 'Tambah Layanan')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Layanan</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('layanan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                    <select name="nama_pelanggan" id="nama_pelanggan" class="form-control" required>
                        <option value="">-- Pilih Nama Pelanggan --</option>
                        @foreach ($pelanggans as $pelanggan)
                            <option value="{{ $pelanggan->nama }}" {{ old('nama_pelanggan') == $pelanggan->nama ? 'selected' : '' }}>
                                {{ $pelanggan->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                    <select name="jenis_layanan" id="jenis_layanan" class="form-control" required>
                        <option value="">-- Pilih Jenis Layanan --</option>
                        <option value="Setrika">Setrika</option>
                        <option value="Laundry Kilat">Laundry Kilat</option>
                    </select>
                </div>

                <div class="mb-3">
    <label for="harga_per_kilo" class="form-label">Harga per Kilo (Rp.10.000)</label>
    <input type="number" name="harga_per_kilo" id="harga_per_kilo" class="form-control" required>
</div>

                <div class="mb-3">
                    <label for="estimasi_waktu" class="form-label">Estimasi Waktu (hari)</label>
                    <input type="number" name="estimasi_waktu" id="estimasi_waktu" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('layanan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
