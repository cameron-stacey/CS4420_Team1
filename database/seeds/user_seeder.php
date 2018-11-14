<?php

use Illuminate\Database\Seeder;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ["Olga","Cam","Jonathan"];
        $email = ["olga@gmail.com","cam@gmail.com","jonathan@gmail.com"];
        for ($i = 0; $i < sizeof($name); $i++) {
            DB::table('users')->insert([
                'id' => $i+1,
                'name' => $name[$i],
                'email' => $email[$i],
                'password' => "\$2y\$10\$dv6vnd4Meu/X0toKxIKeyuosihYTCStj4Q1a4Vmhb8KHc7hOqVsJm",
            ]);
        }
        //
    }
}
