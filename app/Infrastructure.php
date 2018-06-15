<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    public $timestamps = false;
    public function schools(){
        return $this->belongsToMany('App\School');
    }
     public function user(){
        return $this->belongsTo('App\User');
    }
}
