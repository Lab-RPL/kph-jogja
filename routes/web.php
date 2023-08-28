<?php

use App\Http\Controllers\auth;
use App\Http\Controllers\bdhController;
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


// BDH

Route::get('/data-bdh', [bdhController::class,'index']);






Route::get('/data-utama', function () {
    return view('data-utama');
});


Route::get('/user', function () {
    return view('admin.admin');
});

Route::get('/petak', function () {
    return view('petak');
});

Route::get('/rph', function () {
    return view('rph');
});