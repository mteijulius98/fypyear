<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    public $timestamps = false;
    public function  district(){
        return $this->belongsTo('App\District');
    }

    public function users(){
        return $this->belongsMany('App\User');
    }
}
