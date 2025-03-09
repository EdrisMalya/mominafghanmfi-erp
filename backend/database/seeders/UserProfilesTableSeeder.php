<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserProfilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_profiles')->delete();
        
        \DB::table('user_profiles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'province_id' => 5,
                'branch_id' => 7,
                'created_by' => 3,
                'employee_id' => '3531',
            'phone_number' => '(079) 338 - 8547',
            'alternative_phone_number' => '(079) 921 - 0807',
                'a_p_n_relationship' => 'Father',
                'nic_number' => '3218421584215',
                'current_address' => 'Kabul, Afghanistan',
                'permanent_address' => 'Laghman',
                'job_title' => 'Senior software developer',
                'joining_date' => '2025/03/05',
                'created_at' => '2025-03-05 15:29:02',
                'updated_at' => '2025-03-05 22:29:16',
                'dob' => '2025/03/06',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 4,
                'province_id' => 5,
                'branch_id' => 7,
                'created_by' => 1,
                'employee_id' => '3431',
            'phone_number' => '(078) 846 - 5185',
            'alternative_phone_number' => '(079) 921 - 0807',
                'a_p_n_relationship' => 'Father',
                'nic_number' => '132123123',
                'current_address' => 'Kabul, Afghanistan',
                'permanent_address' => 'Kabul',
                'job_title' => 'Financing and recovery officer',
                'joining_date' => '2025/03/05',
                'created_at' => '2025-03-05 22:39:17',
                'updated_at' => '2025-03-07 00:44:54',
                'dob' => '1990/03/22',
            ),
        ));
        
        
    }
}