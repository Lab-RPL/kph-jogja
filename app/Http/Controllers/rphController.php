<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\rph;
use App\Models\Bdh;
use Illuminate\Http\Request;

class rphController extends Controller
{
    // Menampilkan Data RPH sesuai ID BDH yang di pilih
    public function index(Request $req, $id_bdh)
    {
        // if(!$req->session()->exists("user_id")){
        //     return redirect('/');
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }
        // $data = DB::table('rph')
        // ->join('bdh', 'rph.id_bdh', '=', 'bdh.id_bdh')
        // ->select('rph.*', 'bdh.nama_bdh') // Pastikan Anda memilih kolom nama_bdh dari bdh
        // ->get();

        $rph_data = rph::with('bdh')
            ->where('id_bdh', $id_bdh)
            ->get();
        $data = DB::table('rph')
            ->where('id_bdh', $id_bdh)
            ->paginate(5);
        return view('rph.rph', ['data' => $data, 'rph_data' => $rph_data]);
    }

    public function create(){
        $bdh = Bdh::all();
        return view('rph.tambah-rph')->with('bdh', $bdh);
    }

    public function tambah(Request $request)
    {
        $request->validate([
            'id_bdh' => 'required', 
            'nama_rph' => 'required',
            'kepala_rph' => 'required',
            'luas_rph' => 'required',
        ]);

        Rph::create([
            'id_bdh' => $request->id_bdh,
            'nama_rph' => $request->nama_rph,
            'kepala_rph' => $request->kepala_rph,
            'luas_rph' => $request->luas_rph,
        ]);

        return redirect()->route('rph.index', $request->id_bdh)// Gantikan dengan nama route yang sesuai
            ->with('pesan', 'Data RPH berhasil ditambahkan.');
    }

//     public function store(Request $request,$id_bdh)
// {
//     $request->validate([
//         // Validasi data input lainnya...
//         'id_bdh' => 'required|integer|exists:bdh,id_bdh', // Validasi id bdh, pastikan ada di tabel bdhs
//         'nama_rph' => 'required',
//         'kepala_rph' => 'required',
//         'luas_rph' => 'required',
//     ]);

//     $rph = new Rph([ // Pastikan Anda telah menggunakan model Rph di bagian atas file controller
//         // Simpan data input lainnya...
//         'id_bdh' => $request->get('id_bdh'),
//         'nama_rph' => $request->get('nama_rph'),
//         'kepala_rph' => $request->get('kepala_rph'),
//         'luas_rph' => $request->get('luas_rph'),
//     ]);

//     $rph->save();

//     return redirect('/rph{id_bdh}')->with('success', 'Data RPH berhasil disimpan');
// }



}
