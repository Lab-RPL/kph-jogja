<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataUtama extends Model
{
    use HasFactory;

    protected $table = "data_utama";
    protected $primaryKey = 'id_PU';
    protected $fillable = ["id_PU", "tanggal", "id_ptk", "no_PU", "koor_x", "koor_y", "tanam_sela", "tahun_tanam", "jarak_tanam", "umur_tgk", "keadaan_kes", "kerataan_tgk", "kemurnian", "bentuk_lap", "derajat_lereng", "landai_lereng", "kerataan_lap", "jns_tanah", "kedalaman", "dalaman", "jns_bwh", "kerapatan", "penemuan", "erosi", "tinggi_tempat"];

    public function bdh()
{
    return $this->belongsTo(Bdh::class, 'id_bdh');
}

}

