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

        $petak_data = Petak::with('rph')
            ->where('id_rph', $id_rph)
            ->get();
        $data = DB::table('petak')
            ->where('id_rph', $id_rph)
            ->paginate(5);
        return view('petak.petak', ['data' => $data, 'petak_data' => $petak_data]);

    }

    public function create()
    {
        $rph = rph::all();
        return view('petak.tambah-petak')->with('rph', $rph);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_bdh' => 'required', 
            'id_rph' => 'required',
            'nama_ptk' => 'required',
            'luas_ptk' => 'required',
            'potensi_ptk' => 'required', 
        ]);

        Petak::create([
            'id_bdh' => $request->id_bdh,
            'id_rph' => $request->id_rph,
            'nama_ptk' => $request->nama_ptk,
            'luas_ptk' => $request->luas_ptk,
            'potensi_ptk' => $request->potensi_ptk,
        ]);

        return redirect()->route('petak.index', $request->id_rph)
                        ->with('pesan', 'Data Petak berhasil ditambahkan.');
    }
}