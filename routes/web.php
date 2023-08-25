<?php

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
    return view('layouts.main');
});

Route::get('/data-utama', function () {
    return view('enak');
});

Route::get('/data-kedua', function () {
    return view('enak2');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/user', function () {
    return view('user');
});
Route::get('/petak', function () {
    return view('petak');
});