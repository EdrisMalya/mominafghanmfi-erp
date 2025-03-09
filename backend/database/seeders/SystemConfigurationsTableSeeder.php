<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SystemConfigurationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('system_configurations')->delete();
        
        \DB::table('system_configurations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'minimum_age_for_financing' => 20,
                'created_by' => 2,
                'created_at' => '2025-03-06 16:17:50',
                'updated_at' => '2025-03-06 16:19:20',
            ),
        ));
        
        
    }
}