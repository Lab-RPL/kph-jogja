<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\rph;
use App\Models\Bdh;
use App\Models\petak;
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

        // if ($req->session()->has('previous_bdh_id')) {
        //     $previousBdhId = $req->session()->get('previous_bdh_id');

        //     // Hapus sesi yang menyimpan ID BDH sebelumnya
        //     $req->session()->forget('previous_bdh_id');


            $rph_data = rph::with('bdh')
                ->where('id_bdh', $id_bdh)
                ->get();
            $data = DB::table('rph')
                ->where('id_bdh', $id_bdh,)
                ->where('IsDelete',0)
                ->paginate(100000000);
            // $bdh_data = Bdh::all();

            // Mengambil id_bdh dari yang dipilih
            return view('rph.rph', ['data' => $data, 'rph_data' => $rph_data, 'id_bdh' => $id_bdh]);
        }
    //     $data = DB::table('rph')->paginate(5);
    // }

    public function index2(Request $req)
    {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }
        $data = rph::where('IsDelete',0)->paginate(10000000);
        return view('rph.ul-rph', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $bdh = Bdh::all();
        // Mengambil bdh dari query "bdh" (Cth ?bdh=1) dan return null jika tidak ada
        $selectedBdh = $request->query("bdh", null);
        return view('rph.tambah-rph', compact("bdh", "selectedBdh"));                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
    }

    public function create_read(){
        $bdh = Bdh::all();
        return view('rph.tambah-rph-read')->with('bdh', $bdh);
    }

    public function tambah_read(Request $request)
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

        return redirect()->route('rph.index2', $request->id_bdh) // Gantikan dengan nama route yang sesuai
            ->with('pesan', 'Data RPH berhasil ditambahkan.');
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

        return redirect()->route('rph.index', $request->id_bdh) // Gantikan dengan nama route yang sesuai
            ->with('pesan', 'Data RPH berhasil ditambahkan.');
    }

    // public function kembali(Request $request, $id_bdh)
    // {
    //     $request->session()->put('previous_url', route('rph.index', $id_bdh));
    //     return redirect()->route('rph.index');
    // }

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
    // edit

    public function edit($id)
    {
        $rph = Rph::findOrFail($id);
        $bdhs = Bdh::where('IsDelete', 0)->get();
        
        return view('rph.edit-rph', ['rph' => $rph, 'bdhs' => $bdhs]);
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_bdh'    => 'required',
            'nama_rph'  => 'required',
            'kepala_rph'=> 'required',
            'luas_rph'  => 'required'
        ]);
    
        $rph = Rph::findOrFail($id);
    
        $rph->id_bdh     = $request->id_bdh;
        $rph->nama_rph   = $request->nama_rph;
        $rph->kepala_rph = $request->kepala_rph;
        $rph->luas_rph   = $request->luas_rph;
    
        $rph->save();
    
        return redirect()->route('rph.index', $request->id_bdh)->with('pesan',"Data RPH Berhasil Di Update"); // Gantikan dengan nama route yang sesuai
        // return redirect()->route('rph.index', ['id_bdh' => $rph->id_bdh])->with('pesan', 'Data RPH berhasil diperbarui.');
    }
    

    // Delete RPH

    public function destroy($id_rph)
    {
        // Find the RPH with the provided id
        $rph = Rph::findOrFail($id_rph);
    
        // Find the blocks related to this RPH
        $related_petak = petak::where('id_rph', $id_rph)->get();
    
        $canDelete = true;
        // Check if any related Petak is not deleted.
        foreach ($related_petak as $petak) {
            if ($petak->IsDelete == 0) {
                $canDelete = false;
                break;
            }
        }
    
        if ($canDelete) {
            // Change the value of is_delete to 1
            $rph->IsDelete = 1;
            $rph->save();
    
            // Change the IsDelete value of the related block to 1
            foreach ($related_petak as $petak) {
                $petak->IsDelete = 1;
                $petak->save();
            }
    
            // Redirect to the previous page or desired page
            return redirect()->back()->with('pesan', 'RPH dan petak terkait dihapus');
            
        } else {
            // SweetAlert code here
            return redirect()->back()->with('error', 'Data tidak bisa dihapus dikarenakan masih mempunyai petak');
        }
    }
    
    
}
