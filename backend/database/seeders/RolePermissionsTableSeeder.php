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
                'role_id' => 2,
                'permission_id' => 1,
            ),
            1 => 
            array (
                'role_id' => 2,
                'permission_id' => 2,
            ),
            2 => 
            array (
                'role_id' => 2,
                'permission_id' => 35,
            ),
            3 => 
            array (
                'role_id' => 2,
                'permission_id' => 36,
            ),
            4 => 
            array (
                'role_id' => 2,
                'permission_id' => 37,
            ),
            5 => 
            array (
                'role_id' => 2,
                'permission_id' => 40,
            ),
            6 => 
            array (
                'role_id' => 2,
                'permission_id' => 41,
            ),
            7 => 
            array (
                'role_id' => 1,
                'permission_id' => 15,
            ),
            8 => 
            array (
                'role_id' => 1,
                'permission_id' => 21,
            ),
            9 => 
            array (
                'role_id' => 1,
                'permission_id' => 22,
            ),
            10 => 
            array (
                'role_id' => 1,
                'permission_id' => 16,
            ),
            11 => 
            array (
                'role_id' => 1,
                'permission_id' => 20,
            ),
            12 => 
            array (
                'role_id' => 1,
                'permission_id' => 17,
            ),
            13 => 
            array (
                'role_id' => 1,
                'permission_id' => 18,
            ),
            14 => 
            array (
                'role_id' => 1,
                'permission_id' => 19,
            ),
            15 => 
            array (
                'role_id' => 1,
                'permission_id' => 23,
            ),
            16 => 
            array (
                'role_id' => 1,
                'permission_id' => 24,
            ),
            17 => 
            array (
                'role_id' => 1,
                'permission_id' => 25,
            ),
            18 => 
            array (
                'role_id' => 1,
                'permission_id' => 26,
            ),
            19 => 
            array (
                'role_id' => 1,
                'permission_id' => 27,
            ),
            20 => 
            array (
                'role_id' => 1,
                'permission_id' => 28,
            ),
            21 => 
            array (
                'role_id' => 1,
                'permission_id' => 29,
            ),
            22 => 
            array (
                'role_id' => 1,
                'permission_id' => 31,
            ),
            23 => 
            array (
                'role_id' => 1,
                'permission_id' => 32,
            ),
            24 => 
            array (
                'role_id' => 1,
                'permission_id' => 33,
            ),
            25 => 
            array (
                'role_id' => 1,
                'permission_id' => 30,
            ),
            26 => 
            array (
                'role_id' => 1,
                'permission_id' => 34,
            ),
            27 => 
            array (
                'role_id' => 1,
                'permission_id' => 49,
            ),
            28 => 
            array (
                'role_id' => 1,
                'permission_id' => 50,
            ),
            29 => 
            array (
                'role_id' => 1,
                'permission_id' => 51,
            ),
            30 => 
            array (
                'role_id' => 1,
                'permission_id' => 52,
            ),
            31 => 
            array (
                'role_id' => 1,
                'permission_id' => 53,
            ),
            32 => 
            array (
                'role_id' => 1,
                'permission_id' => 54,
            ),
            33 => 
            array (
                'role_id' => 3,
                'permission_id' => 43,
            ),
            34 => 
            array (
                'role_id' => 3,
                'permission_id' => 44,
            ),
            35 => 
            array (
                'role_id' => 3,
                'permission_id' => 45,
            ),
            36 => 
            array (
                'role_id' => 3,
                'permission_id' => 46,
            ),
            37 => 
            array (
                'role_id' => 3,
                'permission_id' => 47,
            ),
            38 => 
            array (
                'role_id' => 3,
                'permission_id' => 55,
            ),
            39 => 
            array (
                'role_id' => 3,
                'permission_id' => 56,
            ),
            40 => 
            array (
                'role_id' => 3,
                'permission_id' => 57,
            ),
        ));
        
        
    }
}