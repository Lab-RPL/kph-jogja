<?php

namespace App\Http\Controllers;

use App\Models\produksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\hhbk;
use App\Models\petak;

class produksiController extends Controller
{
    //

        public function index(Request $req)
        {
            if (!$req->session()->has('user_id')) {
                return redirect('/');
            }
            $data = DB::table('produksi as prod')
            ->join('petak as ptk', 'prod.id_ptk', '=', 'ptk.id_ptk')
            ->join('rph', 'ptk.id_rph', '=', 'rph.id_rph')
            ->join('bdh', 'rph.id_bdh', '=', 'bdh.id_bdh')
            ->leftJoin('hhk', 'ptk.id_hhk', '=', 'hhk.id_hhk')
            ->leftJoin('hhbk', 'ptk.id_hhbk', '=', 'hhbk.id_hhbk')
            ->select('prod.*','bdh.nama_bdh', 'rph.nama_rph', 'ptk.nomor_ptk', 'prod.berat_volume', 'hhk.jenis_tgk','hhbk.jenis_tgk as jenis_tgk_hhbk')
            ->where('prod.IsDelete', 0)
            ->paginate(10000000000);
        
                
                return view("produksi-hutan.produksi-hutan",compact("data"));
            }
        
        // ->join('hhk', 'petak.id_hhk', '=', 'hhk.id_hhk')
        // ->join('hhbk', 'petak.id_hhbk', '=', 'hhbk.id_hhbk')

    public function create(Request $request){

        $selectedTgk = $request->query('hhbk','', null);
        $jenis_tgk = hhbk::all();
        $petak = petak::all();
        return view('produksi-hutan.tambah-produksi-hutan', compact('petak','jenis_tgk','selectedTgk'));

    }

    public function getJenisTegakan($id_ptk)
    {
        $jenisTegakan = DB::table("petak")
            ->leftJoin("hhk", "petak.id_hhk", "=", "hhk.id_hhk")
            ->leftJoin("hhbk", "petak.id_hhbk", "=", "hhbk.id_hhbk")
            ->where("petak.id_ptk", $id_ptk)
            ->select("hhk.jenis_tgk as jenis_tgk_hhk", "hhbk.jenis_tgk as jenis_tgk_hhbk")
            ->get();
    
        return response()->json($jenisTegakan);
    }

    public function store(Request $request){

        $prod = new produksi();

        $prod->id_ptk = $request->id_ptk;
        $prod->berat_volume = $request->berat_volume;
        $prod->save();

        return redirect()
        ->route('produksi.index', $request->id_ptk)
        ->with('pesan', 'Data Produksi Hasil Hutan Berhasil Ditambahkan');
    }

    public function edit($id_prod){

        $data = DB::table('produksi')
            ->join('petak', 'produksi.id_ptk', '=', 'petak.id_ptk')
            ->select('produksi.*', 'petak.nomor_ptk')
            ->where('produksi.id_prod', $id_prod)
            ->where('produksi.IsDelete', 0)
            ->first();
        
        $petak = Petak::all();

        if (!$data) {
            abort(404);
        }

        return view('produksi-hutan.edit-produksi-hutan', ['data' => $data, 'petak' => $petak]);
    }

    public function update(Request $request, $id){
      

        $prod = produksi::where('id_prod', $id)->first();
        $prod->id_ptk = $request->id_ptk;
        $prod->berat_volume = $request->berat_volume;
        $prod->save();

        return redirect()->route('produksi.index')->with('pesan', 'Data Produksi Hasil Hutan Berhasil Diperbaharui');
    }

    public function destroy($id_prod){
        $dataProd_entry = produksi::where('id_prod', $id_prod)->first();
        $dataProd_entry->IsDelete = 1;
        $dataProd_entry->save();

        return redirect()->back()->with('pesan', 'Data Hasil Produksi Hutan Berhasil Dihapus');
    }
}
