<?php

namespace App\Http\Controllers;
use App\Models\hhk;
use App\Models\hhbk;
use Illuminate\Http\Request;
use App\Models\izin;
use App\Models\petak;
use Illuminate\Support\Facades\DB;

class izinController extends Controller
{
    public function index(Request $req)
    {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }
    
        $data = DB::table('izin_kelola')
            ->join('petak', 'izin_kelola.id_ptk', '=', 'petak.id_ptk')
            ->leftJoin('hhbk', 'petak.id_hhbk', '=', 'hhbk.id_hhbk')
            ->leftJoin('hhk', 'petak.id_hhk', '=', 'hhk.id_hhk')
            ->select('izin_kelola.*', 'petak.nomor_ptk', 'hhbk.jenis_tgk as hhbk_jenis_tgk', 'hhk.jenis_tgk as hhk_jenis_tgk')
            ->where('izin_kelola.IsDelete', 0)
            ->paginate(1000000);
    
        // Mengambil data dari model hhk dan hhbk
        $hhkData = hhk::all();
        $hhbkData = hhbk::all();
    
        return view('izin.izin', compact('data', 'hhkData', 'hhbkData'));
    }
    
    public function create(Request $request)
    {
        $selectedTgk = $request->query('hhbk','', null);
        $jenis_tgk = hhbk::all();
        $petak = petak::all();
        return view('izin.tambah-izin', compact('petak','jenis_tgk','selectedTgk'));
    }
    public function getJenisTegakan($id_ptk)
    {
        $jenisTegakan = DB::table("petak")
            ->where("id_ptk", $id_ptk)
            ->select('id_hhk', 'id_hhbk')
            ->get();
    
        return response()->json($jenisTegakan);
    }
    
    public function store(Request $request)
    {
        $izin = new izin();

        $izin->nama_kelompok = $request->nama_kelompok;
        $izin->no_SK = $request->no_SK;
        $izin->id_ptk = $request->petak_izin;
        $izin->luas_izin = $request->luas_izin;
        $izin->save();

        return redirect()
            ->route('izin.index', $request->id_ptk)
            ->with('pesan', 'Data Perizinan Berhasil Disimpan');
    }

    public function edit($id_izin)
    {

        $data = DB::table('izin_kelola')
            ->join('petak', 'izin_kelola.id_ptk', '=', 'petak.id_ptk')
            ->select('izin_kelola.*', 'petak.nomor_ptk')
            ->where('izin_kelola.id_izin', $id_izin)
            ->where('izin_kelola.IsDelete', 0)
            ->first();

        $petak = Petak::all();

        if (!$data) {
            abort(404);
        }

        return view('izin.edit-izin', ['data' => $data, 'petak' => $petak]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_izin' => 'required',
            'nama_kelompok' => 'required',
            'id_ptk' => 'required',
            'luas_izin' => 'required',
        ]);

        $izin = izin::where('id_izin', $id)->first();
        $izin->nama_kelompok = $request->nama_kelompok;
        $izin->no_SK = $request->no_SK;
        $izin->id_ptk = $request->petak_izin;
        $izin->luas_izin = $request->luas_izin;
        $izin->save();

        return redirect()->route('izin.index')->with('pesan', 'Data Perizinan Berhasil Diperbaharui');
    }

    public function destroy($id_izin)
    {
        $izin_entry = izin::where('id_izin', $id_izin)->first();
        $izin_entry->IsDelete = 1;
        $izin_entry->save();

        return redirect()
            ->back()
            ->with('pesan', 'Data Perizinan Berhasil Dihapus');
    }
}
