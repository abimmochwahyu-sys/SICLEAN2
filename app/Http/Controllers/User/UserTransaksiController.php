<?php

namespace App\Http\Controllers\User;

use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Layanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserTransaksiController extends Controller

{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $transaksis = Transaksi::with(['pelanggan','layanan'])->latest()->paginate(10);
    return view('user.transaksi.index', compact('transaksis'));
}

public function create()
{
    $pelanggans = Pelanggan::all();
    $layanans = Layanan::all();
    return view('user.transaksi.create', compact('pelanggans','layanans'));
}

public function store(Request $request)
{
    $request->validate([
        'pelanggan_id' => 'required',
        'layanan_id' => 'required',
        'jumlah' => 'required|numeric',
    ]);

    $layanan = Layanan::find($request->layanan_id);
    $total = $layanan->harga * $request->jumlah;

    Transaksi::create([
        'pelanggan_id' => $request->pelanggan_id,
        'layanan_id' => $request->layanan_id,
        'jumlah' => $request->jumlah,
        'total_harga' => $total,
    ]);

    return redirect()->route('user.transaksi.index')->with('success','Transaksi berhasil ditambahkan');
}

public function destroy(Transaksi $transaksi)
{
    $transaksi->delete();
    return redirect()->route('user.transaksi.index')->with('success','Transaksi berhasil dihapus');
}


}
