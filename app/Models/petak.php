<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petak extends Model
{
    use HasFactory;

    protected $table = 'petak';
    protected $primaryKey = 'id_ptk';
    protected $fillable = ['id_ptk', 'nomor_ptk', 'luas_ptk', 'potensi_ptk','id_rph'];

    public function rph()
    {
        return $this->belongsTo('App\Models\rph', 'id_rph');
    }

    // public function utama()
    // {
    //     return $this->hasOne(dataUtama::class, 'id_PU');
    // }
}
