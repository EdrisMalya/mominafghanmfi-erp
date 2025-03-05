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
                'name' => 'Kabul main branch',
                'location' => 'Kart-e 4',
                'phone_number' => '07885454855',
                'email' => 'main@mominafghanmfi.af',
                'branch_manager_id' => 3,
                'is_main' => '1',
                'status' => '1',
                'created_by' => 1,
                'created_at' => '2025-03-04 00:58:06',
                'updated_at' => '2025-03-05 15:13:29',
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