<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hhk extends Model
{
    use HasFactory;

    protected $table = 'hhk';
    protected $primaryKey = 'id_hhk';
    protected $fillable = ['id_hhk', 'jenis_tgk'];
}
