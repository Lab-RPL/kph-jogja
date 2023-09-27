<?php

namespace App\Http\Controllers;

use App\Models\dataTegak;
use Illuminate\Support\Facades\DB;
use App\Models\petak;
use App\Models\dataUtama;
use Illuminate\Http\Request;

class inventarisController extends Controller
{
    public function index(Request $req)
    {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        // $utama_data = dataUtama::with('petak')
        //     ->where('id_ptk', $id_ptk)
        //     ->paginate(5);
        // $data = DB::table('data-utama')
        //     ->where('id_ptk', $id_ptk)
        //     ->where('IsDelete',0)
        //     ->paginate(5);
        // return view('data-utama.inventaris', ['data' => $data, 'utama_data' => $utama_data]);
        $data = DB::table('data_utama')
            ->join('petak', 'data_utama.id_ptk', '=', 'petak.id_ptk')
            ->join('rph', 'petak.id_rph', '=', 'rph.id_rph')
            ->join('bdh', 'rph.id_bdh', '=', 'bdh.id_bdh')
            ->select('data_utama.*', 'petak.nomor_ptk', 'rph.nama_rph', 'bdh.nama_bdh', 'data_utama.koor_x', 'data_utama.koor_y')
            ->where('data_utama.IsDelete', 0)
            ->paginate(1000000);

        return view('data-utama.inventaris', compact('data'));
    }

    public function index_detail(Request $req, $id_PU)
    {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $data = DB::table('data_utama')
            ->join('petak', 'data_utama.id_ptk', '=', 'petak.id_ptk')
            ->join('rph', 'petak.id_rph', '=', 'rph.id_rph')
            ->join('bdh', 'rph.id_bdh', '=', 'bdh.id_bdh')
            ->select('data_utama.*', 'petak.nomor_ptk', 'rph.nama_rph', 'bdh.nama_bdh', 'data_utama.koor_x', 'data_utama.koor_y')
            ->where('data_utama.id_PU', $id_PU)
            ->where('data_utama.IsDelete', 0)
            ->first();

        if (!$data) {
            // Jika data dengan id_PU yang diberikan tidak ditemukan, Anda dapat mengambil tindakan yang sesuai, misalnya mengembalikan respons 404.
            abort(404);
        }

        return view('data-utama.inventarisHasil', ['data' => $data]);
    }

