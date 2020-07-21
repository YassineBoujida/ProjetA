<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exclusion extends Model
{
    protected $fillable=['day_exclusion','delivery_time_id'];

    public function delivery_time(){
        return $this->belongsTo('App\Delivery_time');
    }

    
    
}
