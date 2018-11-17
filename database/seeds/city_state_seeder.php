<?php

use Illuminate\Database\Seeder;

class city_state_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = DB::table('cities')->pluck('id');
        $state = 6;
        foreach($cities as $city){
          DB::table('cityState')->insert([
                'id' => $city,
                'stateId' => $state,
                'cityId' => $city,
                'address' => "location address",
            ]);
        };
        //
    }
}
