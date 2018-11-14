<?php

use Illuminate\Database\Seeder;

class state_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allStates = ["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","
        Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky",
        "Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri",
        "Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Carolina",
        "North Dakota","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina",
        "South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","
        Wisconsin","Wyoming"];
        for($i=0; $i < sizeof($allStates); $i++){
            DB::table('state')-> insert([
                'stateId' => $i + 1,
                'stateName' => $allStates[$i],
                ]);
        }
        //
    }
}
