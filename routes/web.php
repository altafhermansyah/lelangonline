<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MasyarakatController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/masyarakat-view', [LoginController::class, 'loginMasyarakat'])->name('masyarakat.view');
Route::post('/masyarakat-login', [LoginController::class, 'masyarakatLogin'])->name('masyarakat.login');

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('barang', BarangController::class);
    Route::resource('history', HistoryController::class);
    Route::resource('user', UserController::class);
    Route::resource('lelang', LelangController::class);
});

Route::post('petugas', [PetugasController::class, 'regis'])->name('petugas.regis');
Route::post('masyarakat', [MasyarakatController::class, 'store'])->name('masyarakat.store');

Route::resource('masyarakat', MasyarakatController::class);
Route::resource('history', HistoryController::class);

Route::get('/dashboard', [HomeController::class, 'masyarakat'])->name('dashboard')->middleware('auth:masyarakat');
