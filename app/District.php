<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;
    public function  region(){
        return $this->hasMany('App\Region');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
