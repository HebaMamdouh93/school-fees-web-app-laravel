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
         $this->call(SchoolsTableSeeder::class);
         $this->call(GradesTableSeeder::class);
         $this->call(YearsTableSeeder::class);
         $this->call(FeesTableSeeder::class);
    }
}
