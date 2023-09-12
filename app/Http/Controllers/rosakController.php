<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rosakController extends Controller
{
    public function index(Request $req)
    {
        // if(!$req->session()->exists("user_id")){
        //     return redirect('/');
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }
    }
}
