<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BarangController;
use App\Http\Controllers\Backend\LelangController;
use App\Http\Controllers\Backend\PenawaranController;
use App\Http\Controllers\Backend\MasyarakatController;
use App\Http\Controllers\DashboardController;

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
// Route::Frontend
Route::get('/', [DashboardController::class, 'index'], function () {
    return view('welcome')->name('welcome');
}); 
// Route::Login && Register
Auth::routes();
Route::get('/login/masyarakat', [LoginController::class, 'showMasyarakatLogin'])->name('masyarakat/login');
Route::post('/login/masyarakat', [LoginController::class, 'MasyarakatLogin']);
// Route::View
Route::view('/dashboard', 'backend.dashboard');
Route::get('error/page', [DashboardController::class, 'coba'])->name('coba');
// Route::Masyarakat
Route::group(['middleware' => ['auth:masyarakat', 'isActive']], function() {
    Route::get('home', [HomeController::class, 'home'])->name('home');
    Route::get('barang/penawaran/{id}', [HomeController::class, 'penawaran'])->name('barang.penawaran');
    Route::get('penawaran', [HomeController::class, 'penawaran'])->name('penawaran');
    Route::get('data/lelang', [HomeController::class, 'datalelang'])->name('data.lelang');
    Route::get('riwayat', [HomeController::class, 'riwayat'])->name('riwayat');
    Route::get('detailriwayat', [HomeController::class, 'detail'])->name('detailriwayat');
    Route::get('riwayatpemenang', [HomeController::class, 'pemenang'])->name('riwayatpemenang');
    Route::post('gotawar', [PenawaranController::class, 'gotawar'])->name('gotawar');
});
// Route::Petugas
Route::group(['middleware' => ['auth:web', 'checkLevel:petugas', 'isActive']], function() {
    // Route Barang
    Route::get('barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('barang/show/{id}', [BarangController::class, 'show'])->name('barang.show');
    Route::get('create/barang', [BarangController::class, 'create'])->name('barang.create');
    Route::post('create/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('edit/barang/{id}', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('edit/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('delete/{id}/barang', [BarangController::class, 'destory'])->name('barang.destroy');
    Route::get('image/{id}', [BarangController::class, 'image'])->name('barang.image');
    Route::post('postimage/{id}', [BarangController::class, 'postimage'])->name('postimage');
    // Route Lelang
    Route::resource('lelang', LelangController::class); 
    Route::get('/open/{id}', [LelangController::class, 'open'])->name('open');
    Route::get('/cancel/{id}', [LelangController::class, 'cancel'])->name('cancel');
    Route::get('/closed/{id}', [LelangController::class, 'closed'])->name('closed');
    Route::get('/lelangtambah', [LelangController::class, 'tambah'])->name('lelangtambah');
    Route::post('/lelangadd', [LelangController::class, 'add'])->name('lelangadd');    
    // Route Laporan
    Route::get('/confirm/{id}', [PenawaranController::class, 'confirm'])->name('confirm');
    Route::get('riwayatpenawaran', [PenawaranController::class, 'riwayat'])->name('riwayatpenawaran');
    Route::get('pemenanglelang', [PenawaranController::class, 'pemenang'])->name('pemenanglelang');
});
// Route::Admin
Route::group(['middleware' => ['auth:web', 'checkLevel:admin', 'isActive']], function() {
    // Route Masyarakat
    Route::resource('masyarakat', MasyarakatController::class);
    Route::get('/block/{id}', [MasyarakatController::class, 'block']);
    // Route Users
    Route::resource('user', UserController::class);
    Route::get('/nonaktif/{id}', [UserController::class, 'nonaktif']);
    Route::get('/aktif/{id}', [UserController::class, 'aktif'])->name('aktif');
    Route::get('dochange/{id}', [UserController::class, 'dochange'])->name('user.dochange');
    Route::put('dochange/{id}', [UserController::class, 'change'])->name('user.change');
});
// 
Route::group(['middleware' => ['auth:web', 'checkLevel:petugas,admin', 'isActive']], function() {
    Route::view('/dashboard', 'backend.dashboard')->middleware('isActive');
});