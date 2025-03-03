<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LoginLogsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('login_logs')->delete();
        
        \DB::table('login_logs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '1|phfWxgSbSGNgvvPvB56a1evgQpw953VgxTGJ6rI3',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-03 20:37:07',
                'updated_at' => '2025-03-03 20:37:07',
            ),
            1 => 
            array (
                'id' => 2,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '2|TfXbLMOoLJnk4gpzCWudcC7O00CuzCsLKQ5pGnBM',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-03 20:40:21',
                'updated_at' => '2025-03-03 20:40:21',
            ),
            2 => 
            array (
                'id' => 3,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '3|HU6Px03B2fk1N45ivo3f6vXVuE9LJho28QHLbeXx',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-04 00:28:35',
                'updated_at' => '2025-03-04 00:28:35',
            ),
            3 => 
            array (
                'id' => 4,
                'email' => 'adrismlaya@gmail.com',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-04 00:28:59',
                'updated_at' => '2025-03-04 00:28:59',
            ),
            4 => 
            array (
                'id' => 5,
                'email' => 'adrismlaya@gmail.com',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-04 00:29:01',
                'updated_at' => '2025-03-04 00:29:01',
            ),
            5 => 
            array (
                'id' => 6,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '4|u0hFaWBMlNJvnDcio1cab3h6S21RobLTZbCUpfpL',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-04 00:29:08',
                'updated_at' => '2025-03-04 00:29:08',
            ),
        ));
        
        
    }
}