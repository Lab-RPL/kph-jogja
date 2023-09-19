<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    //
    public function index()
    {
        // Pastikan pengguna telah masuk dan bergolong 'admin' sebelum mengizinkan akses.
        // if (Auth::check() && Auth::user()->user_type == 'admin') {

        // Tampilkan halaman admin atau lakukan apa pun yang Anda inginkan
        $data = admin::where('IsDelete', 0)->paginate(5);
        return view("admin.admin", ['data' => $data]);
        // }
    }

    public function create()
    {
        return view('admin.tambah-admin');
    }

    public function store(Request $request)
    {
        $admin = new admin();

        $admin->name = $request->name;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect('/admin')->with('pesan', 'Data User Berhasil Disimpan');
    }

    public function edit($id)
    {
        $admin = admin::where('id', $id)->first();
        return view('admin.edit-admin', ['admin' => $admin]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id'    => 'required',
            'name'  => 'required',
            'password'=> 'required'
        ]);
        
        $admin = admin::where('id', $id)->first();
        $admin->name = $request->name;
        $admin->password = Hash::make($request->password);
        // $admin->user_type = $request->user_type;
        $admin->save();
        return redirect('/admin')->with('pesan', 'Data User Berhasil Diperbaharui');
    }

    public function destroy($id)
    {
        {
            $admin_entry = admin::where('id', $id)->first();
            $admin_entry->IsDelete = 1;
            $admin_entry->save();
    
            return redirect()->back()->with('pesan', 'Data User Berhasil Dihapus');
        }
    }
}
