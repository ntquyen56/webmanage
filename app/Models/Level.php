<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable = [
        'ma_trinhdo',
        'ten_trinhdo'
      ];
      public $timestamps = false; 
      protected $primaryKey = 'id_trinhdo';
      protected $table = 'trinh_do';
}
