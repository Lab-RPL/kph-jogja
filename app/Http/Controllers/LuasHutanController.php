<?php

namespace App\Http\Controllers;

use App\Models\LuasHutan;
use Illuminate\Http\Request;

class LuasHutanController extends Controller
{
    public function index()
    {
        $luasHutan = LuasHutan::where('IsDelete', 0)->get();
        return view('luas-hutan.luas-hutan', compact('luasHutan'));
    }

    public function edit($id)
    {
        $luasHutan = LuasHutan::findOrFail($id);
        return view('luas-hutan.edit-luas-hutan', compact('luasHutan'));
    }

    public function update(Request $request, $id)
    {
        $luasHutan = LuasHutan::findOrFail($id);
        $luasHutan->luas_lindung = str_replace(' Ha', '', $request->luas_lindung);
        $luasHutan->luas_produksi = str_replace(' Ha', '', $request->luas_produksi);
        $luasHutan->save();
    
        return redirect('/data-luas')->with('pesan', 'Data berhasil diubah.');
    }

    public function create()
    {
        return view('luas-hutan.tambah-luas-hutan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'luas_lindung' => 'required|numeric',
            'luas_produksi' => 'required|numeric',
        ]);

        $luasHutan = new LuasHutan();
        $luasHutan->luas_lindung = $request->luas_lindung;
        $luasHutan->luas_produksi = $request->luas_produksi;
        $luasHutan->save();

        return redirect('data-luas')->with('pesan', 'Data berhasil ditambahkan.');
    }
}
