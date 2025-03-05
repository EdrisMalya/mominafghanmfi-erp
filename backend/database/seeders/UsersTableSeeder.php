<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'image' => NULL,
                'first_name' => 'Ahmad Edris',
                'last_name' => 'Malia',
                'email' => 'edris.malya@dab.gov.af',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iYR7gYXTOZhgkI03hsQ4FudLJwtaBLcBVVn6KVsgY59/ht4lO1736',
                'is_active' => 1,
                'is_verified' => 1,
                'change_password' => 0,
                'remember_token' => NULL,
                'created_at' => '2023-09-11 18:51:48',
                'updated_at' => '2023-09-11 18:51:48',
            ),
            1 => 
            array (
                'id' => 2,
                'image' => 'http://localhost:8000/storage/users-profile/kOHpRMr72qBn5aYoAQmYtGlrxE3zbPlsAIx63Nhb.png',
                'first_name' => 'Ahmad Edris',
                'last_name' => 'Malia',
                'email' => 'adrismalya@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$wmb2lfixtvdsIhkR55IX4uoGQVAFu0z3iR/9efgC5/Re/y1Emu97a',
                'is_active' => 1,
                'is_verified' => 1,
                'change_password' => 0,
                'remember_token' => NULL,
                'created_at' => '2023-09-11 18:55:34',
                'updated_at' => '2025-03-05 00:21:13',
            ),
            2 => 
            array (
                'id' => 3,
                'image' => 'http://localhost:8000/storage/users-profile/Af2emgWhQDOD26D1N7JjyEYQxX5R785qgX8T6G4t.png',
                'first_name' => 'User management',
                'last_name' => 'admin',
                'email' => 'user-management-admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$9V8iBAFmR6hLPk/mHXwmdOmPwCxjKK.eBBtBaFaURQwE50Z2snajO',
                'is_active' => 1,
                'is_verified' => 1,
                'change_password' => 0,
                'remember_token' => NULL,
                'created_at' => '2025-03-04 22:16:51',
                'updated_at' => '2025-03-04 22:18:42',
            ),
            3 => 
            array (
                'id' => 4,
                'image' => 'http://localhost:8000/storage/users-profile/3y1GlaTTAlFUrbg8vAOAGjCYvp38NuUVH8LqsqBl.png',
                'first_name' => 'Financing',
                'last_name' => 'Recovery officer',
                'email' => 'financing-recovery-officer@mominafghanmfi.af',
                'email_verified_at' => NULL,
                'password' => '$2y$10$A7eOoHmZ1YVJKuuQOD8RcO9cznxBaMVAyl8lnRe0FvofNy/16hwZa',
                'is_active' => 1,
                'is_verified' => 1,
                'change_password' => 0,
                'remember_token' => NULL,
                'created_at' => '2025-03-05 22:38:09',
                'updated_at' => '2025-03-05 22:50:34',
            ),
        ));
        
        
    }
}