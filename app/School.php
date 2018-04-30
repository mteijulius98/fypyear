<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public $timestamps = false;
    public function user(){
        return $this->hasMany('App\User');
    }
    public function s_ward(){
        return $this->belongsTo('App\Ward');
    }
}
