<?php

use App\Http\Controllers\auth;
use App\Http\Controllers\bdhController;
use App\Http\Controllers\rphController;
use App\Http\Controllers\inventarisController;
use App\Models\rph;
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


// RPH
Route::get('/rph/{id_bdh}', [rphController::class, 'index'])->name('rph.index');
Route::get('/tambah-rph', [rphController::class, 'create'])->name('rph.create');
// Route::post('/rph{id_bdh}', [rphController::class, 'store'])->name('rph.store');
Route::post('/rph', [rphController::class,'tambah'])->name('rph.store');

    
 
// PETAK

Route::get('/petak', function () {
    return view('petak.petak');
});

Route::get('/tambahpetak', function () {
    return view('petak.tambah-petak');
});


// ADMIN

Route::get('/user', function () {
    return view('admin.admin');
});

// PERIZINAN

Route::get('/data-izin', function () {
    return view('izin.perizinan');
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

// PNBP

Route::get('/data-pnbp', function(){
    return view('pnbp');
});

// HHBK

Route::get('/data-hhbk', function(){
    return view('hhbk');
});