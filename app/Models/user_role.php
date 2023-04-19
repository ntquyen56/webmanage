<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_role extends Model
{
    use HasFactory;


    function role(){
        return $this->belongsTo(roles::class,'role_id','id');
    }
}
