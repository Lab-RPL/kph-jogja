<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rph extends Model
{
    use HasFactory;

    protected $table = 'rph';
    protected $primaryKey = 'id_rph';
    protected $fillable = ["id_rph", "nama_rph", "kepala_rph", "luas_rph", "id_bdh"];
   
    public function bdh()
{
    return $this->belongsTo('App\Models\Bdh', 'id_bdh');
}
   
}


