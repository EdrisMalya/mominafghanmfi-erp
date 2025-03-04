<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolePermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_permissions')->delete();
        
        \DB::table('role_permissions')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'permission_id' => 15,
            ),
            1 => 
            array (
                'role_id' => 1,
                'permission_id' => 21,
            ),
            2 => 
            array (
                'role_id' => 1,
                'permission_id' => 22,
            ),
            3 => 
            array (
                'role_id' => 1,
                'permission_id' => 16,
            ),
            4 => 
            array (
                'role_id' => 1,
                'permission_id' => 20,
            ),
            5 => 
            array (
                'role_id' => 1,
                'permission_id' => 17,
            ),
            6 => 
            array (
                'role_id' => 1,
                'permission_id' => 18,
            ),
            7 => 
            array (
                'role_id' => 1,
                'permission_id' => 19,
            ),
            8 => 
            array (
                'role_id' => 1,
                'permission_id' => 23,
            ),
            9 => 
            array (
                'role_id' => 1,
                'permission_id' => 24,
            ),
            10 => 
            array (
                'role_id' => 1,
                'permission_id' => 25,
            ),
            11 => 
            array (
                'role_id' => 1,
                'permission_id' => 26,
            ),
            12 => 
            array (
                'role_id' => 1,
                'permission_id' => 27,
            ),
            13 => 
            array (
                'role_id' => 1,
                'permission_id' => 28,
            ),
            14 => 
            array (
                'role_id' => 1,
                'permission_id' => 29,
            ),
            15 => 
            array (
                'role_id' => 1,
                'permission_id' => 31,
            ),
            16 => 
            array (
                'role_id' => 1,
                'permission_id' => 32,
            ),
            17 => 
            array (
                'role_id' => 1,
                'permission_id' => 33,
            ),
            18 => 
            array (
                'role_id' => 1,
                'permission_id' => 30,
            ),
            19 => 
            array (
                'role_id' => 1,
                'permission_id' => 34,
            ),
            20 => 
            array (
                'role_id' => 2,
                'permission_id' => 1,
            ),
            21 => 
            array (
                'role_id' => 2,
                'permission_id' => 2,
            ),
            22 => 
            array (
                'role_id' => 2,
                'permission_id' => 35,
            ),
            23 => 
            array (
                'role_id' => 2,
                'permission_id' => 36,
            ),
            24 => 
            array (
                'role_id' => 2,
                'permission_id' => 37,
            ),
            25 => 
            array (
                'role_id' => 2,
                'permission_id' => 40,
            ),
            26 => 
            array (
                'role_id' => 2,
                'permission_id' => 41,
            ),
            27 => 
            array (
                'role_id' => 3,
                'permission_id' => 43,
            ),
            28 => 
            array (
                'role_id' => 3,
                'permission_id' => 44,
            ),
            29 => 
            array (
                'role_id' => 3,
                'permission_id' => 45,
            ),
            30 => 
            array (
                'role_id' => 3,
                'permission_id' => 46,
            ),
            31 => 
            array (
                'role_id' => 3,
                'permission_id' => 47,
            ),
        ));
        
        
    }
}