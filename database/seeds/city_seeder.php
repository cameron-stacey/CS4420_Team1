<?php

use Illuminate\Database\Seeder;

class city_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = ["Colorado Springs","Manitu Springs","Denver","Castle Rock","Monument","Pueblo"];
        for($i = 0; $i < sizeof($states); $i++) {
            DB::table('cities')->insert([
                'id' => $i + 1,
                'name' => $states[$i],
            ]);
        }
        //
    }
}
