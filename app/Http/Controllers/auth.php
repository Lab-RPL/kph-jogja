<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class auth extends Controller
{
    //
    public function login(){
        return view('login');
    }

    public function masuk(Request $req){
        $data = DB::table('users')->where('name','=',$req->name)->where('password','=',$req->pass)->first(['id','user_type']);

        if($data !=null){
            $req->session()->put('user_id',$data->id);
            if($data->user_type=='user') return redirect('/data-utama');
            else return redirect('/');
        }else return redirect('/');
    }
}
