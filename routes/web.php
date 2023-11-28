<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaborController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StrukturController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return redirect()->route('page.login');
});
Route::get('/login', [AuthController::class, 'login_pages'])->name('page.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'is_auth'], function () {
  Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/admin', [DashboardController::class, 'admin_dashboard'])->name('page.admin');
    Route::resource('/admin/cabor', CaborController::class);
    Route::resource('/admin/pengurus', PengurusController::class);
  });
  Route::group(['middleware' => 'is_pengurus'], function () {
    Route::get('/pengurus', [DashboardController::class, 'pengurus_dashboard'])->name('page.pengurus');
    Route::resource('/pengurus/struktur', StrukturController::class);
    Route::resource('/pengurus/kelola/anggota', AnggotaController::class);
    Route::resource('/pengurus/kelola/program', ProgramController::class);
    Route::resource('/pengurus/kelola/prestasi', PrestasiController::class);
    Route::resource('/pengurus/kelola/inventaris', InventarisController::class);
  });
  Route::get('/setting', [SettingController::class, 'index'])->name('setting');
  Route::put('/setting', [SettingController::class, 'updatePassword'])->name('setting.update-password');
});
