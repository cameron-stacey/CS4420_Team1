<?php

use Illuminate\Database\Seeder;

class trail_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trails = ["Twisted Trees Trail","Section 16 Trails","Yucca Loop","Edna Mae Bennett","Kinnikinnick","Templeton","The Crags","Crags to Devil's Playground","Crags to Pikes Peak Summit ","Horsethief Falls","Pancake Rocks ","Lovell Gulch","Red Rocks Trail","Ute Valley Park","Catamount Falls Trail"];
        $elevations = [2,3,2,2,2,3,1,8,10,3,7,3,1,3,3];
        $difficulties = ["Easy","Moderate","Easy","Moderate","Moderate","Moderate-Challenging","Moderate","Challenging","Challenging","Moderate","Moderate","Easy","Easy","Easy","Moderate-Challenging"];
        $distances = [3,6,3,2,2,4,5,9,14,3,7,5,2,3,6];
        $durations = [2,3,2,2,2,3,1,8,10,3,7,3,1,3,3];
        for ($i = 0; $i < sizeof($trails); $i++) {
            DB::table('trails')->insert([
                'id' => $i+1,
                'name' => $trails[$i],
                'locationId' => DB::table('cityState')->where('id', 1)->value('id'),
                'elevation' => $elevations[$i],
                'distance' => $distances[$i],
                'duration' => $durations[$i],
                'difficulty' => $difficulties[$i],
                'pet_friendly' => True,
            ]);
        }
        //
    }
}
