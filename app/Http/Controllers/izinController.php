<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\izin;

class izinController extends Controller
{
    public function index(Request $req) {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $data = izin::where('IsDelete',0)->paginate(5);
        return view("izin.izin", ['data'=>$data]);
    }

    public function create(){
        return view('izin.tambah-izin');
    }

    public function store(Request $request){
        $izin = new izin();

        $izin->nama_kelompok = $request->nama_kelompok;
        $izin->no_SK = $request->no_SK;
        $izin->petak_izin = $request->petak_izin;
        $izin->luas_izin = $request->luas_izin;
        $izin->save();

        return redirect('/data-izin')->with('pesan', 'Data Perizinan Berhasil Disimpan');
    }

    public function edit($id){
        $izin = izin::where('id_izin', $id)->first();
        return view('izin.edit-izin', ['izin' => $izin]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'id_izin' => 'required',
            'nama_kelompok' => 'required',
            'petak_izin' => 'required',
            'luas_izin' => 'required'
        ]);

        $izin = izin::where('id_izin', $id)->first();
        $izin->nama_kelompok = $request->nama_kelompok;
        $izin->no_SK = $request->no_SK;
        $izin->petak_izin = $request->petak_izin;
        $izin->luas_izin = $request->luas_izin;
        $izin->save();

        return redirect('/data-izin')->with('pesan', 'Data Perizinan Berhasil Diperbaharui');
    }

    public function destroy($id_izin){
        $izin_entry = izin::where('id_izin', $id_izin)->first();
        $izin_entry->IsDelete = 1;
        $izin_entry->save();

        return redirect()->back()->with('pesan', 'Data Perizinan Berhasil Dihapus');
    }
}
