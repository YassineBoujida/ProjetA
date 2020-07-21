<?php

namespace App\Http\Controllers;

use App\City;
use App\Exclusion;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExclusion;

class ExclusionController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExclusion $request)
    {
        $date = $request->day;
        $dt_id = $request->exclusion_time;
      
            foreach ($dt_id as $value){
                Exclusion::create(['day_exclusion'=>$date,'delivery_time_id'=>$value]);
            }
       
    }

   
}
