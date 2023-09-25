<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //

    public function index(){
        $totalbdh = DB::table('bdh')->where('IsDelete',0)->count();
        $totalinven = DB::table('data_utama')->where('IsDelete',0)->count();
        $totalrph = DB::table('rph')->where('IsDelete',0)->count();
        $totalptk = DB::table('petak')->where('IsDelete',0)->count();
        return view('dashboard.dashboard',compact('totalbdh','totalrph','totalptk','totalinven'));
    }
}
