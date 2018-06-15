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
        'fname','mname','lname' ,'email', 'password','role_id'
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

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function schools(){
        return $this->belongsToMany('App\School');
    }

    public function districts(){
        return $this->belongsToMany('App\District');
    }
    public function wards(){
        return $this->belongsToMany('App\Ward');
    }
     public function infrastructure(){
        return $this->hasMany('App\Infrastructure');
    }
}

