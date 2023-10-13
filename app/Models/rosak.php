<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rosak extends Model
{
    use HasFactory;

    protected $table = "rusak_hilang";
    protected $primaryKey = "id_rusak";
    protected $fillable = ["id_rusak","jns_rusak", "tgl_input", "tgl_rusak", "id_PU", "koor_x", "koor_y", "keterangan", "diameter", "foto"];

    public function dataUtama(){
        return $this->belongsTo('App\Models\dataUtama', 'id_PU');
    }
}
