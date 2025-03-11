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
                'id' => 19,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 4,
                'name' => 'user_token',
                'token' => 'e7bf1ca926572070ca0e2f429020320865452b4656c5254ef29c4fa3e2fbbaeb',
                'abilities' => '["*"]',
                'last_used_at' => '2025-03-12 02:00:53',
                'expires_at' => NULL,
                'created_at' => '2025-03-08 22:09:30',
                'updated_at' => '2025-03-12 02:00:53',
            ),
            1 => 
            array (
                'id' => 23,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 2,
                'name' => 'user_token',
                'token' => '4a2d1c3c45060a6316878d0b33496319a1c411744d3abdb79ed9663859366b1f',
                'abilities' => '["*"]',
                'last_used_at' => '2025-03-12 00:50:53',
                'expires_at' => NULL,
                'created_at' => '2025-03-11 23:45:25',
                'updated_at' => '2025-03-12 00:50:53',
            ),
        ));
        
        
    }
}