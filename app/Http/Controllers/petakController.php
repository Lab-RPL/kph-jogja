<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\rph;
use App\Models\petak;
use Illuminate\Http\Request;

class petakController extends Controller
{
    public function index(Request $req, $id_rph)
    {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }
    
        $petak_data = petak::with('rph')
            ->where('id_rph', $id_rph)
            ->paginate(5);
        $data = DB::table('petak')
            ->where('id_rph', $id_rph)
            ->paginate(5);
        return view('petak.petak', ['data' => $data, 'ptk_data' => $petak_data]);
    }

    public function index2(Request $req)
    {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }
        $data = Petak::all();
        return view('petak.petak-read', ['data' => $data]);
    }    
    public function create()
    {
        $rph = rph::all();
        return view('petak.tambah-petak')->with('rph', $rph);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_rph' => 'required',
            'nomor_ptk' => 'required',
            'luas_ptk' => 'required',
            'potensi_ptk' => 'required', 
        ]);

        Petak::create([
            'id_rph' => $request->id_rph,
            'nomor_ptk' => $request->nomor_ptk,
            'luas_ptk' => $request->luas_ptk,
            'potensi_ptk' => $request->potensi_ptk,
        ]);

        return redirect()->route('petak.index', $request->id_rph)
                        ->with('pesan', 'Data Petak berhasil ditambahkan.');
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function destroy(){

    }
}