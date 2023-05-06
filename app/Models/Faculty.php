<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_khoa',
    'ten_khoa'
  ];
  public $timestamps = false; 
  protected $primaryKey = 'id_khoa';
  protected $table = 'khoa';
}