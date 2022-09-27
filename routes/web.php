<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\jnsvillaController;
use App\Http\Controllers\detailController;
use App\Http\Controllers\petugassuperadminController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\usersuperadminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::get('/selengkap', [App\Http\Controllers\detailController::class, 'selengkap'])->name('selengkap');
Route::get('/detail/{id}', [App\Http\Controllers\detailController::class, 'detail'])->name('detail');
Route::post('/tambah/{id}', [App\Http\Controllers\detailController::class, 'tambah'])->name('tambah');
Route::get('/keranjang/{id}', [App\Http\Controllers\detailController::class, 'keranjang'])->name('keranjang');

Route::group(['middleware' => ['petugas']], function () {
    Route::get('/dashboard', [dashboardController::class, 'index']);
    Route::get('/laporan', [laporanController::class, 'index']);
    Route::get('/laporanexcel', [laporanController::class, 'excel']);
    Route::get('/laporanpdf', [laporanController::class, 'pdf']);
    Route::resource('produk', produkController::class);
    Route::resource('jns', jnsvillaController::class);
});
Route::group(['middleware' => ['superadmin']], function () {
    Route::get('/dashboardsuperadmin', [dashboardController::class, 'index']);
    Route::resource('akunpetugas', petugassuperadminController::class);
    Route::resource('akunuser', usersuperadminController::class);
});
Route::group(['middleware' => ['user']], function () {
    Route::get('/user', function () {
        return view('home');
    });

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
