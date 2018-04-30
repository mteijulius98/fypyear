<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'email', 'password','station_name','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $timestamps = false;
    public function user_Sc(){
        return $this->belongsTo(School::class);
    }
    public function user_Dc(){
        return $this->belongsTo('App\District');
    }
    public function user_Wd(){
        return $this->belongsTo('App\Ward');
    }
}

