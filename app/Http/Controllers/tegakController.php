<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\dataTegak;
use App\Models\dataUtama;
use App\Models\hhk;
use App\Models\hhbk;
use Illuminate\Http\Request;

class tegakController extends Controller
{
    public function index(Request $req, $id_PU)
    {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $data = DB::table('data_tegak')
            ->join('data_utama', 'data_utama.id_PU', '=', 'data_tegak.id_PU')
            ->leftJoin('hhbk', 'data_tegak.id_hhbk', '=', 'hhbk.id_hhbk')
            ->leftJoin('hhk', 'data_tegak.id_hhk', '=', 'hhk.id_hhk')
            ->where('data_tegak.id_PU', $id_PU)
            ->where('data_tegak.IsDelete', 0)
            ->select('data_tegak.*', 'hhbk.jenis_tgk as hhbk_jenis_tgk', 'hhk.jenis_tgk as hhk_jenis_tgk')
            ->paginate(100000000);

        return view('data-tegakan.inventarisTegakan', ['data' => $data, 'id_PU' => $id_PU]);
    }

    // $tgk_data = dataTegak::with('dataUtama')
    //     ->where('id_PU', $id_PU)
    //     ->get();
    // $data = DB::table('data_tegak')
    //     ->where('id_PU', $id_PU,)
    //     ->where('IsDelete',0)
    //     ->paginate(100000000);
    // // $bdh_data = Bdh::all();

    // // Mengambil id_bdh dari yang dipilih
    // return view('data-tegakan.inventarisTegakan', ['data' => $data, 'tgk_data' => $tgk_data, 'id_PU' => $id_PU]);


    public function create(Request $request)
    {
        $dataUtama = dataUtama::all();
        // Mengambil bdh dari query "bdh" (Cth ?bdh=1) dan return null jika tidak ada
        $selectedDataUtama = $request->query("data_utama", null);
        return view('data-tegakan.tambah-tegakan', compact("dataUtama", "selectedDataUtama"));
    }

    public function getJenisTgk($type)
    {
        if ($type == '0') {
            //Fetch hhk data
            $jenisTgk = hhk::all();
        } elseif ($type == '1') {
            //Fetch hhbk data
            $jenisTgk = hhbk::all();
        }
        return response()->json($jenisTgk);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_PU'    => 'required',
            'no_pohon'=> 'required',
            'potensi_ptk'=> 'required',
            'diameter'  => 'required',
            'tinggi'  => 'required',
            'id_tgk' => 'required',
        ]);

        dataTegak::create([
            'id_PU' => $request->id_PU,
            'no_pohon' => $request->no_pohon,
            'id_hhk' => $request->potensi_ptk == 0 ? $request->id_tgk : null,
            'id_hhbk' => $request->potensi_ptk == 1 ? $request->id_tgk : null,
            'diameter' => $request->diameter,
            'tinggi' => $request->tinggi,
            'id_tgk' => $request->jenis_tgk,
        ]);

        return redirect()->route('data-tgk.index', $request->id_PU) // Gantikan dengan nama route yang sesuai
            ->with('pesan', 'Data Tegakan berhasil ditambahkan.');
    }

    public function edit($id){
        $dataTegak = dataTegak::findOrFail($id);
        $utama = dataUtama::where('IsDelete', 0)->get();
        
        return view('data-tegakan.edit-tegakan', ['dataTegak' => $dataTegak, 'utama' => $utama]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'id_PU'    => 'required',
            'no_pohon'=> 'required',
            'potensi_ptk'=> 'required',
            'diameter'  => 'required',
            'tinggi'  => 'required',
        ]);

        $dataTegak = dataTegak::findOrFail($id);

        $dataTegak->id_PU     = $request->id_PU;
        $dataTegak->no_pohon = $request->no_pohon;
        $dataTegak->potensi_ptk = $request->potensi_ptk;
        $dataTegak->id_tgk = $request->jenis_tgk;
        $dataTegak->id_hhk = $request->potensi_ptk == 0 ? $request->id_tgk : null;
        $dataTegak->id_hhbk = $request->potensi_ptk == 1 ? $request->id_tgk : null;
        $dataTegak->diameter  = $request->diameter;
        $dataTegak->tinggi  = $request->tinggi;
    
        $dataTegak->save();
    
        return redirect()->route('data-tgk.index', $request->id_PU)->with('pesan',"Data Tegakan Berhasil Diupdate"); // Gantikan dengan nama route yang sesuai
        
    }

    public function destroy($id_tgk)
    {

        $dataTegak_entry = dataTegak::where('id_tgk', $id_tgk)->first();
        $dataTegak_entry->IsDelete = 1;
        $dataTegak_entry->save();

        return redirect()->back()->with('pesan', 'Data Tegakan berhasil Dihapus');
    }
}
