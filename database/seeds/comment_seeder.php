<?php

use Illuminate\Database\Seeder;

class comment_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = ["Comment 1","Comment 2","Comment 3"];
        $trails = DB::table('trails')->pluck('trailId');
        $j=1;
        foreach($trails as $trailId) {
            for ($i = 0; $i < sizeof($comment); $i++) {
                DB::table('comments')->insert([
                    'id' => $j,
                    'trailId' => $trailId,
                    'comment'=> $comment[$i],
                ]);
            $j++;
            }
        }
        //
    }
}
