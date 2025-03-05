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
                'created_by' => 4,
                'status' => 'active',
                'created_at' => '2025-03-06 00:32:51',
                'updated_at' => '2025-03-06 00:53:20',
            ),
        ));
        
        
    }
}