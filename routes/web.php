<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;



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
//     return view('beranda.index');
// });
Route::get('/login', function () {
  return view('auth/login');
});

Auth::routes();
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

//Route edit profil admin
// Route::post('update-profile-info',[ProfilController::class, 'updateInfo'])->name('adminUpdateInfo');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/admin', 'AdminController@index');
//Route::get('/user', 'UserController@index');
// Route::get('/home', [HomeController::class, 'index']);
Route::get('/dashboardU', [UserController::class, 'dashboardU'])->name('user');

Route::group(['middleware' => 'auth'], function () {
  // Route::resource('profil', ProfilController::class);
  Route::resource('barang',  BarangController::class);
  Route::resource('transaksi',  TransaksiController::class);
  Route::resource('pembeli',  PembeliController::class);
  Route::resource('kategori',  KategoriController::class);
  Route::get('barang/kategori/{id}', [BarangController::class, 'listBarangKategori'])->name('list.withCategory');
  Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin');
  Route::get('/profil', [AdminController::class, 'profil'])->name('Adminprofil');
  Route::get('barang/role/{id}', [PembeliController::class, 'listUserRole'])->name('list.role');
  // Route::patch('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
  // Route::get('/barang', [BarangController::class, 'index'])->name('Adminbarang');
  // Route::get('/barang', [BarangController::class, 'create']);
  // Route::get('/pembeli', [AdminController::class, 'pembeli'])->name('Adminpembeli');
  // Route::get('/transaksi', [AdminController::class, 'transaksi'])->name('Admintransaksi');
  Route::get('/transaksi/cetak_pdf', [TransaksiController::class, 'cetak_transaksi'])->name('cetak_transaksi');
});




// Route::get('admin', function () { return view('admin'); })->middleware('checkRole:admin');
// Route::get('user', function () { return view('user'); })->middleware(['checkRole:user,admin']);
