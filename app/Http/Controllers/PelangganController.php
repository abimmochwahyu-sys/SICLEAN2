<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $pelanggans = Pelanggan::latest()->paginate(10);
    return view('pelanggan.index', compact('pelanggans'));
}

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')
        ->with('success', 'Pelanggan berhasil ditambahkan');
    }

public function edit(Pelanggan $pelanggan)
{
    return view('pelanggan.edit', compact('pelanggan'));
}

public function update(Request $request, Pelanggan $pelanggan)
{
    $request->validate([
        'nama' => 'required|string|max:100',
        'alamat' => 'required|string|max:255',
        'telepon' => 'required|string|max:15',
    ]);

    $pelanggan->update($request->all());

    return redirect()->route('pelanggan.index')
                     ->with('success', 'Pelanggan berhasil diperbarui');
}



public function destroy(Pelanggan $pelanggan)
{
    $pelanggan->delete();
    return redirect()->route('pelanggan.index')
                     ->with('success', 'Pelanggan berhasil dihapus');
}
}
