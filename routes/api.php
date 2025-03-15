<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController; // Contoh controller lain jika ada

// Endpoint untuk login dan register
Route::post('/login', [AuthController::class, 'loginApi']);
Route::post('/register', [AuthController::class, 'register']);

// Protected Routes (Hanya bisa diakses oleh pengguna yang sudah login)
Route::middleware('auth:sanctum')->group(function () {

    // Endpoint untuk mendapatkan data user yang sedang login
    Route::get('/user', function (Request $request) {
        return response()->json([
            'user' => $request->user()
        ]);
    });

    // Logout API (Menghapus token pengguna)
    Route::post('/logout', [AuthController::class, 'logout']);

    // Contoh: Endpoint Buku yang hanya bisa diakses setelah login
    // Route::get('/books', [BookController::class, 'index']); // Ambil daftar buku
    // Route::post('/books', [BookController::class, 'store']); // Tambah buku
    // Route::put('/books/{id}', [BookController::class, 'update']); // Edit buku
    // Route::delete('/books/{id}', [BookController::class, 'destroy']); // Hapus buku
});
