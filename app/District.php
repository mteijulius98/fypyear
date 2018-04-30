<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;
    public function  user(){
        return $this->hasOne('App\User');
    }
    public function  ward(){
        return $this->hasMany('App\Ward');
    }
    
    
}
