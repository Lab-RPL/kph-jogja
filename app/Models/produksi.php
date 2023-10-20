<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produksi extends Model
{

    use HasFactory;

    protected $table = 'produksi';
    protected $primaryKey = 'id_prod';
    protected $fillable = ['id_prod', 'id_hhk', 'id_hhbk', 'id_ptk', 'berat_volume'];

    public function hhk()
    {
        return $this->belongsTo('App\Models\hhk', 'id_hhk');
    }
    public function hhbk()
    {
        return $this->belongsTo('App\Models\hhbk', 'id_hhbk');
    }
    public function petak()
    {
        return $this->belongsTo('App\Models\petak', 'id_ptk');
    }
}