    public function create()
    {
        $petak = petak::all();
        return view('data-utama.inventarisStore', ['petak' => $petak]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'tanggal' => 'required',
        //     'id_ptk' => 'required',
        //     'no_PU' => 'required',
        //     'koor_x' => 'required',
        //     'koor_y' => 'required',
        //     'tanam_sela' => 'required',
        //     'tahun_tanam' => 'required',
        //     'jarak_tanam' => 'required',
        //     'umur_tgk' => 'required',
        //     'keadaan_kes' => 'required',
        //     'kerataan_tgk' => 'required',
        //     'kemurnian' => 'required',
        //     'bentuk_lap' => 'required',
        //     'derajat_lereng' => 'required',
        //     'landai_lereng' => 'required',
        //     'kerataan_lap' => 'required',
        //     'jns_tanah' => 'required',
        //     'kedalaman' => 'required',
        //     'dalaman' => 'required',
        //     'jns_bwh' => 'required',
        //     'kerapatan' => 'required',
        // ]);

        dataUtama::create([
            'tanggal' => $request->tanggal,
            'id_ptk' => $request->id_ptk,
            'no_PU' => $request->no_PU,
            'koor_x' => $request->koor_x,
            'koor_y' => $request->koor_y,
            'tanam_sela' => $request->tanam_sela,
            'tahun_tanam' => $request->tahun_tanam,
            'jarak_tanam' => $request->jarak_tanam,
            'umur_tgk' => $request->umur_tgk,
            'keadaan_kes' => $request->keadaan_kes,
            'kerataan_tgk' => $request->kerataan_tgk,
            'kemurnian' => $request->kemurnian,
            'bentuk_lap' => $request->bentuk_lap,
            'derajat_lereng' => $request->derajat_lereng,
            'landai_lereng' => $request->landai_lereng,
            'kerataan_lap' => $request->kerataan_lap,
            'jns_tanah' => $request->jns_tanah,
            'kedalaman' => $request->kedalaman,
            'dalaman' => $request->dalaman,
            'jns_bwh' => $request->jns_bwh,
            'kerapatan' => $request->kerapatan,
            'penemuan' => $request->penemuan,
            'erosi' => $request->erosi,
            'tinggi_tempat' => $request->tinggi_tempat,
        ]);

        return redirect()
            ->route('data-utama.index', $request->id_ptk)
            ->with('pesan', 'Data berhasil ditambahkan');
    }

    public function edit(Request $req, $id_PU)
    {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $data = DB::table('data_utama')
            ->join('petak', 'data_utama.id_ptk', '=', 'petak.id_ptk')
            ->join('rph', 'petak.id_rph', '=', 'rph.id_rph')
            ->join('bdh', 'rph.id_bdh', '=', 'bdh.id_bdh')
            ->select('data_utama.*', 'petak.nomor_ptk', 'rph.nama_rph', 'bdh.nama_bdh', 'data_utama.koor_x', 'data_utama.koor_y')
            ->where('data_utama.id_PU', $id_PU)
            ->where('data_utama.IsDelete', 0)
            ->first();

        $petak = Petak::all();

        if (!$data) {
            abort(404);
        }

        return view('data-utama.inventarisChange', ['data' => $data, 'petak' => $petak]);
    }

    public function update(Request $request, $id_PU)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'id_ptk' => 'required',
            'no_PU' => 'required',
            'koor_x' => 'required',
            'koor_y' => 'required',
            'tanam_sela' => 'required',
            'tahun_tanam' => 'required',
            'jarak_tanam' => 'required',
            'umur_tgk' => 'required',
            'keadaan_kes' => 'required',
            'kerataan_tgk' => 'required',
            'kemurnian' => 'required',
            'bentuk_lap' => 'required',
            'derajat_lereng' => 'required',
            'landai_lereng' => 'required',
            'kerataan_lap' => 'required',
            'jns_tanah' => 'required',
            'kedalaman' => 'required',
            'dalaman' => 'required',
            'jns_bwh' => 'required',
            'kerapatan' => 'required',
            'penemuan' => 'required',
            'erosi' => 'required',
            'tinggi_tempat' => 'required',
        ]);
    
        $data = DataUtama::find($id_PU);
        
        $data->tanggal = $request->tanggal;
        $data->id_ptk = $request->id_ptk;
        $data->no_PU = $request->no_PU;
        $data->koor_x = $request->koor_x;
        $data->koor_y = $request->koor_y;
        $data->tanam_sela = $request->tanam_sela;
        $data->tahun_tanam = $request->tahun_tanam;
        $data->jarak_tanam = $request->jarak_tanam;
        $data->umur_tgk = $request->umur_tgk;
        $data->keadaan_kes = $request->keadaan_kes;
        $data->kerataan_tgk = $request->kerataan_tgk;
        $data->kemurnian = $request->kemurnian;
        $data->bentuk_lap = $request->bentuk_lap;
        $data->derajat_lereng = $request->derajat_lereng;
        $data->landai_lereng = $request->landai_lereng;
        $data->kerataan_lap = $request->kerataan_lap;
        $data->jns_tanah = $request->jns_tanah;
        $data->kedalaman = $request->kedalaman;
        $data->dalaman = $request->dalaman;
        $data->jns_bwh = $request->jns_bwh;
        $data->kerapatan = $request->kerapatan;
        $data->penemuan = $request->penemuan;
        $data->erosi = $request->erosi;
        $data->tinggi_tempat = $request->tinggi_tempat;
          
        $data->save();
    
        return redirect()->route('data-utama.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id_PU)
    {
        // $dataUtama_entry = dataUtama::where('id_PU', $id_PU)->first();
        // $dataUtama_entry->IsDelete = 1;
        // $dataUtama_entry->save();

        // return redirect()->back()->with('pesan', 'Data Petak Ukur berhasil Dihapus');

        $dataUtama = dataUtama::findOrFail($id_PU);

        // Ubah nilai is_delete menjadi 1
        $dataUtama->IsDelete = 1;
        $dataUtama->save();

        // Temukan petak yang berelasi dengan RPH ini
        // Misalkan ada kolom 'rph_id' pada table Petak yang menyimpan relasi dengan RPH
        // Anda perlu mengganti 'Petak' dengan nama model Petak yang sebenarnya
        $related_tegak = dataTegak::where('id_PU', $id_PU)->get();

        // Ubah nilai IsDelete pada petak yang berelasi menjadi 1
        foreach ($related_tegak as $tegak) {
            $tegak->IsDelete = 1;
            $tegak->save();
        }

        // Redirect ke halaman sebelumnya atau halaman yang diinginkan
        return redirect()
            ->back()
            ->with('pesan', 'Petak Ukur dan Data Tegakan Terkait Berhasil Dihapus');
    }
}
