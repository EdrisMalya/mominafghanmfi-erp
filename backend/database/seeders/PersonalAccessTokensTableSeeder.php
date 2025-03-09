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
                'id' => 12,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 1,
                'name' => 'user_token',
                'token' => 'a27a5d334f3cc5f98f1d4ccea64042873ec7847f659adf4705ec80d581d0d5b2',
                'abilities' => '["*"]',
                'last_used_at' => '2025-03-07 16:23:03',
                'expires_at' => NULL,
                'created_at' => '2025-03-06 15:40:14',
                'updated_at' => '2025-03-07 16:23:03',
            ),
            1 => 
            array (
                'id' => 16,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 1,
                'name' => 'user_token',
                'token' => '522ef7bf9fcc318dedf81e05720ec78f1d74735bddf9553ed32cc4e1662c2d64',
                'abilities' => '["*"]',
                'last_used_at' => '2025-03-08 10:58:51',
                'expires_at' => NULL,
                'created_at' => '2025-03-07 22:14:50',
                'updated_at' => '2025-03-08 10:58:51',
            ),
            2 => 
            array (
                'id' => 18,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 1,
                'name' => 'user_token',
                'token' => '0477d305c15debbd79a30039cd2f7f74d8d87f70601035a390cef450a91db446',
                'abilities' => '["*"]',
                'last_used_at' => '2025-03-08 22:55:45',
                'expires_at' => NULL,
                'created_at' => '2025-03-08 21:51:25',
                'updated_at' => '2025-03-08 22:55:45',
            ),
            3 => 
            array (
                'id' => 19,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 4,
                'name' => 'user_token',
                'token' => 'e7bf1ca926572070ca0e2f429020320865452b4656c5254ef29c4fa3e2fbbaeb',
                'abilities' => '["*"]',
                'last_used_at' => '2025-03-08 22:56:14',
                'expires_at' => NULL,
                'created_at' => '2025-03-08 22:09:30',
                'updated_at' => '2025-03-08 22:56:14',
            ),
        ));
        
        
    }
}