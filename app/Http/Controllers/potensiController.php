<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hhbk;
use App\Models\hhk;

class potensiController extends Controller
{
    public function index(Request $req)
    {
        // if(!$req->session()->exists("user_id")){
        //     return redirect('/');
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $data = hhbk::where('IsDelete',0)->paginate(5);
        return view("potensi-hutan.potensi-hutan",['data'=>$data]);
    }

    public function create_hhk()
    {
        
        return view('potensi-hutan.tambah-potensi-hutan-hhk');
    }
    public function create_hhbk()
    {
        
        return view('potensi-hutan.tambah-potensi-hutan-hhbk');
    }

    public function store_hhk(Request $request)
    {

        $hhbk = new hhk();

        $hhbk->jenis_tgk = $request->jenis_tgk;
        $hhbk->save();
        return redirect('/data-potensi')->with('pesan', 'Data HHK Berhasil Disimpan');
    }
    public function store_hhbk(Request $request)
    {

        $hhbk = new hhbk();

        $hhbk->jenis_tgk = $request->jenis_tgk;
        $hhbk->save();
        return redirect('/data-potensi')->with('pesan', 'Data HHBK Berhasil Disimpan');
    }

    public function destroy($id)
    {


        return redirect()->back()->with('pesan', 'Data Hasil Hutan berhasil Dihapus');
    }

    public function edit_hhk($id)
    {
        $hhk = hhk::where('id_hhk', $id)->first();
        return view('potensi-hutan.edit-potensi-hutan-hhk', ['hhk' => $hhk]);
    }
    public function edit_hhbk($id)
    {
        $hhbk = hhbk::where('id_hhbk', $id)->first();
        return view('potensi-hutan.edit-potensi-hutan-hhbk', ['hhbk' => $hhbk]);
    }

    public function update_hhk(Request $request, $id)
    {
        $this->validate($request, [
            'id_hhk'    => 'required',
            'jenis_tgk'  => 'required',
        ]);
        
        $hhk = hhk::where('id_hhk', $id)->first();
        $hhk->jenis_tgk = $request->jenis_tgk;
        $hhk->save();
        return redirect('/data-potensi')->with('pesan', 'Data HHK Berhasil Diperbaharui');
    }
    
    public function update_hhbk(Request $request, $id)
    {
        $this->validate($request, [
            'id_hhbk'    => 'required',
            'jenis_tgk'  => 'required',
        ]);
        
        $hhbk = hhbk::where('id_hhbk', $id)->first();
        $hhbk->jenis_tgk = $request->jenis_tgk;
        $hhbk->save();
        return redirect('/data-potensi')->with('pesan', 'Data HHBK Berhasil Diperbaharui');
    }
}
