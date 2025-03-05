<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provinces')->delete();
        
        \DB::table('provinces')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => 'Kabul',
                'created_by' => 2,
                'created_at' => '2025-03-04 00:57:56',
                'updated_at' => '2025-03-04 00:57:56',
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'Mazar',
                'created_by' => 1,
                'created_at' => '2025-03-05 01:22:09',
                'updated_at' => '2025-03-05 01:22:09',
            ),
        ));
        
        
    }
}