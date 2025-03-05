<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PersonalAccessTokensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('personal_access_tokens')->delete();
        
        \DB::table('personal_access_tokens')->insert(array (
            0 => 
            array (
                'id' => 9,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 1,
                'name' => 'user_token',
                'token' => '95396e362684b4329eeef0667dcda2f0e4a4d513eb24fddedf940c0e8d340749',
                'abilities' => '["*"]',
                'last_used_at' => '2025-03-06 00:52:36',
                'expires_at' => NULL,
                'created_at' => '2025-03-05 22:55:30',
                'updated_at' => '2025-03-06 00:52:36',
            ),
        ));
        
        
    }
}