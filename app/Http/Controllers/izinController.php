<?php

namespace App\Http\Controllers;

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
            ->select('izin_kelola.*', 'petak.nomor_ptk')
            ->where('izin_kelola.IsDelete', 0)
            ->paginate(1000000);

        return view('izin.izin', compact('data'));
    }

    public function create()
    {
        $petak = petak::all();
        return view('izin.tambah-izin', compact('petak'));
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
