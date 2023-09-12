<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class auth extends Controller
{
    //
    public function login(){
        return view('login');
    }

    public function masuk(Request $req)
    {
        $data = DB::table('users')->where('name', '=', $req->name)->first(['id', 'user_type', 'password']);
    
        if ($data && Hash::check($req->pass, $data->password)) {
            $req->session()->put('user_id', $data->id);
            if ($data->user_type == 'user') {
                return redirect('/dashboard');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function logout(Request $req){
        $req->session()->flush('user_id');
        return redirect('/');
    }
}
