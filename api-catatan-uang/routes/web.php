<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'registerPost'])->name('register.post');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'loginPost'])->name('login.post');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/edit', [UserController::class, 'editProfile'])->name('edit.profile');
    Route::put('/update-profile', [UserController::class, 'updateProfile'])->name('update.profile');
    Route::delete('/logout', [UserController::class, 'logout'])->name('logout');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/pemasukan/create', [PemasukanController::class, 'create'])->name('pemasukan.create');
    Route::post('/pemasukan', [PemasukanController::class, 'store'])->name('pemasukan.store');
    Route::get('/pemasukan/{id}', [PemasukanController::class, 'show'])->name('pemasukan.show');
    Route::get('/pemasukan/{id}/edit', [PemasukanController::class, 'edit'])->name('pemasukan.edit');
    Route::put('/pemasukan/{id}', [PemasukanController::class, 'update'])->name('pemasukan.update');
    Route::delete('/pemasukan/{id}', [PemasukanController::class, 'destroy'])->name('pemasukan.destroy');

    Route::get('/pengeluaran/create', [PengeluaranController::class, 'create'])->name('pengeluaran.create');
    Route::post('/pengeluaran', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
    Route::get('/pengeluaran/{id}', [PengeluaranController::class, 'show'])->name('pengeluaran.show');
    Route::get('/pengeluaran/{id}/edit', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
    Route::put('/pengeluaran/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');
    Route::delete('/pengeluaran/{id}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');
});

