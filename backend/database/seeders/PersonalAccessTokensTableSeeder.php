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
                'id' => 4,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 2,
                'name' => 'user_token',
                'token' => 'e4ab607a1b4f425cafbcf0368eebee5567fff66cdcf69b520031e9b30578db48',
                'abilities' => '["*"]',
                'last_used_at' => '2025-03-04 00:58:15',
                'expires_at' => NULL,
                'created_at' => '2025-03-04 00:29:08',
                'updated_at' => '2025-03-04 00:58:15',
            ),
        ));
        
        
    }
}