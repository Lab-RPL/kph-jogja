<?php

namespace App\Http\Controllers;
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
            ->paginate(5);
        $data = DB::table('petak')
            ->where('id_rph', $id_rph)
            ->where('IsDelete',0)
            ->paginate(5);
        return view('petak.petak', ['data' => $data, 'ptk_data' => $petak_data]);
    }

    public function index2(Request $req)
    {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }
        $data = Petak::where('IsDelete',0)->paginate(10);
        return view('petak.petak-read', ['data' => $data]);
    }    
    public function create()
    {
        $rph = rph::all();
        return view('petak.tambah-petak')->with('rph', $rph);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_rph' => 'required',
            'nomor_ptk' => 'required',
            'luas_ptk' => 'required',
            'potensi_ptk' => 'required', 
        ]);

        Petak::create([
            'id_rph' => $request->id_rph,
            'nomor_ptk' => $request->nomor_ptk,
            'luas_ptk' => $request->luas_ptk,
            'potensi_ptk' => $request->potensi_ptk,
        ]);

        return redirect()->route('petak.index', $request->id_rph)
                        ->with('pesan', 'Data Petak berhasil ditambahkan.');
    }

    public function edit($id){
        $petak = petak::findOrFail($id);
        $rphs = rph::where('IsDelete', 0)->get();
        
        return view('petak.edit-petak', ['petak' => $petak, 'rphs' => $rphs]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'id_rph'    => 'required',
            'nomor_ptk'  => 'required',
            'luas_ptk'=> 'required',
            'potensi_ptk'  => 'required'
        ]);

        $petak = petak::findOrFail($id);

        $petak->id_rph     = $request->id_rph;
        $petak->nomor_ptk   = $request->nomor_ptk;
        $petak->luas_ptk = $request->luas_ptk;
        $petak->potensi_ptk  = $request->potensi_ptk;
    
        $petak->save();
    
        return redirect()->route('petak.index', $request->id_rph)->with('pesan',"Data RPH Berhasil Di Update"); // Gantikan dengan nama route yang sesuai
        
    }

    public function destroy($id_ptk){
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
        return redirect()->back()->with('pesan', 'RPH dan petak terkait dihapus');
    
    }
}