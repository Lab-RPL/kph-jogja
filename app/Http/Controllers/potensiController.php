<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hhbk;

class potensiController extends Controller
{
    public function index(Request $req)
    {
        // if(!$req->session()->exists("user_id")){
        //     return redirect('/');
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $title = "HHBK";
        $data = hhbk::where('IsDelete',0)->paginate(5);
        return view('potensi-hutan.potensi-hutan', ['data' => $data, 'title' => $title]);
    }

    public function create()
    {
        return view('potensi-hutan.potensi-hutan');
    }

    public function store(Request $request)
    {

        $hhbk = new hhbk();

        $hhbk->nama_wisata = $request->nama_wisata;
        $hhbk->lokasi_wisata = $request->lokasi_wisata;
        $hhbk->atraksi_wisata = $request->atraksi_wisata;
        $hhbk->save();
        return redirect('/data-potensi')->with('pesan', 'Data HHBK Berhasil Disimpan');
    }

    public function destroy($id_hhbk)
    {
        $hhbk_entry = hhbk::where('id_hhbk', $id_hhbk)->first();
        $hhbk_entry->IsDelete = 1;
        $hhbk_entry->save();

        return redirect('/data-potensi')->with('pesan', 'Data HHBK berhasil Dihapus');
    }
}
