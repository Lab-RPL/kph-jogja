<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class izin extends Model
{
    use HasFactory;

    protected $table = "izin_kelola";
    protected $primaryKey = "id_izin";
    protected $fillable = ["id_izin", "nama_kelompok", "no_SK", "petak_izin", "luas_izin"];
}
