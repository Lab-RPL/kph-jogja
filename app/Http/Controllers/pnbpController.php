<?php

namespace App\Http\Controllers;

use App\Models\pnbp;
use Illuminate\Http\Request;

class pnbpController extends Controller
{
    public function index(Request $req)
    {
        // if(!$req->session()->exists("user_id")){
        //     return redirect('/');
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $data = pnbp::where('IsDelete',0)->paginate(1000000000000000000000);
        return view('pnbp.pnbp', ['data' => $data,]);
    }
    public function create()
    {
        
        return view('pnbp.tambah-pnbp');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun_pnbp' => 'required',
            'nominal_pnbp' => 'required|numeric',
        ]);
    
        $pnbp = new pnbp();
    
        $pnbp->tahun_pnbp = $request->tahun_pnbp;
        $pnbp->nominal_pnbp = $request->nominal_pnbp; // Format angka di sini
        $pnbp->save();
    
        return redirect('/data-pnbp')->with('pesan', 'Data pnbp Berhasil Disimpan');
    }
    
    public function destroy($id_pnbp)
    {
        $pnbp_entry = pnbp::where('id_pnbp', $id_pnbp)->first();
        $pnbp_entry->IsDelete = 1;
        $pnbp_entry->save();

        return redirect()->back()->with('pesan', 'Data PNBP berhasil Dihapus');
    }
    public function edit($id)
    {
        $pnbp = pnbp::where('id_pnbp', $id)->first();
        return view('pnbp.edit-pnbp', ['pnbp' => $pnbp]);
    }
    public function update(Request $request, $id)
{
    $this->validate($request, [
        'tahun_pnbp' => 'required',
        'nominal_pnbp' => 'required',
    ]);
    
    $pnbp = pnbp::where('id_pnbp', $id)->first();
    $pnbp->tahun_pnbp = $request->tahun_pnbp;
    $pnbp->nominal_pnbp = $request->nominal_pnbp;
    $pnbp->save();

    return redirect('/data-pnbp')->with('pesan', 'Data PNBP Berhasil Diperbaharui');
}


}
