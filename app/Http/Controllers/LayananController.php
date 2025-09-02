<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::paginate(10);
        return view('layanan.index', compact('layanans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        return view('layanan.create', compact('pelanggans'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_pelanggan' => 'required|string',
        'jenis_layanan' => 'required|string',
        'harga_per_kilo' => 'required|integer',
        'estimasi_waktu' => 'required|integer',
    ]);

    Layanan::create([
        'nama_pelanggan' => $request->nama_pelanggan,
        'jenis_layanan' => $request->jenis_layanan,
        'harga_per_kilo' => $request->harga_per_kilo,
        'estimasi_waktu' => $request->estimasi_waktu,
    ]);

    return redirect()->route('layanan.index')->with('success', 'Data layanan berhasil ditambahkan.');
}

// Form edit layanan
    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        $pelanggans = Pelanggan::all();
        return view('layanan.edit', compact('layanan', 'pelanggans'));
    }

public function update(Request $request, Layanan $layanan)
{
    $request->validate([
        'nama_pelanggan' => 'required|string',
        'jenis_layanan' => 'required|string',
        'harga_per_kilo' => 'required|integer',
        'estimasi_waktu' => 'required|integer',
    ]);

    $layanan->update([
        'nama_pelanggan' => $request->nama_pelanggan,
        'jenis_layanan' => $request->jenis_layanan,
        'harga_per_kilo' => $request->harga_per_kilo,
        'estimasi_waktu' => $request->estimasi_waktu,
    ]);

    return redirect()->route('layanan.index')->with('success', 'Data layanan berhasil diperbarui.');
}

  // Hapus layanan
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
