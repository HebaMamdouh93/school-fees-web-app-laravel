<?php

use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            [
                'name' => 'American'
            ],
            [
                'name' => 'British'
            ]
            
        ]);
    }
}
