<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
  protected $fillable = [
    'ma_loai',
    'ten_loai'
  ];
  public $timestamps = false; 
  protected $primaryKey = 'id_loai';
  protected $table = 'loai';
}
