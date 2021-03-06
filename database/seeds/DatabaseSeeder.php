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
        $this->call(ProfileTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
        //$this->call(MessageTableSeeder::class);
    }
}
