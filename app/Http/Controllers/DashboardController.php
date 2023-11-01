<?php

namespace App\Http\Controllers;

use App\Models\hhk;
use App\Models\produksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //

    public function index(Request $req){
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

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

    public function getPieChartData() {
        $bdhData = DB::table('bdh')
        ->select('nama_bdh', 'luas_bdh')
        ->where('IsDelete', 0)
        ->orderBy('nama_bdh', 'asc')
        ->get();

        return response()->json($bdhData);
    }

    //ini baru
    public function getPieChartDataPotensi() {
        $potensiData = DB::table('hhk')
        ->select('jenis_tgk', 'koreksi')
        ->where('IsDelete', 0)
        // ->orderBy('jenis_tgk', 'asc')
        ->get();

        return response()->json($potensiData);
    }

    public function getPieChartDataProduksi() {
        $produksiData = DB::table('produksi')
        ->select('id_ptk', 'berat_volume')
        ->where('IsDelete', 0)
        // ->orderBy('id_ptk', 'asc')
        ->get();

        return response()->json($produksiData);
    }


}