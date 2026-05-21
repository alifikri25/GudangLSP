<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barang_masuks = BarangMasuk::with('barang')->get();
        return view('barang_masuk.index', compact('barang_masuks'));
    }

    public function create()
    {
        $barangs = \App\Models\Barang::all();
        return view('barang_masuk.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'tanggal_masuk' => 'required|date',
            'jumlah' => 'required|integer|min:1',
        ]);

        BarangMasuk::create($request->all());

        $barang = \App\Models\Barang::find($request->barang_id);
        $barang->stok += $request->jumlah;
        $barang->save();

        return redirect()->route('barang_masuk.index')->with('success', 'Data Barang Masuk berhasil disimpan.');
    }
}
