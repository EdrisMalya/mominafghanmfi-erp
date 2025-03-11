<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomerDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customer_details')->delete();
        
        \DB::table('customer_details')->insert(array (
            0 => 
            array (
                'id' => 6,
                'customer_id' => 4,
                'financing_mode' => 'murabeha',
                'financing_mode_request_id' => 6,
                'age' => 26,
            'phone_number' => '(079) 338 - 8547',
            'second_phone_number' => '(079) 992 - 3122',
                'current_job' => 'Scott Briggs',
                'personally_monthly_income' => '280.00',
                'family_monthly_income' => '443.00',
                'other_income' => '424.00',
                'province_id' => 18,
                'district' => 'Destiny Ramsey',
                'village' => 'Reagan Hartman',
                'nature_of_residence' => 'Mortgaged',
                'created_at' => '2025-03-10 01:22:09',
                'updated_at' => '2025-03-10 01:22:19',
            ),
        ));
        
        
    }
}