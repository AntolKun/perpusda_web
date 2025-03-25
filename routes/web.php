<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDataController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\BukuController;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/actionLogin', [AuthController::class, 'loginWeb']);
Route::post('/logout', [AuthController::class, 'logoutWeb'])->name('actionLogout')->middleware('auth');

Route::get('/adminDashboard', function () {
    return view('adminDashboard');
})->name('adminDashboard')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/adminData', [AdminDataController::class, 'index'])->name('admin.index');
    Route::post('/admin/store', [AdminDataController::class, 'store'])->name('admin.store');
    Route::post('/admin/update/{id}', [AdminDataController::class, 'update'])->name('admin.update');
    Route::delete('/admin/destroy/{id}', [AdminDataController::class, 'destroy'])->name('admin.destroy');

    Route::get('/adminKategori', [KategoriBukuController::class, 'index'])->name('kategori.index');
    Route::post('/kategori-buku/store', [KategoriBukuController::class, 'store'])->name('kategori-buku.store');
    Route::post('/kategori-buku/update/{id}', [KategoriBukuController::class, 'update'])->name('kategori-buku.update');
    Route::delete('/kategori-buku/delete/{id}', [KategoriBukuController::class, 'destroy'])->name('kategori-buku.destroy');

    Route::get('/adminBuku', [BukuController::class, 'index'])->name('buku.index');
    Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
    Route::post('/buku/{id}/update', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
});

