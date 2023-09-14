<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataTegak extends Model
{
    use HasFactory;

    protected $table = 'data_tegak';
    protected $primaryKey = 'id_tgk';
    protected $fillable = ["id_tgk","id_PU","no_pohon","jenis_tgk","diameter","tinggi"];

    public function dataUtama(){
        return $this->belongsTo('App\Models\dataUtama', 'id_PU');
    }
}
