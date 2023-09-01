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

        $data = DB::table('bdh')->paginate(5);
        return view('bdh.bdh', ['data' => $data]);
    }

    //Menambah BDH LURR
    public function create()
    {
        return view('bdh.tambah-bdh');
    }

    public function store(Request $request)
    {

        $bdh = new Bdh();

        $bdh->nama_bdh = $request->nama_bdh;
        $bdh->kepala_bdh = $request->kepala_bdh;
        $bdh->luas_bdh = $request->luas_tanah;
        $bdh->save();
        return redirect('/data-bdh')->with('pesan', 'Data BDH Berhasil Disimpan');
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
        // Cari entri 'rph' yang terkait dengan 'id_bdh'
        $rph_entries = Rph::where('id_bdh', $id_bdh)->get();
    
        // Hapus semua entri 'rph' yang ditemukan
        foreach ($rph_entries as $entry) {
            $entry->delete();
        }
        // Setelah semua entri 'rph' terkait dihapus, hapus entri 'bdh'
        $bdh_entry = bdh::where('id_bdh', $id_bdh)->first();
        $bdh_entry->delete();
    
        return redirect('/data-bdh')->with('pesan', 'Data BDH dan RPH terkait berhasil dihapus');
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
        $bdh->luas_bdh = $request->luas_tanah;
        $bdh->save();
        return redirect('/data-bdh');
    }
}
