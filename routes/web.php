<?php

use App\Http\Controllers\BackendController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/masuk', [App\Http\Controllers\SuratMasukController::class, 'index']);

// Route::get('/', [DashboardController::class, 'index']);
// Route::resource('admin.masuk', DashboardController::class);

Route::prefix('admin')->middleware('auth', isAdmin::class)->group(function(){
    Route::resource('masuk', SuratMasukController::class);
    Route::resource('keluar', SuratKeluarController::class);
    Route::resource('disposisi', DisposisiController::class);
// Route::resource('artikel', ArtikelController::class);
// Route::resource('komentar', KomentarController::class);
// Route::resource('home', HomeController::class);
});

