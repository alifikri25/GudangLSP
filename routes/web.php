<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;

Route::get('/setup-database', function () {
    try {
        Artisan::call('migrate:fresh', ['--force' => true, '--seed' => true]);
        return 'Database berhasil diinstal dan diisi data dummy! Silakan kembali ke halaman utama.';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

Route::get('/', function () {
    return redirect()->route('barang.index');
});

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::resource('kategori', KategoriController::class);
    Route::resource('barang', BarangController::class);

    Route::get('barang_masuk/export', [BarangMasukController::class, 'export'])->name('barang_masuk.export');
    Route::resource('barang_masuk', BarangMasukController::class)->only(['index', 'create', 'store']);

    Route::get('barang_keluar/export', [BarangKeluarController::class, 'export'])->name('barang_keluar.export');
    Route::resource('barang_keluar', BarangKeluarController::class)->only(['index', 'create', 'store']);
});
