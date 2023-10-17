<?php

namespace App\Http\Controllers;

use App\Models\dataUtama;
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
    ->paginate(100000);
    return view('rosak.rosak',compact('data'));
}


    public function create(){
        $data = DB::table('data_utama')->get();
        return view('rosak.tambah-rosak',compact('data'));

    }

    public function store(Request $request){
        
        $image = $request->file('foto');
        $imageFileName = $this->generateRandomString();
        $image->move(public_path() . "/upload", $imageFileName);

        $rosak = new Rosak();
        $rosak->jns_rusak = $request->jns_rusak;
        $rosak->tgl_input = $request->tgl_input;
        $rosak->tgl_rusak = $request->tgl_rusak;
        $rosak->id_PU = $request->id_PU;
        $rosak->koor_x = $request->koor_x;
        $rosak->koor_y = $request->koor_y;
        $rosak->keterangan = $request->keterangan;
        $rosak->diameter = $request->diameter;
        $rosak->foto = $imageFileName;
        $rosak->save();


    // Set flash data dan redirect
    return redirect('/data-rusak')->with('pesan', 'Data Kerusakan/Kehilangan Berhasil Ditambahkan!');

    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function edit($id){
        // Ambil data rosak berdasarkan id
        // $rosak = Rosak::findOrFail($id);
        

        $rosak = DB::table('rusak_hilang')
        ->join('data_utama','rusak_hilang.id_PU','=','data_utama.id_PU')
        ->select('rusak_hilang.*','data_utama.no_PU')
        ->where('rusak_hilang.id_rusak',$id)
        ->where('rusak_hilang.IsDelete',0)
        ->first();       

        $data_utama = dataUtama::all();
        return view('rosak.edit-rosak',compact('rosak','data_utama'));
    } 
    

    public function update(Request $request, $id){

    
        $image = $request->file('foto');
        $imageFileName = $this->generateRandomString();
        $image->move(public_path() . "/upload", $imageFileName);

        $rosak = rosak::find($id);

        $rosak->jns_rusak = $request->jns_rusak;
        $rosak->tgl_input = $request->tgl_input;
        $rosak->tgl_rusak = $request->tgl_rusak;
        $rosak->id_PU = $request->id_PU;
        $rosak->koor_x = $request->koor_x;
        $rosak->koor_y = $request->koor_y;
        $rosak->keterangan = $request->keterangan;
        $rosak->foto = $imageFileName;

       
        

        $rosak->diameter = $request->diameter;
        $rosak->save();

        return redirect()->route('rosak.index')->with('pesan', 'Data Kerusakan/Kehilangan Berhasil Diupdate');

    }

    public function destroy($id_rusak){
        $rusak = rosak::find($id_rusak);
        if($rusak){
            $rusak->IsDelete = 1;
            $rusak->save();
        }else{
            return redirect()->back()->with('eror',"Data Not Found");
        }
        return redirect()->route('rosak.index')->with('pesan',"Data Berhasil Dihapus");
    }
}
