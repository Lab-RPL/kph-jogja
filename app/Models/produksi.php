<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produksi extends Model
{

    use HasFactory;

    protected $table = 'produksi';
    protected $primaryKey = 'id_prod';
    protected $fillable = ['id_prod','id_ptk', 'berat_volume'];

    public function petak()
    {
        return $this->belongsTo('App\Models\petak', 'id_ptk');
    }
}
