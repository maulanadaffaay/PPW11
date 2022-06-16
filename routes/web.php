
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('pegawai', PegawaiController::class);

Auth::routes();

Route::get('/', [App\Http\Controllers\PegawaiController::class, 'index'])->name('main');

Auth::routes();

Route::get('/home', [App\Http\Controllers\PegawaiController::class, 'index'])->name('home');

require __DIR__.'/auth.php';