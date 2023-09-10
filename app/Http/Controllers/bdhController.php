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
        $data = DB::table('bdh')->paginate(5);
        return view('bdh.bdh', ['data' => $data, 'title' => $title]);
    }
    
    public function index2(Request $req)
    {
        // if(!$req->session()->exists("user_id")){
        //     return redirect('/');
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $data = DB::table('bdh')->paginate(5);
        return view('bdh.bdh-read', ['data' => $data]);
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
        $bdh->luas_bdh = $request->luas_bdh;
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

        // Ubah 'IsDelete' menjadi '1' untuk semua entri 'rph' yang ditemukan
        foreach ($rph_entries as $entry) {
            $entry->IsDelete = 1;
            $entry->save();
        }

        // Setelah semua entri 'rph' terkait diperbarui, perbarui entri 'bdh'
        $bdh_entry = bdh::where('id_bdh', $id_bdh)->first();
        $bdh_entry->IsDelete = 1;
        $bdh_entry->save();

        return redirect('/data-bdh')->with('pesan', 'Data BDH dan RPH terkait berhasil Dihapus');
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
