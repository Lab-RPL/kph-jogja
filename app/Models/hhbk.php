<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hhbk extends Model
{
    use HasFactory;

    protected $table = 'hhbk';
    protected $primaryKey = 'id_hhbk';
    protected $fillable = ['id_hhbk', 'jenis_tgk'];
}
