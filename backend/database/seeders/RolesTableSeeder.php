<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'System admin',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => '2024-11-16 03:03:15',
                'updated_at' => '2025-03-03 20:38:17',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'User management admin',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => '2025-03-04 22:14:32',
                'updated_at' => '2025-03-04 22:14:32',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Financing and recovery officer',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => '2025-03-05 22:32:23',
                'updated_at' => '2025-03-05 22:32:23',
            ),
        ));
        
        
    }
}