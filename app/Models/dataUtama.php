<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataUtama extends Model
{
    use HasFactory;

    protected $table = "data_utama";
    protected $primaryKey = 'id_PU';
    protected $fillable = ["id_PU", "tanggal", "id_ptk", "no_PU", "koor_x", "koor_Y", "tanam_sela", "tahun_tanam", "jarak_tanam"];
}

