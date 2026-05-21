<?php

namespace App\Exports;

use App\Models\BarangKeluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BarangKeluarExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return BarangKeluar::with('barang')->get();
    }

    public function headings(): array
    {
        return ['No', 'Tanggal Keluar', 'Kode Barang', 'Nama Barang', 'Jumlah', 'Keterangan'];
    }

    public function map($row): array
    {
        static $no = 1;
        return [
            $no++,
            \Carbon\Carbon::parse($row->tanggal_keluar)->format('d/m/Y'),
            $row->barang->kode_barang,
            $row->barang->nama_barang,
            $row->jumlah,
            $row->keterangan
        ];
    }
}
