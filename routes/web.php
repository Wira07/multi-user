<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Auth;

// Routes untuk autentikasi (Login, Register, dll)
Auth::routes();

// Route homepage
Route::get('/', function () {
    return view('welcome');
});

// Routes untuk Admin
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

// Routes untuk Karyawan
Route::prefix('karyawan')->middleware(['auth', 'role:karyawan'])->group(function () {
    Route::get('/', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::put('/update', [KaryawanController::class, 'update'])->name('karyawan.update');
});

// Redirect setelah login berdasarkan role
Route::get('/home', function() {
    if (Auth::user()->role == 'admin') {
        return redirect()->route('admin.index');
    } else {
        return redirect()->route('karyawan.index');
    }
})->name('home');