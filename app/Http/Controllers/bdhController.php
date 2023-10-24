<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\bdh;
use App\Models\rph;

class bdhController extends Controller
{
    public function index(Request $req)
    {
        // if(!$req->session()->exists("user_id")){
        //     return redirect('/');
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $title = "BDH";
        $data = bdh::where('IsDelete',0)->paginate(1000000);
        return view('bdh.bdh', ['data' => $data, 'title' => $title]);
    }
    
    public function index2(Request $req)
    {
        // if(!$req->session()->exists("user_id")){
        //     return redirect('/');
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $data = bdh::where('IsDelete',0)->paginate(1000000);
        return view('bdh.bdh-read', ['data' => $data]);
    }

    //Menambah BDH LURR
    public function create()
    {
        return view('bdh.tambah-bdh');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bdh' => 'required',
            'kepala_bdh' => 'required',
            'luas_bdh' => 'required|numeric',
        ]);
    
        $bdh = new Bdh();
        $bdh->nama_bdh = $request->nama_bdh;
        $bdh->kepala_bdh = $request->kepala_bdh;
        $bdh->luas_bdh = $request->luas_bdh;
        $bdh->save();
    
        return redirect('/data-bdh')->with('pesan', 'Data BDH Berhasil Disimpan');
    }

    public function create_read(){
        return view('bdh.tambah-bdh-read');
    }

    public function store_read(Request $request)
    {
        $request->validate([
            'nama_bdh' => 'required',
            'kepala_bdh' => 'required',
            'luas_bdh' => 'required|numeric',
        ]);
    
        $bdh = new Bdh();
        $bdh->nama_bdh = $request->nama_bdh;
        $bdh->kepala_bdh = $request->kepala_bdh;
        $bdh->luas_bdh = $request->luas_bdh;
        $bdh->save();
    
        return redirect('/bdh-read')->with('pesan', 'Data BDH Berhasil Disimpan');
    }
    

    //     public function update(Request $request, $id)
    //     {
    //         $bdh = Bdh::findOrFail($id);

    //         $bdh->nama_bdh = $request->nama_bdh;
    //         $bdh->kepala_bdh = $request->kepala_bdh;
    //         $bdh->luas_bdh = $request->luas_bdh;
    //         $bdh->save();

    //         return redirect('/data-bdh')->with('pesan', 'Data Buku Berhasil Diperbarui');
    //     }

    //     Hapus BDH
    public function destroy($id_bdh)
    {
        // Cari entri 'rph' yang terkait dengan 'id_bdh' dan 'IsDelete' masih 0
        $rph_entries = Rph::where('id_bdh', $id_bdh)->where('IsDelete', 0)->get();
        
        // Jika ada entri rph yang 'IsDelete' masih 0, maka return dengan pesan error
        if(!$rph_entries->isEmpty()) {
            return redirect('/data-bdh')->with('error', 'Data tidak bisa dihapus dikaranakan masih mempunyai RPH.');
        }
    
        // Jika tidak ada entri rph yang 'IsDelete' masih 0, maka lanjutkan ke proses penghapusan
        else {
            $bdh_entry = bdh::where('id_bdh', $id_bdh)->first();
    
            // Jika tidak ada entri bdh, maka return dengan pesan error
            if(!$bdh_entry) {
                return redirect('/data-bdh')->with('pesan', 'Data BDH tidak ditemukan.');
            }
    
            // Ubah 'IsDelete' menjadi '1' untuk entri 'bdh'
            $bdh_entry->IsDelete = 1;
            $bdh_entry->save();
    
            return redirect('/data-bdh')->with('pesan', 'Data BDH berhasil Dihapus');
        }
    }
    

    //   Edit BDH       

    public function edit($id)
    {
        $bdh = Bdh::where('id_bdh', $id)->first();
        return view('bdh.edit-bdh', ['bdh' => $bdh]);
    }

    public function update(Request $request, $id)
    {
        $bdh = Bdh::where('id_bdh', $id)->first();
        $bdh->nama_bdh = $request->nama_bdh;
        $bdh->kepala_bdh = $request->kepala_bdh;
        $bdh->luas_bdh = $request->luas_bdh;
        $bdh->save();
        return redirect('/data-bdh')->with('pesan', 'Data BDH Berhasil Di Perbaharui');
    }
}
