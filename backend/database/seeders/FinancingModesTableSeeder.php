<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinancingModesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('financing_modes')->delete();
        
        \DB::table('financing_modes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Murabeha',
                'default_mode' => 1,
                'status' => 1,
                'created_by' => 2,
                'created_at' => '2025-03-06 22:44:40',
                'updated_at' => '2025-03-06 23:05:17',
            ),
        ));
        
        
    }
}