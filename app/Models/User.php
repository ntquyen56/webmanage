<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $primaryKey = 'id';
    protected $table = 'users';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //relationship


    function trinhdo(){
        return  $this->belongsTo(Level::class,'id_trinhdo','id_trinhdo');
    }

    function khoa(){
        return  $this->belongsTo(Faculty::class,'id_khoa','id_khoa');
    }

    function roles(){
        return  $this->belongsToMany(roles::class,'user_roles','user_id','role_id');
    }

    function roles_user(){
        return  $this->hasMany(user_role::class,'user_id','id');
    }


    function gtdkNT(){
        return $this->hasMany(user_hdnt::class,'hdnt_id','id');
    }


}
