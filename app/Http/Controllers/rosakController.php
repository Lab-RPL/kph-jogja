<?php

namespace App\Http\Controllers;

use App\Models\rosak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class rosakController extends Controller
{
    public function index(Request $req)
    {
        // if(!$req->session()->exists("user_id")){
        //     return redirect('/');
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $data = DB::table('rusak_hilang')
        ->join('data_utama','rusak_hilang.id_PU','=','data_utama.id_PU')
        ->select('rusak_hilang.*','data_utama.no_PU')
        ->get();
        return view('rosak.rosak',compact('data'));
    }

    public function create(){
        $data = DB::table('data_utama')->get();
        return view('rosak.tambah-rosak',compact('data'));

    }

    public function store(Request $request){
        $rosak = new Rosak();
        $rosak->jns_rusak = $request->jns_rusak;
        $rosak->tgl_input = $request->tgl_input;
        $rosak->tgl_rusak = $request->tgl_rusak;
        $rosak->id_PU = $request->id_PU;
        $rosak->koor_x = $request->koor_x;
        $rosak->koor_y = $request->koor_y;

        if ($file = $request->file('foto')) {
            $name = time().$file->getClientOriginalName();
            $file->move('public/uploads', $name);
            
            $rosak->foto = $name;
        }
        

    $rosak->diameter = $request->diameter;
    $rosak->save();

    // Set flash data dan redirect
    return redirect('/data-rusak')->with('pesan', 'Data Kerusakan/Kehilangan Berhasil Ditambahkan!');

    }

    public function edit($id){
        // Ambil data rosak berdasarkan id
        $rosak = Rosak::findOrFail($id);
        
        return view('rosak.edit-rosak',compact('rosak'));
    } 
    

    public function update(Request $request, $id){

        $rosak = rosak::findOrFail($id);

        $rosak->jns_rusak = $request->jns_rusak;
        $rosak->tgl_input = $request->tgl_input;
        $rosak->tgl_rusak = $request->tgl_rusak;
        $rosak->id_PU = $request->id_PU;
        $rosak->koor_x = $request->koor_x;
        $rosak->koor_y = $request->koor_y;

        if ($file = $request->file('foto')) {
            $name = time().$file->getClientOriginalName();
            $file->move('public/uploads', $name);
            
            $rosak->foto = $name;
        }
        

        $rosak->diameter = $request->diameter;
        $rosak->save();

        return redirect()->route('rosak.index', $request->id_PU)->with('pesan', 'Data Kerusakan/Kehilangan Berhasil Diupdate');

    }


    public function destroy($id_rusak){
        $rusak = rosak::find($id_rusak);
        if ($rusak) {
            $rusak->IsDelete = 1;
            $rusak->save();
        } else {
            return redirect()->back()->with('error', 'Data not found');
        }
        return redirect()->route('rosak.index')->with('success', 'Data Kerusakan/Kehilangan Berhasil Dihapus.');
    }
    
}
