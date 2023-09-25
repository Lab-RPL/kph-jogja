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
        ->paginate(1000000);
    
    
        return view('data-utama.inventaris', ['data' => $data]); 
    }

    public function index_tgk(Request $req,){

        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }



        $data = DB::table('data_tegak')->paginate(10000000);
        return view('data-utama.inventarisTegakan',['data' => $data]);
    }

    public function create(){

        $petak = petak::all();
        return view('data-utama.inventarisStore')->with('petak', $petak);
    }

    public function create_tgk(){
        
    }

    public function store(Request $request)
    {
        return view('data-utama.inventarisHasil');
    //     $request->validate([
    //         'id_ptk' => 'required|exists:petak,id_ptk',
    //         'tanggal' => 'required|date',
    //         'no_PU' => 'required|integer',
    //         'koor_x' => 'required|numeric',
    //         'koor_Y' => 'required|numeric',
    //         'tanam_sela' => 'required|string',
    //         'tahun_tanam' => 'required|integer',
    //         'jarak_tanam' => 'required|numeric',
    //         'umur_tgk' => 'required|integer',
    //         'keadaan_kes' => 'required|string',
    //         'kemurnian' => 'required|string',
    //         'bentuk_lap' => 'required|string',
    //         'derajat_lereng' => 'required|string',
    //         'kerataan_lap' => 'required|string',
    //         'jns_tanah' => 'required|string',
    //         'kedalaman' => 'required|string',
    //         'jns_bwh' => 'required|string',
    //         'kerapatan' => 'required|string',
    //         'penemuan' => 'required|string',
    //         'erosi' => 'required|string',
    //         'ketinggian_tempat' => 'required|numeric',
    //     ]);

    //     dataUtama::create([

    //         'id_ptk' => $request->petak_pu,
    //         'tanggal' => $request->tanggal,
    //         'no_PU' => $request->no_PU,
    //         'koor_x' => $request->koor_x,
    //         'koor_Y' => $request->koor_y,
    //         'tanam_sela' => $request->tanam_sela,
    //         'tahun_tanam' => $request->tahun_tanam,
    //         'jarak_tanam' => $request->jarak_tanam,
    //         'umur_tgk' => $request->umur_tgk,
    //         'keadaan_kes' => $request->keadaan_kes,
    //         'kemurnian' => $request->kemurnian,
    //         'bentuk_lap' => $request->bentuk_lap,
    //         'derajat_lereng' => $request->derajat_lereng,
    //         'landai_lereng' => $request->landai_lereng,
    //         'kerataan_lap' => $request->kerataan_lap,
    //         'jns_tanah' => $request->jns_tanah,
    //         'kedalaman' => $request->kedalaman,
    //         'dalaman' => $request->dalaman,
    //         'jns_bwh' => $request->jns_bwh,
    //         'kerapatan' => $request->kerapatan,
    //         'penemuan' => $request->penemuan,
    //         'erosi' => $request->erosi,
    //         'tinggi_tempat' => $request->tinggi_tempat,
    //     ]);

    //     return redirect()->route('data-utama.index', $request->id_ptk)
    //                     -> with('pesan', 'Data berhasil ditambahkan');
    // }
    }

    public function store_tgk(){

    }

    public function edit() {
        return view('data-utama.inventarisChange');
    }

    public function edit_tgk(){

    }

    public function update(){

    }

    public function update_tgk(){

    }

    public function destroy(){

    }

    public function destroy_tgk(){

    }
}
