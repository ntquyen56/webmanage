<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;
    protected $fillable = [
        'ma_hp',
        'ten_hp'
      ];
      public $timestamps = false; 
      protected $primaryKey = 'id_hp';
      protected $table = 'group_hocphan';
}
