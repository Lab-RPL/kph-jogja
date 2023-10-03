<?php

namespace App\Http\Controllers;

use App\Models\rosak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class rosakController extends Controller
{
    public function index(Request $req)
    {
        // if(!$req->session()->exists("user_id")){
        //     return redirect('/');
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $data = DB::table('rusak_hilang')
        ->join('data_utama','rusak_hilang.id_PU','=','data_utama.id_PU')
        ->select('rusak_hilang.*','data_utama.no_PU')
        ->get();
        return view('rosak.rosak',compact('data'));
    }
}
