<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\dataUtama;

class inventarisController extends Controller
{
    public function index(Request $req)
    {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $data = DB::table('data_utama')->paginate(5);
        return view('data-utama.inventaris', ['data' => $data]); 
    }

    public function create(){
        return view('');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'id_ptk' => 'required|exists:petak,id_ptk',
            'no_PU' => 'required|integer',
            'koor_x' => 'required|numeric',
            'koor_Y' => 'required|numeric',
            'tanam_sela' => 'required|string',
            'tahun_tanam' => 'required|integer',
            'jarak_tanam' => 'required|numeric',
            'umur_tgk' => 'required|integer',
            'keadaan_kes' => 'required|string',
            'keadaan_tgk' => 'required|string',
            'kemurnian' => 'required|string',
            'bentuk_lap' => 'required|string',
            'derajat_lereng' => 'required|string',
            'kerataan_lap' => 'required|string',
            'jns_tanah' => 'required|string',
            'kedalaman' => 'required|string',
            'jns_bwh' => 'required|string',
            'kerapatan' => 'required|string',
            'penemuan' => 'required|string',
            'erosi' => 'required|string',
            'ketinggian_tempat' => 'required|numeric',
        ]);

        dataUtama::create($validatedData);

        return redirect('/data-utama')->with('pesan', 'Data berhasil ditambahkan');
    }

    public function show($id){
        return view('data-utama.edit-utama');
    }

    public function edit($id){

    }
}
