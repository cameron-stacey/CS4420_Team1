<?php

use Illuminate\Database\Seeder;

class trail_guides_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trails = DB::table('trails')->pluck('id');
        foreach ($trails as $trail) {
            DB::table('trails_guides')->insert([
                'trailId' => $trail,
                'guideId'=> DB::table('guides')->where('id', 1)->value('id'),
            ]);
        }
        //
    }
}
