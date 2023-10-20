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

        $data = hhbk::where('IsDelete',0)->paginate(100000000);
        $data1 = hhk::where('IsDelete',0)->paginate(100000000);
        return view("potensi-hutan.potensi-hutan",compact('data','data1'));
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

        $hhk = new hhk();

        $hhk->jenis_tgk = $request->jenis_tgk;
        $hhk->koreksi = $request->koreksi;
        $hhk->save();
        return redirect('/data-potensi')->with('pesan', 'Data Hasil Hutan Kayu Berhasil Disimpan');
    }
    public function store_hhbk(Request $request)
    {

        $hhbk = new hhbk();

        $hhbk->jenis_tgk = $request->jenis_tgk;
        $hhbk->save();
        return redirect('/data-potensi')->with('pesan', 'Data Hasil Hutan Bukan Kayu Berhasil Disimpan');
    }

    public function destroy_hhbk($id_hhbk){
        $hhbk = hhbk::find($id_hhbk);
        if($hhbk){
            $hhbk->IsDelete =1;
            $hhbk->save();
            return redirect()->back()->with('pesan',"Data Hasil Hutan Bukan Kayu Berhasil Dihapus");
        }
    }
    public function destroy_hhk($id_hhk){
        $hhk = hhk::find($id_hhk);
        if($hhk){
            $hhk->IsDelete =1;
            $hhk->save();
            return redirect()->back()->with('pesan',"Data Hasil Hutan Kayu Berhasil Dihapus");
        }
    }
   // Ubah fungsi destroy anda seperti ini.
// public function destroy_hhk($id) {
//     // Cek apakah ID tersebut ada di tabel hhk.
//     $hhk = Hhk::find($id);
//     if ($hhk) {
//         $hhk->IsDelete = 1;
//         $hhk->save();

//         return redirect()->back()->with('pesan', 'Data Hasil Hutan berhasil Dihapus');
//     }

//     // Cek apakah ID tersebut ada di tabel hhbk.
//     // $hhbk = Hhbk::find($id);
//     // if ($hhbk) {
//     //     $hhbk->IsDelete = 1;
//     //     $hhbk->save();
        
//     //     return redirect()->back()->with('pesan', 'Data Hasil Hutan berhasil Dihapus');
//     // }
    
//     // Kalau ID tersebut tak ada di kedua tabel, maka kasih pesan error.
//     return redirect()->back()->with('pesan', 'ID tidak ditemukan');
// }

// public function destroy_hhbk($id_hhbk){
//     $hhbk = hhbk::find($id_hhbk);
//     if ($hhbk) {
//         $hhbk->IsDelete = 1;
//         $hhbk->save();
//     }

//     return redirect()->back()->with('pesan','Data Hasil Bukan Kayu berhasil dihapus');
// }

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
            'jenis_tgk'  => 'required',
            'koreksi'  => 'required',
        ]);
        
        $hhk = hhk::where('id_hhk', $id)->first();
        $hhk->jenis_tgk = $request->jenis_tgk;
        $hhk->koreksi = $request->koreksi;
        $hhk->save();
        return redirect('/data-potensi')->with('pesan', 'Data Hasil Hutan Kayu Berhasil Diperbaharui');
    }
    
    public function update_hhbk(Request $request, $id)
    {
        $this->validate($request, [
            'jenis_tgk'  => 'required',
        ]);
        
        $hhbk = hhbk::where('id_hhbk', $id)->first();
        $hhbk->jenis_tgk = $request->jenis_tgk;
        $hhbk->save();
        return redirect('/data-potensi')->with('pesan', 'Data Hasil Hutan Bukan Kayu Berhasil Diperbaharui');
    }
}
