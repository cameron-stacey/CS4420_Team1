<?php

use Illuminate\Database\Seeder;

class pics_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fileNames = ["/storage/devils-playground-colorado.jpg","/storage/p1010247.jpg","/storage/trail-us-colorado-pikes-peak-from-devils-playground-at-map-13266507-1504457114-1200x630-3-6.jpg"];
        $picNames = ["sign","devils playground trail","devils playground info"];
        for($i = 0; $i < sizeof($fileNames); $i++){
            DB::table('pics')->insert([
                'id' => $i + 1,
                'trailId' =>  DB::table('trails')->where('id', 8)->value('id'),
                'name' => $picNames[$i],
                'path' => $fileNames[$i],
            ]);
        }
        //
    }
}
