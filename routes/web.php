<?php

use App\Http\Controllers\BackendController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\IsKepsek;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\isUser;
use App\Models\PengajuanSurat;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes([
    'register' => false, // matiin register route
]);
Route::get('/download-surat-masuk/{id}', [HomeController::class, 'download'])->name('surat.download');
Route::prefix('user')->middleware(['auth', isUser::class])->group(function (){
    Route::resource('inbox', InboxController::class);
    Route::resource('pengajuan', PengajuanController::class);
    Route::get('arsip', [InboxController::class, 'arsip'])->name('arsip.index');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/download-surat/{id}', [PengajuanController::class, 'download'])->name('pengajuan.download');


Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/masuk', [App\Http\Controllers\SuratMasukController::class, 'index']);

// Route::get('/', [DashboardController::class, 'index']);
// Route::resource('admin.masuk', DashboardController::class);

Route::prefix('admin')->as('admin.')->middleware(['auth', IsAdmin::class])->group(function (){
    Route::resource('pengajuan', PengajuanController::class);
    Route::resource('masuk', SuratMasukController::class);
    Route::resource('keluar', SuratKeluarController::class);
    Route::resource('disposisi', DisposisiController::class);
    Route::resource('users', UsersController::class);
    
});

Route::prefix('kepsek')->as('kepsek.')->middleware(['auth', IsKepsek::class])->group(function(){
    Route::get('masuk', [KepsekController::class, 'index'])->name('masuk.index');
    Route::resource('disposisi', KepsekController::class);
    Route::get('history', [KepsekController::class, 'riwayat'])->name('history.index');
});

