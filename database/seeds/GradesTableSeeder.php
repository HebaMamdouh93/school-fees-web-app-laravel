<?php

use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
            [
                'name' => 'Grade 1'
            ],
            [
                'name' => 'Grade 2'
            ],
            [
                'name' => 'Grade 3' 
            ]
            
        ]);
    }
}
