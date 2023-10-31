<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class auth extends Controller
{
    //
    public function login(){
        return view('login');
    }

    public function masuk(Request $request)
    {
        // Validasi input dengan pesan khusus
        $request->validate([
            'username' => 'required', // Field 'name' harus diisi dan panjangnya maksimal 255 karakter
            'password' => 'required|min:3', // Field 'pass' harus diisi dan minimal 6 karakter
        ], [
            'name.required' => 'Username harus diisi.', // Pesan khusus untuk validasi 'required' pada field username
            'pass.required' => 'Password harus diisi.', // Pesan khusus untuk validasi 'required' pada field password
            'pass.min' => 'Password minimal 3 karakter.', // Pesan khusus untuk validasi 'min' pada field password
        ]);

        $data = DB::table('users')->where('name', '=', $request->name)->first(['id', 'user_type', 'password']);

        if ($data && Hash::check($request->pass, $data->password)) {
            $request->session()->put('user_id', $data->id);
            $request->session()->put('user_type', $data->user_type);
            if ($data->user_type == 'user') {
                return redirect('/dashboard');
            } else {
                return redirect('/admin');
            }
        } else {
            return redirect('/')->withErrors(['auth' => 'Username atau password salah.']);
        }
    }


    public function logout(Request $req){
        $req->session()->flush('user_id');
        return redirect('/');
    }
}
