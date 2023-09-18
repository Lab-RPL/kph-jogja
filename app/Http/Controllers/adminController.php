<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function index()
    {
        // Pastikan pengguna telah masuk dan bergolong 'admin' sebelum mengizinkan akses.
        if (Auth::check() && Auth::user()->user_type == 'admin') {
            
            // Tampilkan halaman admin atau lakukan apa pun yang Anda inginkan
            return view('admin.admin');
        }

    }
}
