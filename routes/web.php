<?php

use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/pesanan');

// URI statis (/pesanan/create) HARUS didefinisikan sebelum URI dinamis (/pesanan/{kode})
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::get('/pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');
Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');

Route::get('/pesanan/{kode}', [PesananController::class, 'show'])->name('pesanan.show');
Route::get('/pesanan/{kode}/edit', [PesananController::class, 'edit'])->name('pesanan.edit');
Route::match(['put', 'patch'], '/pesanan/{kode}', [PesananController::class, 'update'])->name('pesanan.update');
Route::delete('/pesanan/{kode}', [PesananController::class, 'destroy'])->name('pesanan.destroy');
