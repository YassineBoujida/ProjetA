<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery_time extends Model
{
    protected $fillable=['delivery_at'];
    
    public function cities(){
        return $this->belongsToMany('App\City');
    }

    public function exclusions(){
        return $this->hasMany('App\Exclusion');
    }
}
