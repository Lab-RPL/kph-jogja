<?php

use App\Models\admin;
use App\Http\Controllers\auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bdhController;
use App\Http\Controllers\rphController;
use App\Http\Controllers\izinController;
use App\Http\Controllers\pnbpController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\petakController;
use App\Http\Controllers\potensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LuasHutanController;
use App\Http\Controllers\inventarisController;
use App\Http\Controllers\rosakController;
use App\Http\Controllers\tegakController;

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
// Login Controller
$auth = auth::class;

Route::get('/', [$auth, 'login']);
Route::post('/', [$auth, 'masuk']);
Route::get('/logout', [$auth, 'logout']);

// DATA UTAMA
Route::get('/data-utama', [inventarisController::class, 'index'])->name('data-utama.index');
Route::get('/data-result/{id_PU}', [inventarisController::class, 'index_detail'])->name('data-utama.detail');
Route::get('/data-option', [inventarisController::class, 'create'])->name('data-utama.create');
Route::post('/data-utama', [inventarisController::class, 'store'])->name('data-utama.store');
Route::get('/data-utama/edit/{id_PU}', [inventarisController::class, 'edit'])->name('data-utama.edit');
Route::put('/data-utama/{id}', [inventarisController::class, 'update'])->name('data-utama.update');
Route::get('/data-utama/{id_PU}', [inventarisController::class, 'destroy'])->name('data-utama.destroy');

// DATA TEGAKAN

Route::get('/data-tegakan/{id_PU}', [tegakController::class, 'index'])->name('data-tgk.index');
Route::get('/tambah-tegakan', [tegakController::class, 'create'])->name('data-tgk.create');
Route::post('/data-tegakan', [tegakController::class, 'store'])->name('data-tgk.store');
Route::get('/data-tegakan/{id}/edit', [tegakController::class, 'edit'])->name('data-tgk.edit');
Route::put('/data-tegakan/{id}', [tegakController::class, 'update'])->name('data-tgk.update');
Route::get('/data-tegakan{id_PU}', [tegakController::class, 'destroy'])->name('data-tgk.destroy');

// BDH
Route::get('/data-bdh', [bdhController::class, 'index']);
Route::post('/data-bdh', [bdhController::class, 'store'])->name('bdh.store');
Route::post('/bdh-read', [bdhController::class, 'store_read'])->name('bdh.store.read');
// Route::post('/data-bdh', [bdhController::class, 'store_read'])->name('bdh.store_read');
Route::get('/tambah-bdh', [bdhController::class, 'create'])->name('bdh.create');
Route::get('/tambah-bdh-read', [bdhController::class, 'create_read'])->name('bdh.create.read');
// Route::get('/tambah-bdh-read', [bdhController::class,'create_read'])->name('bdh.create_read');
Route::get('/data-bdh/{id_bdh}/edit', [bdhController::class, 'edit'])->name('bdh.edit');
Route::put('/data-bdh/{id}', [bdhController::class, 'update'])->name('bdh.update');
Route::get('/data-bdh/{id_bdh}', [bdhController::class, 'destroy'])->name('bdh.destroy');
Route::get('/bdh-read', [bdhController::class, 'index2'])->name('bdh.index.2');

// RPH
Route::get('/rph/{id_bdh}', [rphController::class, 'index'])->name('rph.index');
Route::get('/rph-read', [rphController::class, 'index2'])->name('rph.index2');
Route::get('/tambah-rph', [rphController::class, 'create'])->name('rph.create');
Route::get('/tambah-rph-read', [rphController::class, 'create_read'])->name('rph.create_read');
// Route::post('/rph{id_bdh}', [rphController::class, 'store'])->name('rph.store');
Route::post('/rph', [rphController::class, 'tambah'])->name('rph.store');
Route::post('/rph-read', [rphController::class, 'tambah_read'])->name('rph.store_read');
// ...
Route::get('/rph/{id}/edit', [RphController::class, 'edit'])->name('rph.edit');
Route::put('/rph/{id}', [RphController::class, 'update'])->name('rph.update');
// ...

// Route::get('/balek/{id_bdh}', [rphController::class, 'kembali'])->name('rph.kembali');
Route::get('/rph{id_bdh}', [rphController::class, 'destroy'])->name('rph.destroy');

