<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pnbp extends Model
{
    use HasFactory;

    protected $table = "pnbp";
    protected $primaryKey = 'id_pnbp';
    protected $fillable = ["id_pnbp","tahun_pnbp","nominal_pnbp"];
}
