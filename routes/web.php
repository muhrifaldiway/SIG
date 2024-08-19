<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SebaranController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SatwaEndemikController;
use App\Http\Controllers\KawasanKonservasiController;


Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
// Route untuk halaman admin
Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Routes untuk User
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    // Routes untuk Satwa Endemik
    Route::get('/satwa', [SatwaEndemikController::class, 'index'])->name('satwa.index');
    Route::post('/satwa', [SatwaEndemikController::class, 'store'])->name('satwa.store');
    Route::put('/satwa/{id}', [SatwaEndemikController::class, 'update'])->name('satwa.update');
    Route::delete('/satwa/{satwaEndemik}', [SatwaEndemikController::class, 'destroy'])->name('satwa.destroy');

    // Routes untuk Kawasan Konservasi
    Route::get('/kawasan', [KawasanKonservasiController::class, 'index'])->name('kawasan.index');
    Route::post('/kawasan', [KawasanKonservasiController::class, 'store'])->name('kawasan.store');
    Route::put('/kawasan/{id}', [KawasanKonservasiController::class, 'update'])->name('kawasan.update');
    Route::delete('/kawasan/{id}', [KawasanKonservasiController::class, 'destroy'])->name('kawasan.destroy');

    // Routes untuk Sebaran
    Route::get('/sebaran', [SebaranController::class, 'index'])->name('sebaran.index');
    Route::get('/sebaran/create', [SebaranController::class, 'create'])->name('sebaran.create');
    Route::post('/sebaran', [SebaranController::class, 'store'])->name('sebaran.store');
    Route::get('/sebaran/{id}/edit', [SebaranController::class, 'edit'])->name('sebaran.edit');
    Route::put('/sebaran/{id}', [SebaranController::class, 'update'])->name('sebaran.update');
    Route::delete('/sebaran/{sebaran}', [SebaranController::class, 'destroy'])->name('sebaran.destroy');
});
// Route home (optional)
Route::get('/', function () {
    return view('login');
});

Route::get('/about', function () {
    return view('about');
});