// PETAK
Route::get('/petak/{id_rph}', [PetakController::class, 'index'])->name('petak.index');
Route::get('/tambah-petak', [petakController::class, 'create'])->name('petak.create');
Route::get('/tambah-petak-read', [petakController::class, 'create_read'])->name('petak.create_read');
Route::post('/petak', [petakController::class, 'store'])->name('petak.store');
Route::post('/petak-read', [petakController::class, 'store_read'])->name('petak.store_read');
Route::get('/petak-read', [petakController::class, 'index2'])->name('petak.index2');
Route::get('/petak/{id}/edit', [petakController::class, 'edit'])->name('petak.edit');
Route::put('/petak/{id}', [petakController::class, 'update'])->name('petak.update');
Route::get('/petak{id_rph}', [petakController::class, 'destroy'])->name('petak.destroy');
Route::get('rph/get/{id}', [petakController::class,'getRph']);


//Potensi hasil hutan
Route::get('/data-potensi', [potensiController::class, 'index'])->name('potensi.index');
Route::get('/tambah-potensi', [potensiController::class, 'create'])->name('potensi.create');
Route::post('/data-potensi', [potensiController::class, 'store'])->name('potensi.store');
Route::get('/data-potensi/{id_hhbk}/edit', [potensiController::class, 'edit'])->name('potensi.edit');
Route::put('/data-potensi/{id}', [potensiController::class, 'update'])->name('potensi.update');
Route::get('/data-potensi/{id_hhbk}', [potensiController::class, 'destroy'])->name('potensi.destroy');

// ADMIN
Route::get('/admin', [adminController::class, 'index'])->name('admin.index');
Route::post('/admin', [adminController::class, 'store'])->name('admin.store');
Route::get('/tambah-admin', [adminController::class, 'create'])->name('admin.create');
Route::get('/admin/{id}/edit', [adminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{id}', [adminController::class, 'update'])->name('admin.update');
Route::get('/admin/{id}', [adminController::class, 'destroy'])->name('admin.destroy');

// PERIZINAN
Route::get('/data-izin', [izinController::class, 'index'])->name('izin.index');
Route::post('/data-izin', [izinController::class, 'store'])->name('izin.store');
Route::get('/tambah-izin', [izinController::class, 'create'])->name('izin.create');
Route::get('/data-izin/{id_izin}/edit', [izinController::class, 'edit'])->name('izin.edit');
Route::put('/data-izin/{id}', [izinController::class, 'update'])->name('izin.update');
Route::get('/data-izin/{id_izin}', [izinController::class, 'destroy'])->name('izin.destroy');

// KERUSAKAN/KEHILANGAN

Route::get('/data-rusak',[rosakController::class,'index'])->name('rosak.index');
Route::get('/tambah-rosak',[rosakController::class, 'create'])->name('rosak.create');
Route::post('/data-rusak',[rosakController::class, 'store'])->name('rosak.store');
Route::get('/data-rusak/{id_rusak}/edit',[rosakController::class, 'edit'])->name('rosak.edit');
Route::put('/data-rusak/{id}',[rosakController::class, 'update'])->name('rosak.update');
Route::get('/data-rusak/{id_rusak}',[rosakController::class, 'destroy'])->name('rosak.destroy');


// Penerimaan Negera Bukan Pajak
Route::get('/data-pnbp', [pnbpController::class, 'index'])->name('pnbp.index');
Route::get('/tambah-pnbp', [pnbpController::class, 'create'])->name('pnbp.create');
Route::post('/data-pnbp', [pnbpController::class, 'store'])->name('pnbp.store');
Route::get('/data-pnbp/{id_pnbp}/edit', [pnbpController::class, 'edit'])->name('pnbp.edit');
Route::put('/data-pnbp/{id}', [pnbpController::class, 'update'])->name('pnbp.update');
Route::get('/data-pnbp/{id_pnbp}', [pnbpController::class, 'destroy'])->name('pnbp.destroy');

//Produksi hasil hutan
Route::get('/data-produksi', function () {
    return view('produksi-hutan.produksi-hutan');
});

//Luas Hutan
Route::get('/data-luas', [LuasHutanController::class, 'index'])->name('data-read');
Route::get('/luas-hutan/{id}/edit', [LuasHutanController::class, 'edit'])->name('luas-hutan.edit');
Route::put('/luas-hutan/{id}', [LuasHutanController::class, 'update'])->name('luas-hutan.update');
Route::post('/luas-hutan', [LuasHutanController::class, 'store'])->name('luas-hutan.store');
Route::get('/tambah-luas-hutan', [LuasHutanController::class, 'create'])->name('luas-hutan.create');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/chart-data', [DashboardController::class, 'getChartData']);