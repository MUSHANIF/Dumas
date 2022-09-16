<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\adminController;
use App\Http\Controllers\daftaradminController;
use App\Http\Controllers\daftarmasyarakatController;
use App\Http\Controllers\pengaduanController;
use App\Http\Controllers\pengaduanadminController;
use App\Http\Controllers\tanggapanController;
use App\Http\Controllers\tanggapanuserController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\sudahController;
use App\Http\Controllers\collectionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['revalidate']], function () {
    Route::group(['middleware' => ['user']], function () {
        Route::resource('pengaduan/home', pengaduanController::class);
        Route::resource('tanggapanuser', tanggapanuserController::class);

    });
    Route::group(['middleware' => ['superadmin']], function () {
        Route::get('/dashboardsuperadmin', [dashboardController::class, 'index'])->name('dashboardsuperadmin');
        Route::resource('superadmin/daftar-admin', daftaradminController::class);
        Route::resource('superadmin/daftar-masyarakat', daftarmasyarakatController::class);
    });
    Route::group(['middleware' => ['admin']], function () {
        Route::resource('admin/home', adminController::class);
        Route::resource('admin/pengaduan', pengaduanadminController::class);
        Route::resource('admin/index-sudah', sudahController::class);
        Route::resource('admin/tanggapan', tanggapanController::class);
        Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
        Route::get('admin/laporan', [laporanController::class, 'index']);
        Route::get('admin/pdf/', [laporanController::class, 'pdf']);
    });
 

});
