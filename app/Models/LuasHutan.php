<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuasHutan extends Model
{
    use HasFactory;

    protected $table = 'luas_hutan';
    protected $primaryKey = 'id_luas';
    public $timestamps = true;

    protected $fillable = [
        'luas_lindung',
        'luas_produksi',
        'IsDelete',
        'created_at',
        'updated_at'
    ];
}