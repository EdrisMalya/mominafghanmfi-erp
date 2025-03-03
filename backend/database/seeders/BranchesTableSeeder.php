<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('branches')->delete();
        
        \DB::table('branches')->insert(array (
            0 => 
            array (
                'id' => 7,
                'province_id' => 5,
                'name' => 'Tatyana Bartlett',
                'location' => 'Sybill Macdonald',
                'phone_number' => 'Bernard Lane',
                'email' => 'xaxetiluty@mailinator.com',
                'branch_manager_id' => 2,
                'is_main' => '1',
                'status' => '1',
                'created_by' => 2,
                'created_at' => '2025-03-04 00:58:06',
                'updated_at' => '2025-03-04 00:58:06',
            ),
            1 => 
            array (
                'id' => 8,
                'province_id' => 5,
                'name' => 'Christen Gilbert',
                'location' => 'Candice Estrada',
                'phone_number' => 'Kyra Hughes',
                'email' => 'foza@mailinator.com',
                'branch_manager_id' => 2,
                'is_main' => '0',
                'status' => '1',
                'created_by' => 2,
                'created_at' => '2025-03-04 00:58:14',
                'updated_at' => '2025-03-04 00:58:14',
            ),
        ));
        
        
    }
}