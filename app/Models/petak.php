<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petak extends Model
{
    use HasFactory;

    protected $table = 'petak';
    protected $primaryKey = 'id_ptk';
    protected $fillable = ['id_ptk', 'nomor_ptk', 'luas_ptk', 'potensi_ptk', 'id_hhk', 'id_hhbk', 'id_rph'];

    public function rph()
    {
        return $this->belongsTo('App\Models\rph', 'id_rph');
    }
    public function hhk()
    {
        return $this->belongsTo('App\Models\hhk', 'id_hhk');
    }
    public function hhbk()
    {
        return $this->belongsTo('App\Models\hhbk', 'id_hhbk');
    }

    // public function utama()
    // {
    //     return $this->hasOne(dataUtama::class, 'id_PU');
    // }
}
