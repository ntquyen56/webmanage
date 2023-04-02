<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dang_ki_bien_soan extends Model
{
    use HasFactory;
    protected $table = "dang_ki_bien_soan";

    protected $guarded = [];


    public function users()
    {
        return $this->belongsToMany(User::class, 'user_gtdk', 'giaotrinh_id', 'user_id')->withTimestamps();
    }

    public function khoa (){
        return $this->belongsTo(Faculty::class,'id_khoa','id_khoa');
    }
}
