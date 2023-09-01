<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bdh extends Model
{
    use HasFactory;

    protected $table = "bdh";
    protected $primaryKey = 'id_bdh';
    protected $fillable = ["id_bdh","nama_bdh","kepala_bdh","luas_bdh"];
    
    
}


