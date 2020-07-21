<?php

use App\City;
use Illuminate\Database\Seeder;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = City::all();
        if($cities->count()==0){
            $this->command->info("Please create some cities !!");
            return;
        }
        factory(App\Partner::class,3)->make()->each(function($partner) use ($cities){
            if($partner->name=='Mohammed'){
                $partner->city_id = $cities->firstWhere('name', 'Rabat')->id;
            }
            else{
                if($partner->name=='Hassan'){
                $partner->city_id = $cities->firstWhere('name', 'Casa')->id;
                }
                else{
                $partner->city_id = $cities->firstWhere('name', 'Tangier')->id;
                }
            }
           
            $partner->save();
        });
    }
}
