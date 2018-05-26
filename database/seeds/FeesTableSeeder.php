<?php

use Illuminate\Database\Seeder;

class FeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fees')->insert([
            [
                'fee_type' => 'Admission Fees'
            ],
            [
                'fee_type' => 'First Installment'
            ],
            [
                'fee_type' => 'Second Installment'
            ]
           
            
        ]);
    }
}
