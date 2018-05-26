<?php

use Illuminate\Database\Seeder;

class YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('years')->insert([
            [
                'year' => 2017
            ],
            [
                'year' => 2018
            ]
            
        ]);
    }
}
