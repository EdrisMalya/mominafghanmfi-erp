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
                'id' => 4,
                'first_name' => 'احمد ادریس',
                'last_name' => 'ملیا',
                'father_name' => 'زیرک ملیا',
                'nic_number' => '1400-09-57768',
                'province_id' => 20,
                'district' => 'Alishing',
                'village' => 'Omarzai',
                'dob' => '1998/11/04',
                'created_by' => 4,
                'status' => 'active',
                'created_at' => '2025-03-09 14:37:04',
                'updated_at' => '2025-03-12 00:22:45',
            ),
        ));
        
        
    }
}