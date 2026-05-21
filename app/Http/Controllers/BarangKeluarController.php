<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barang_keluars = BarangKeluar::with('barang')->get();
        return view('barang_keluar.index', compact('barang_keluars'));
    }

    public function create()
    {
        $barangs = \App\Models\Barang::all();
        return view('barang_keluar.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'tanggal_keluar' => 'required|date',
            'jumlah' => 'required|integer|min:1',
        ]);

        $barang = \App\Models\Barang::find($request->barang_id);
        
        if ($barang->stok < $request->jumlah) {
            return back()->with('error', 'Stok barang tidak mencukupi!');
        }

        BarangKeluar::create($request->all());

        $barang->stok -= $request->jumlah;
        $barang->save();

        return redirect()->route('barang_keluar.index')->with('success', 'Data Barang Keluar berhasil disimpan.');
    }
}
