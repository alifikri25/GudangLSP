<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User Login Default
        \App\Models\User::create([
            'name' => 'Admin Gudang',
            'email' => 'admin@pt.com',
            'password' => bcrypt('password'),
        ]);

        // Kategori
        $kat1 = \App\Models\Kategori::create(['nama_kategori' => 'Elektronik']);
        $kat2 = \App\Models\Kategori::create(['nama_kategori' => 'Alat Tulis']);
        $kat3 = \App\Models\Kategori::create(['nama_kategori' => 'Perabotan']);

        // Barang
        $b1 = \App\Models\Barang::create(['kategori_id' => $kat1->id, 'kode_barang' => 'ELK-001', 'nama_barang' => 'Monitor 24 Inch', 'stok' => 15, 'harga_satuan' => 1500000]);
        $b2 = \App\Models\Barang::create(['kategori_id' => $kat1->id, 'kode_barang' => 'ELK-002', 'nama_barang' => 'Mouse Wireless', 'stok' => 30, 'harga_satuan' => 150000]);
        $b3 = \App\Models\Barang::create(['kategori_id' => $kat2->id, 'kode_barang' => 'ATK-001', 'nama_barang' => 'Kertas HVS A4', 'stok' => 50, 'harga_satuan' => 45000]);
        $b4 = \App\Models\Barang::create(['kategori_id' => $kat2->id, 'kode_barang' => 'ATK-002', 'nama_barang' => 'Pulpen Hitam (Pack)', 'stok' => 20, 'harga_satuan' => 25000]);
        $b5 = \App\Models\Barang::create(['kategori_id' => $kat3->id, 'kode_barang' => 'PRB-001', 'nama_barang' => 'Meja Kerja', 'stok' => 10, 'harga_satuan' => 750000]);

        // Riwayat
        \App\Models\BarangMasuk::create(['barang_id' => $b1->id, 'tanggal_masuk' => date('Y-m-d', strtotime('-2 days')), 'jumlah' => 5, 'keterangan' => 'Stok tambahan dari supplier']);
        \App\Models\BarangKeluar::create(['barang_id' => $b3->id, 'tanggal_keluar' => date('Y-m-d', strtotime('-1 days')), 'jumlah' => 2, 'keterangan' => 'Dipakai divisi HR']);
    }
}
