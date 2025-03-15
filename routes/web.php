<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDataController;

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
});

