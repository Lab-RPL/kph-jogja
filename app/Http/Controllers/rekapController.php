<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class rekapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }
        $data = DB::table('data_utama')
            ->join('petak', 'data_utama.id_ptk', '=', 'petak.id_ptk')
            ->join('rph', 'petak.id_rph', '=', 'rph.id_rph')
            ->join('bdh', 'rph.id_bdh', '=', 'bdh.id_bdh')
            ->select('data_utama.*', 'petak.nomor_ptk', 'rph.id_rph', 'bdh.id_bdh')
            ->where('data_utama.IsDelete', 0)
            ->paginate(1000000);

        return view('rekap.rekap', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}