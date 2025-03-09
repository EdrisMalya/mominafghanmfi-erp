<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customers')->delete();
        
        \DB::table('customers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'first_name' => 'Abdul',
                'last_name' => 'Parrish',
                'father_name' => 'Parrish',
                'nic_number' => 'Germaine Hatfield',
                'province_id' => 14,
                'district' => 'Germaine Hatfield',
                'village' => 'Germaine Hatfield',
                'dob' => '1998/03/01',
                'created_by' => 4,
                'status' => 'active',
                'created_at' => '2025-03-06 00:32:51',
                'updated_at' => '2025-03-07 02:12:21',
            ),
            1 => 
            array (
                'id' => 3,
                'first_name' => 'Test f',
                'last_name' => 'Test l',
                'father_name' => 'Test l',
                'nic_number' => 'NIC number',
                'province_id' => 14,
                'district' => 'Distrcit',
                'village' => 'Village',
                'dob' => '2004/03/12',
                'created_by' => 4,
                'status' => 'active',
                'created_at' => '2025-03-07 01:16:05',
                'updated_at' => '2025-03-07 02:39:37',
            ),
        ));
        
        
    }
}