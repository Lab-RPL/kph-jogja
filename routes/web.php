<?php

use App\Http\Controllers\auth;
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

Route::get('/login',[$auth,'login']);
Route::post('/login',[$auth,'masuk']);



Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/data-utama', function () {
    return view('enak');
});

Route::get('/data-kedua', function () {
    return view('enak2');
});
Route::get('/user', function () {
    return view('user');
});
Route::get('/petak', function () {
    return view('petak');
});