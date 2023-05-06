<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bienban_nt_thuky extends Model
{
    use HasFactory;
    function giaotrinh(){
        return $this->belongsTo(dang_ki_bien_soan::class,'id_giaotrinh','id');
    }
}
