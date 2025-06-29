<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

// Arahkan root dan /home ke halaman menu
Route::get('/', function () {
    return redirect('/menu');
});

Route::get('/home', function () {
    return redirect('/menu');
});

// Proteksi semua route menu agar hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {
    Route::resource('menu', MenuController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
