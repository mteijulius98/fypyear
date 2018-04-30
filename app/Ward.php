<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    public $timestamps = false;
    public function user(){
        return $this->hasMany('App\User');
    }
    public function district(){
        return $this->belongsTo('App\District');
    } 
    public function school(){
        return $this->hasMany('App\School');
    }
}
