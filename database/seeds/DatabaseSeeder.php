<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(city_seeder::class);
        $this->call(state_seeder::class);
        $this->call(city_state_seeder::class);
        $this->call(comment_seeder::class);
        $this->call(guides_seeder::class);
        $this->call(user_seeder::class);
        $this->call(trail_seeder::class);
        $this->call(trail_guides_seeder::class);
        $this->call(pics_seeder::class);
    }
}
