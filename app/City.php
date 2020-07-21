<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable=['name'];


    public function partner(){
        return $this->hasOne('App\City');
    }

    public function delivery_times(){
        return $this->belongsToMany('App\Delivery_time');
    }

    
}
