<?php

use Illuminate\Database\Seeder;

class guides_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ["Hike For Life"];
        $urls = ["https://apo.org/2018-alpha-phi-omega-national-convention/national-convention-registration-information/"];
        for ($i = 0; $i < sizeof($names); $i++) {
            DB::table('guides')->insert([
                'id' => $i,
                'name' => $names[$i],
                'url'=> $urls[$i],
            ]);
        }
        //
    }
}
