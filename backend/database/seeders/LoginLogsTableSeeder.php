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
            6 => 
            array (
                'id' => 7,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-04 21:15:48',
                'updated_at' => '2025-03-04 21:15:48',
            ),
            7 => 
            array (
                'id' => 8,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '5|SYhdTWxVTaEa8GD0VbRxPQ7HsO32jLwFPfyyfnlj',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-04 21:15:51',
                'updated_at' => '2025-03-04 21:15:51',
            ),
            8 => 
            array (
                'id' => 9,
                'email' => 'user-management-admin@gmail.com',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-04 22:17:09',
                'updated_at' => '2025-03-04 22:17:09',
            ),
            9 => 
            array (
                'id' => 10,
                'email' => 'user-management-admin@gmail.com',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-04 22:17:13',
                'updated_at' => '2025-03-04 22:17:13',
            ),
            10 => 
            array (
                'id' => 11,
                'email' => 'user-management-admin@gmail.com',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '6|ZyCCrFrs90NVbVM91IRWQnlomtIEbE05p3Om2i00',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-04 22:18:31',
                'updated_at' => '2025-03-04 22:18:31',
            ),
            11 => 
            array (
                'id' => 12,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '7|60qDgWYYqPdLdHi33ADgep5FbljGeSmSe8lPVUeD',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-05 15:09:16',
                'updated_at' => '2025-03-05 15:09:16',
            ),
            12 => 
            array (
                'id' => 13,
                'email' => 'financing-recovery-officer@mominafghanmfi.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '8|ByMoo800YKgNWFTGqJzBOVgeHMXXiqPf9iSNi8k0',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-05 22:50:25',
                'updated_at' => '2025-03-05 22:50:25',
            ),
            13 => 
            array (
                'id' => 14,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-05 22:55:22',
                'updated_at' => '2025-03-05 22:55:22',
            ),
            14 => 
            array (
                'id' => 15,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-05 22:55:24',
                'updated_at' => '2025-03-05 22:55:24',
            ),
            15 => 
            array (
                'id' => 16,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '9|ZmDLX19Dvi68Xi4tLEgWqy9aYZcJGTPb5XZ3Imb8',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-05 22:55:30',
                'updated_at' => '2025-03-05 22:55:30',
            ),
            16 => 
            array (
                'id' => 17,
                'email' => 'financing-recovery-officer@mominafghanmfi.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-05 22:56:01',
                'updated_at' => '2025-03-05 22:56:01',
            ),
            17 => 
            array (
                'id' => 18,
                'email' => 'financing-recovery-officer@mominafghanmfi.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-05 22:56:04',
                'updated_at' => '2025-03-05 22:56:04',
            ),
            18 => 
            array (
                'id' => 19,
                'email' => 'financing-recovery-officer@mominafghanmfi.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-05 22:56:09',
                'updated_at' => '2025-03-05 22:56:09',
            ),
            19 => 
            array (
                'id' => 20,
                'email' => 'financing-recovery-officer@mominafghanmfi.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '10|7laiLeo8WjFRobC849qd8DfFuC3ez6Tdqh4WQXy9',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-05 22:56:17',
                'updated_at' => '2025-03-05 22:56:17',
            ),
            20 => 
            array (
                'id' => 21,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '11|fqeIJgy5eXNhAxVcyOGROdrvkR0UWE408efzucha',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-06 15:39:23',
                'updated_at' => '2025-03-06 15:39:23',
            ),
            21 => 
            array (
                'id' => 22,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '12|CsThaO8JFwMgQwFE4fARG293INsPDfuOMpXlvoFK',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-06 15:40:14',
                'updated_at' => '2025-03-06 15:40:14',
            ),
            22 => 
            array (
                'id' => 23,
                'email' => 'financing-recovery-officer@mominafghanmfi.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-06 15:40:49',
                'updated_at' => '2025-03-06 15:40:49',
            ),
            23 => 
            array (
                'id' => 24,
                'email' => 'financing-recovery-officer@mominafghanmfi.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '13|iCjlQIDGlz6foYSqWwZKcBAMcHqEwb1ZmbImBU89',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-06 15:40:52',
                'updated_at' => '2025-03-06 15:40:52',
            ),
            24 => 
            array (
                'id' => 25,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '14|5adpaxydHqgA8G6GXmiSEwCZ9FoHXmuxlA1x24lp',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-06 15:54:14',
                'updated_at' => '2025-03-06 15:54:14',
            ),
            25 => 
            array (
                'id' => 26,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-07 03:06:28',
                'updated_at' => '2025-03-07 03:06:28',
            ),
            26 => 
            array (
                'id' => 27,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-07 03:06:31',
                'updated_at' => '2025-03-07 03:06:31',
            ),
            27 => 
            array (
                'id' => 28,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '15|icBo5AkfDOhgxUhWI5mgW2xc7ZEpwTbC2EK4xgQe',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-07 03:06:44',
                'updated_at' => '2025-03-07 03:06:44',
            ),
            28 => 
            array (
                'id' => 29,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-07 22:14:47',
                'updated_at' => '2025-03-07 22:14:47',
            ),
            29 => 
            array (
                'id' => 30,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '16|AslhTiYhVNV107dgYN4oWpI4CLszhXe4yLCuKrLi',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-07 22:14:50',
                'updated_at' => '2025-03-07 22:14:50',
            ),
            30 => 
            array (
                'id' => 31,
                'email' => 'adirsmalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-08 21:49:49',
                'updated_at' => '2025-03-08 21:49:49',
            ),
            31 => 
            array (
                'id' => 32,
                'email' => 'adirsmalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-08 21:50:37',
                'updated_at' => '2025-03-08 21:50:37',
            ),
            32 => 
            array (
                'id' => 33,
                'email' => 'adrismalya@gmail.com',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '17|ttHddjqNm3tayYSHCVxinratl0Qh5joVNw0fcR2g',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-08 21:50:45',
                'updated_at' => '2025-03-08 21:50:45',
            ),
            33 => 
            array (
                'id' => 34,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 0,
                'login_token' => NULL,
                'message' => 'The provided credentials are incorrect.',
                'created_at' => '2025-03-08 21:51:11',
                'updated_at' => '2025-03-08 21:51:11',
            ),
            34 => 
            array (
                'id' => 35,
                'email' => 'edris.malya@dab.gov.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '18|xu1diW7ZO5CS9g7xbl6oJfMCXppeqYU9Q5esWTGX',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-08 21:51:25',
                'updated_at' => '2025-03-08 21:51:25',
            ),
            35 => 
            array (
                'id' => 36,
                'email' => 'financing-recovery-officer@mominafghanmfi.af',
                'ip_address' => '127.0.0.1',
                'login_succeed' => 1,
                'login_token' => '19|WqMihdRehGajESnfanKLrc34FsMVfV8nMfjQZwyG',
                'message' => 'Logged in successfully.',
                'created_at' => '2025-03-08 22:09:30',
                'updated_at' => '2025-03-08 22:09:30',
            ),
        ));
        
        
    }
}