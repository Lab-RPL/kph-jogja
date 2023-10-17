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
        $totalPerizinan = DB::table('izin_kelola')->where('IsDelete',0)->count();
        $totalProduksi = DB::table('hhbk')->where('IsDelete',0)->count();
        $totalPotensi = DB::table('hhk')->where('IsDelete',0)->count();
        $totalPajak = DB::table('pnbp')->where('IsDelete',0)->count();
        return view('dashboard.dashboard',compact('totalbdh','totalrph','totalptk','totalinven','totalPerizinan','totalPotensi','totalPajak','totalProduksi'));
    }

    public function getChartData() {

        // Ambil data dari database
        $pnbpData = DB::table('pnbp')
                        ->select('tahun_pnbp', 'nominal_pnbp')
                        ->where('isDelete', 0)
                        ->orderBy('tahun_pnbp', 'asc')
                        ->get();
    
        // Kembalikan sebagai response JSON
        return response()->json($pnbpData);
    }
}