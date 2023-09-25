<?php

namespace App\Http\Controllers;

use App\Models\LuasHutan;
use Illuminate\Http\Request;

class LuasHutanController extends Controller
{
    public function index()
    {
        $luasHutan = LuasHutan::where('IsDelete', 0)->get();
        return view('luas-hutan.luas-hutan', compact('luasHutan'));
    }
}
