<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard ', [PegawaiController::class, 'indeks'] )->name('Pegawai');
Route::get('/ ', [PegawaiController::class, 'indeks'] )->name('Pegawai');

require __DIR__.'/auth.php';
