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
        $luasHutan->update($request->all());

        return redirect('/data-luas')->with('pesan', 'Data berhasil diubah.');
    }
}
