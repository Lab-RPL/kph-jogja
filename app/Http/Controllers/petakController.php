<?php

namespace App\Http\Controllers;

use App\Models\Bdh;
use App\Models\hhbk;
use App\Models\hhk;
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
            ->get();

        // Menyertakan data jenis_tgk dari tabel hhbk dan hhl
        $data = DB::table('petak')
            ->leftJoin('hhbk', 'petak.id_hhbk', '=', 'hhbk.id_hhbk')
            ->leftJoin('hhk', 'petak.id_hhk', '=', 'hhk.id_hhk')
            ->where('petak.id_rph', $id_rph)
            ->where('petak.IsDelete', 0)
            ->select('petak.*', 'hhbk.jenis_tgk as hhbk_jenis_tgk', 'hhk.jenis_tgk as hhk_jenis_tgk')
            ->paginate(10000000000);

        return view('petak.petak', ['data' => $data, 'ptk_data' => $petak_data, 'id_rph' => $id_rph]);
    }

    public function index2(Request $req)
    {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }
        $data =  DB::table('petak')
        ->leftJoin('hhbk', 'petak.id_hhbk', '=', 'hhbk.id_hhbk')
        ->leftJoin('hhk', 'petak.id_hhk', '=', 'hhk.id_hhk')
        ->where('petak.IsDelete', 0)
        ->select('petak.*', 'hhbk.jenis_tgk as hhbk_jenis_tgk', 'hhk.jenis_tgk as hhk_jenis_tgk')
        ->paginate(10000000000);

        return view('petak.petak-read', ['data' => $data]);
    }
    public function create(Request $request)
    {
        $rph = rph::all();
        $selectedRph = $request->query('rph', null);
        return view('petak.tambah-petak', compact('rph', 'selectedRph'));
    }
    public function create_read()
    {
        $bdh = Bdh::all();
        $rph = Rph::all();
        return view('petak.tambah-petak-read')->with(['bdh' => $bdh, 'rph' => $rph]);
    }

    public function getRph($id)
    {
        $rph = DB::table('rph')
            ->where('id_bdh', $id)
            ->where('IsDelete', 0)
            ->pluck('nama_rph', 'id_rph');
        return json_encode($rph);
    }

    // public function getTegakan(Request $request) {
    //     if ($request->potensiId == "0") {
    //         $data = DB::table('hhk')->where('petak_id', $request->potensiId)->get();
    //     } else {
    //         $data = DB::table('hhbk')->where('petak_id', $request->potensiId)->get();
    //     }
        
    //     return response()->json($data);
    // }
    
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
            'id_rph' => 'required',
            'nomor_ptk' => 'required',
            'luas_ptk' => 'required',
            'potensi_ptk' => 'required',
            'id_tgk' => 'required',
        ]);

        // Membuat entri baru dalam database menggunakan model Eloquent.
        Petak::create([
            'id_rph' => $request->id_rph,
            'nomor_ptk' => $request->nomor_ptk,
            'luas_ptk' => $request->luas_ptk,
            'potensi_ptk' => $request->potensi_ptk,
            'id_tgk' => $request->jenis_tgk,
            'id_hhk' => $request->potensi_ptk == 0 ? $request->id_tgk : null, // jika potensi ptk adalah 0 (Kayu), kita ambil id_tgk
            'id_hhbk' => $request->potensi_ptk == 1 ? $request->id_tgk : null, // jika potensi ptk adalah 1 (Bukan Kayu), kita ambil id_tgk
        ]);

        return redirect()
            ->route('petak.index', $request->id_rph)
            ->with('pesan', 'Data Petak berhasil ditambahkan.');
    }

    public function store_read(Request $request)
    {
        $request->validate([
            'id_rph' => 'required',
            'nomor_ptk' => 'required',
            'luas_ptk' => 'required',
            'potensi_ptk' => 'required',
            'id_tgk' => 'required',
        ]);

        Petak::create([
            'id_rph' => $request->id_rph,
            'nomor_ptk' => $request->nomor_ptk,
            'luas_ptk' => $request->luas_ptk,
            'potensi_ptk' => $request->potensi_ptk,
            'id_tgk' => $request->jenis_tgk,
            'id_hhk' => $request->potensi_ptk == 0 ? $request->id_tgk : null, // jika potensi ptk adalah 0 (Kayu), kita ambil id_tgk
            'id_hhbk' => $request->potensi_ptk == 1 ? $request->id_tgk : null,
        ]);

        return redirect()
            ->route('petak.index2', $request->id_rph)
            ->with('pesan', 'Data Petak berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $petak = petak::findOrFail($id);
        $rphs = rph::where('IsDelete', 0)->get();

        return view('petak.edit-petak', ['petak' => $petak, 'rphs' => $rphs,'id_ptk' => $id]);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_rph' => 'required',
            'nomor_ptk' => 'required',
            'luas_ptk' => 'required',
            'potensi_ptk' => 'required',
        ]);

        $petak = petak::findOrFail($id);

        $petak->id_rph = $request->id_rph;
        $petak->nomor_ptk = $request->nomor_ptk;
        $petak->luas_ptk = $request->luas_ptk;
        $petak->potensi_ptk = $request->potensi_ptk;
        $petak->id_hhk = $request->potensi_ptk == 0 ? $request->id_tgk : null; // jika potensi ptk adalah 0 (Kayu), kita ambil id_tgk
        $petak->id_hhbk = $request->potensi_ptk == 1 ? $request->id_tgk : null; // jika potensi ptk adalah 1 (Bukan Kayu), kita ambil id_tgk

        $petak->save();

        return redirect()
            ->route('petak.index', $request->id_rph)
            ->with('pesan', 'Data RPH Berhasil Di Update'); // Gantikan dengan nama route yang sesuai
    }

    public function destroy($id_ptk)
    {
        $petak = petak::findOrFail($id_ptk);

        // Ubah nilai is_delete menjadi 1
        $petak->IsDelete = 1;
        $petak->save();

        // Temukan petak yang berelasi dengan RPH ini
        // Misalkan ada kolom 'rph_id' pada table Petak yang menyimpan relasi dengan RPH
        // Anda perlu mengganti 'Petak' dengan nama model Petak yang sebenarnya
        $related_petak = petak::where('id_ptk', $id_ptk)->get();

        // Ubah nilai IsDelete pada petak yang berelasi menjadi 1
        foreach ($related_petak as $petak) {
            $petak->IsDelete = 1;
            $petak->save();
        }
        // Redirect ke halaman sebelumnya atau halaman yang diinginkan
        return redirect()
            ->back()
            ->with('pesan', 'petak terkait dihapus');
    }
}
