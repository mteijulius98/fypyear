<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public $timestamps = false;
    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function infrastructures(){
        return $this->belongsToMany('App\Infrastructure');
    }
    public function services(){
        return $this->belongsToMany('App\Service');
    }
}
