<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class petakController extends Controller
{
    public function index($req){
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $data = DB::table('petak')->paginate(5);
        return view('petak.petak', ['data' => $data]);
    }
}
