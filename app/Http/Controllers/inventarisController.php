<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Models\petak;
use App\Models\dataUtama;
use Illuminate\Http\Request;

class inventarisController extends Controller
{
    public function index(Request $req,)
    {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }
        
        // $utama_data = dataUtama::with('petak')
        //     ->where('id_ptk', $id_ptk)
        //     ->paginate(5);
        // $data = DB::table('data-utama')
        //     ->where('id_ptk', $id_ptk)
        //     ->where('IsDelete',0)
        //     ->paginate(5);
        // return view('data-utama.inventaris', ['data' => $data, 'utama_data' => $utama_data]);
        $data = DB::table('data_utama')
        ->join('petak', 'data_utama.id_ptk', '=', 'petak.id_ptk')
        ->join('rph', 'petak.id_rph', '=', 'rph.id_rph')
        ->join('bdh', 'rph.id_bdh', '=', 'bdh.id_bdh')
        ->select('data_utama.*', 'petak.nomor_ptk', 'rph.nama_rph', 'bdh.nama_bdh','data_utama.koor_x', 'data_utama.koor_y')
        ->where('data_utama.IsDelete',0)
        ->paginate(1000000);
        
        
    
        return view('data-utama.inventaris', compact('data')); 
    }

    public function index_detail(Request $req,){
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $data = DB::table('data_utama');
        return view('data-utama.inventarisHasil',['data' => $data]);
    }

    public function create(){

        $petak = petak::all();
        return view('data-utama.inventarisStore', ['petak' => $petak]);
    }

    public function store(Request $request)
    {
        
        // $request->validate([
        //     'tanggal' => 'required',
        //     'id_ptk' => 'required',
        //     'no_PU' => 'required',
        //     'koor_x' => 'required',
        //     'koor_y' => 'required',
        //     'tanam_sela' => 'required',
        //     'tahun_tanam' => 'required',
        //     'jarak_tanam' => 'required',
        //     'umur_tgk' => 'required',
        //     'keadaan_kes' => 'required',
        //     'kerataan_tgk' => 'required',
        //     'kemurnian' => 'required',
        //     'bentuk_lap' => 'required',
        //     'derajat_lereng' => 'required',
        //     'landai_lereng' => 'required',
        //     'kerataan_lap' => 'required',
        //     'jns_tanah' => 'required',
        //     'kedalaman' => 'required',
        //     'dalaman' => 'required',
        //     'jns_bwh' => 'required',
        //     'kerapatan' => 'required',
        // ]);

        dataUtama::create([

            'tanggal' => $request->tanggal,
            'id_ptk' => $request->id_ptk,
            'no_PU' => $request->no_PU,
            'koor_x' => $request->koor_x,
            'koor_y' => $request->koor_y,
            'tanam_sela' => $request->tanam_sela,
            'tahun_tanam' => $request->tahun_tanam,
            'jarak_tanam' => $request->jarak_tanam,
            'umur_tgk' => $request->umur_tgk,
            'keadaan_kes' => $request->keadaan_kes,
            'kerataan_tgk' => $request->kerataan_tgk,
            'kemurnian' => $request->kemurnian,
            'bentuk_lap' => $request->bentuk_lap,
            'derajat_lereng' => $request->derajat_lereng,
            'landai_lereng' => $request->landai_lereng,
            'kerataan_lap' => $request->kerataan_lap,
            'jns_tanah' => $request->jns_tanah,
            'kedalaman' => $request->kedalaman,
            'dalaman' => $request->dalaman,
            'jns_bwh' => $request->jns_bwh,
            'kerapatan' => $request->kerapatan,
            'penemuan' => $request->penemuan,
            'erosi' => $request->erosi,
            'tinggi_tempat' => $request->tinggi_tempat,
        ]);

        return redirect()->route('data-utama.index', $request->id_ptk )
                        -> with('pesan', 'Data berhasil ditambahkan');
    
    }

    public function edit($id) {
        $dataUtama = dataUtama::where('id_PU', $id)->first();
        return view('data-utama.inventarisChange', ['dataUtama' => $dataUtama]);
    }

    public function update(Request $request, $id){

        $dataUtama = dataUtama::where('id_PU', $id)->first();
        $dataUtama->tanggal = $request->tanggal;
        $dataUtama->id_ptk = $request->id_ptk;
        $dataUtama->no_PU = $request->no_PU;
        $dataUtama->koor_x = $request->koor_x;
        $dataUtama->koor_y = $request->koor_y;
        $dataUtama->tanam_sela = $request->tanam_sela;
        $dataUtama->tahun_tanam = $request->tahun_tanam;
        $dataUtama->jarak_tanam = $request->jarak_tanam;
        $dataUtama->umur_tgk = $request->umur_tgk;
        $dataUtama->keadaan_kes = $request->keadaan_kes;
        $dataUtama->kerataan_tgk = $request->kerataan_tgk;
        $dataUtama->kemurnian = $request->kemurnian;
        $dataUtama->bentuk_lap = $request->bentuk_lap;
        $dataUtama->derajat_lereng = $request->derajat_lereng;
        $dataUtama->landai_lereng = $request->landai_lereng;
        $dataUtama->kerataan_lap = $request->kerataan_lap;
        $dataUtama->jns_tanah = $request->jns_tanah;
        $dataUtama->kedalaman = $request->kedalaman;
        $dataUtama->dalaman = $request->dalaman;
        $dataUtama->jns_bawah = $request->jns_bwh;
        $dataUtama->kerapatan = $request->kerapatan;
        $dataUtama->penemuan = $request->penemuan;
        $dataUtama->erosi = $request->erosi;
        $dataUtama->tinggi_tempat = $request->tinggi_tempat;
        $dataUtama->save();
        return redirect()->route('data-utama.index')->with('pesan', 'Data Petak Ukur Berhasil Di Perbaharui');
    }

    public function destroy($id_PU)
    {
        $dataUtama_entry = dataUtama::where('id_PU', $id_PU)->first();
        $dataUtama_entry->IsDelete = 1;
        $dataUtama_entry->save();

        return redirect()->back()->with('pesan', 'Data Petak Ukur berhasil Dihapus');
    }
}
