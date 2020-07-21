<?php

namespace App\Http\Controllers;

use App\City;
use App\Exclusion;
use Carbon\Carbon;
use App\Delivery_time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreDelivery_time;

class Delivery_timeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDelivery_time $request)
    {
        Delivery_time::create(['delivery_at'=>$request->delivery_at]);
        
        
    }

    public function storeDeliveryTimeAndCity(Request $request)
    {

        $city = City::findOrFail($request->city_id);
        $dt = Delivery_time::findOrFail($request->delivery_time);
      

        $city->delivery_times()->attach($dt);
        
        
    }

    public function getAvailableDateDelivery(Request $request){

        $city_id = $request->city_id;
        $nb_day = $request->number_of_days;
        $order_date = $request->order_date;

        $collection_final = array("dates"=>[]);

        for($i=0;$i<$nb_day;$i++){

            $day_name = Carbon::parse($order_date)->addDays($i)->format('l');

            $date_day = Carbon::parse($order_date)->addDays($i)->toDateString();

            $results = DB::select( DB::raw("SELECT * FROM delivery_times where id In (SELECT delivery_time_id FROM city_delivery_time WHERE city_delivery_time.city_id=$city_id AND delivery_time_id NOT IN (SELECT delivery_time_id FROM exclusions WHERE day_exclusion='$date_day' ))") );
            
            $collection = array("day_name" => $day_name,
                                    "date" => $date_day,
                                    "delivery_times"=>$results);
            array_push($collection_final["dates"],$collection);
        }
       
        return json_encode($collection_final);
       
  
    }
}

