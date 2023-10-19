<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataTegak extends Model
{
    use HasFactory;

    protected $table = 'data_tegak';
    protected $primaryKey = 'id_tgk';
    protected $fillable = ["id_tgk","id_PU","potensi_ptk","id_hhk","id_hhbk","no_pohon","diameter","tinggi"];

    public function dataUtama(){
        return $this->belongsTo('App\Models\dataUtama', 'id_PU');
    }
    public function hhk(){
        return $this->belongsTo('App\Models\hhk', 'id_hhk');
    }
    public function hhbk(){
        return $this->belongsTo('App\Models\hhbk', 'id_hhbk');
    }
}
