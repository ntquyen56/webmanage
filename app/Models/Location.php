<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'phong',
        'khuvuc'
      ];
      public $timestamps = false; 
      protected $primaryKey = 'id_dd';
      protected $table = 'diadiem';
}
