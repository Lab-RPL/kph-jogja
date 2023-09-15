<?php

namespace App\Http\Controllers;

use App\Models\pnbp;
use Illuminate\Http\Request;

class pnbpController extends Controller
{
    public function index(Request $req)
    {
        // if(!$req->session()->exists("user_id")){
        //     return redirect('/');
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $data = pnbp::where('IsDelete',0)->paginate(5);
        return view('pnbp.pnbp', ['data' => $data,]);
    }
}
