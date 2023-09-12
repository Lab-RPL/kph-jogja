<?php

use App\Http\Controllers\auth;
use App\Http\Controllers\bdhController;
use App\Http\Controllers\rphController;
use App\Http\Controllers\inventarisController;
use App\Http\Controllers\petakController;
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
// Login Controller
$auth = auth::class;

Route::get('/',[$auth,'login']);
Route::post('/',[$auth,'masuk']);
Route::get('/logout',[$auth,'logout']);


// DATA UTAMA
Route::get('/data-utama', [inventarisController::class,'index']);
Route::get('/data-result', function() {
    return view('data-utama.inventarisResult');
});
Route::get('/data-option', function() {
    return view('data-utama.inventarisOption');
});


// BDH
Route::get('/data-bdh', [bdhController::class,'index']);
Route::post('/data-bdh', [bdhController::class, 'store'])->name('bdh.store');
Route::get('/tambah-bdh', [bdhController::class,'create']);
Route::get('/data-bdh/{id_bdh}/edit',[bdhController::class,'edit'])->name('bdh.edit');
Route::put('/data-bdh/{id}', [bdhController::class, 'update'])->name('bdh.update');
Route::get('/data-bdh/{id_bdh}', [bdhController::class, 'destroy'])->name('bdh.destroy');
Route::get('/bdh-read', [bdhController::class, 'index2']);


// RPH
Route::get('/rph/{id_bdh}',[rphController::class, 'index'])->name('rph.index');
Route::get('/ul-rph', [rphController::class, 'index2'])->name('rph.index2');
Route::get('/tambah-rph', [rphController::class, 'create'])->name('rph.create');
// Route::post('/rph{id_bdh}', [rphController::class, 'store'])->name('rph.store');
Route::post('/rph', [rphController::class,'tambah'])->name('rph.store');
// ...
Route::get('/rph/{id}/edit', [RphController::class, 'edit'])->name('rph.edit');
Route::put('/rph/{id}', [RphController::class, 'update'])->name('rph.update');
// ...

// Route::get('/balek/{id_bdh}', [rphController::class, 'kembali'])->name('rph.kembali');
Route::get('/rph{id_bdh}',[rphController::class,'destroy'])->name('rph.destroy');


// PETAK
Route::get('/petak/{id_rph}', [PetakController::class, 'index'])->name('petak.index');
Route::get('/tambah-petak', [petakController::class, 'create'])->name('petak.create');
Route::post('/petak', [petakController::class, 'store'])->name('petak.store');
Route::get('/petak-read', [petakController::class, 'index2'])->name('petak.index2');


// ADMIN
Route::get('/user', function () {
    return view('admin.admin');
});


// PERIZINAN
Route::get('/data-izin', function () {
    return view('izin.izin');
});

Route::get('/tambah-izin', function (){
    return view('izin.tambah-izin');
});


// KERUSAKAN/KEHILANGAN
Route::get('/data-rusak', function() {
    return view('rosak.rosak');
});
Route::get('tambah-rosak', function(){
    return view('rosak.tambah-rosak');
});


// Penerimaan Negera Bukan Pajak
Route::get('/data-pnbp', function(){
    return view('pnbp.pnbp');
});

Route::get('/tambah-pnbp', function(){
    return view('pnbp.tambah-pnbp');
});


//Potensi hasil hutan
Route::get('/data-potensi', function(){
    return view('potensi-hutan.potensi-hutan');
});


//Produksi hasil hutan
Route::get('/data-produksi', function(){
    return view('produksi-hutan.produksi-hutan');
});


//Luas Hutan
Route::get('/data-luas', function(){
    return view('luas-hutan.luas-hutan');
});

//Dashboard
Route::get('/dashboard', function(){
    return view('dashboard.dashboard');
});

