<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bdhController extends Controller
{
    public function index()
    {
    	// if(!$req->session()->exists("user_id")){
        //     return redirect('/');
        
        $data = DB::table('bdh')->paginate(1);
        return view('bdh',['data'=>$data]);
    }
}
