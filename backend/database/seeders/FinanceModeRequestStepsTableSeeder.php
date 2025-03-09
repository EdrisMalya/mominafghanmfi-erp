<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinanceModeRequestStepsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('finance_mode_request_steps')->delete();
        
        \DB::table('finance_mode_request_steps')->insert(array (
            0 => 
            array (
                'id' => 64,
                'financing_mode_id' => 1,
                'step_name' => 'Customer personal information step',
                'required' => 1,
                'order' => 0,
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            1 => 
            array (
                'id' => 65,
                'financing_mode_id' => 1,
                'step_name' => 'Customer asset details',
                'required' => 0,
                'order' => 1,
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            2 => 
            array (
                'id' => 66,
                'financing_mode_id' => 1,
                'step_name' => 'Information about other borrowings',
                'required' => 0,
                'order' => 2,
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            3 => 
            array (
                'id' => 67,
                'financing_mode_id' => 1,
                'step_name' => 'Items needed to be financed',
                'required' => 1,
                'order' => 3,
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
        ));
        
        
    }
}