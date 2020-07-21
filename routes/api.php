<?php

use App\Http\Controllers\Delivery_timesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| 
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//endpoint to insert cities
Route::post('cities','CityController@store');
Route::post('delivery-times','Delivery_timeController@store');
Route::post('cities/{city_id}/delivery-times','Delivery_timeController@storeDeliveryTimeAndCity');
Route::post('cities/{city_id}/delivery-times/exclusions','ExclusionController@store');
Route::get('cities/{city_id}/delivery-dates-times/{number_of_days}','Delivery_timeController@getAvailableDateDelivery');