<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MurabehaRequestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('murabeha_requests')->delete();
        
        \DB::table('murabeha_requests')->insert(array (
            0 => 
            array (
                'id' => 6,
                'province_id' => 5,
                'branch_id' => 7,
                'customer_id' => 4,
                'step_2_completed' => 1,
                'step_3_completed' => 0,
                'step_4_completed' => 1,
                'step_5_completed' => 0,
                'step_6_completed' => 0,
                'step_7_completed' => 0,
                'step_8_completed' => 0,
                'step_9_completed' => 0,
                'step_10_completed' => 0,
                'status' => 'personal_information_creation',
                'created_by' => 4,
                'created_at' => '2025-03-09 15:56:56',
                'updated_at' => '2025-03-12 01:57:19',
            ),
        ));
        
        
    }
}