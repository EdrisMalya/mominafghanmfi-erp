<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionGroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_groups')->delete();
        
        \DB::table('permission_groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'User management',
                'icon' => 'people',
                'permission_group_id' => 0,
                'sort' => 3,
                'created_at' => '2024-11-16 03:05:25',
                'updated_at' => '2025-03-08 22:06:01',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Users',
                'icon' => 'person',
                'permission_group_id' => 1,
                'sort' => 0,
                'created_at' => '2024-11-17 15:59:25',
                'updated_at' => '2024-11-17 15:59:25',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Roles',
                'icon' => 'lock',
                'permission_group_id' => 1,
                'sort' => 1,
                'created_at' => '2024-11-17 15:59:33',
                'updated_at' => '2024-11-17 15:59:43',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Activity log',
                'icon' => 'directions_run',
                'permission_group_id' => 1,
                'sort' => 2,
                'created_at' => '2024-11-17 15:59:58',
                'updated_at' => '2024-11-17 15:59:58',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Login log',
                'icon' => 'article',
                'permission_group_id' => 1,
                'sort' => 3,
                'created_at' => '2024-11-17 16:00:12',
                'updated_at' => '2024-11-17 16:00:12',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Log activity',
                'icon' => NULL,
                'permission_group_id' => 2,
                'sort' => 0,
                'created_at' => '2024-11-17 16:00:32',
                'updated_at' => '2024-11-17 16:00:32',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Configurations',
                'icon' => 'settings',
                'permission_group_id' => 0,
                'sort' => 2,
                'created_at' => '2024-11-17 16:03:16',
                'updated_at' => '2025-03-05 22:36:45',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Backup',
                'icon' => 'cloud_download',
                'permission_group_id' => 7,
                'sort' => 0,
                'created_at' => '2024-11-17 16:03:49',
                'updated_at' => '2024-11-17 16:03:49',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Languages',
                'icon' => 'language',
                'permission_group_id' => 7,
                'sort' => 1,
                'created_at' => '2024-11-17 16:04:35',
                'updated_at' => '2024-11-17 16:04:40',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Language dictionary',
                'icon' => 'g_translate',
                'permission_group_id' => 9,
                'sort' => 0,
                'created_at' => '2024-11-17 16:06:02',
                'updated_at' => '2024-11-17 16:06:10',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'System configurations',
                'icon' => 'settings',
                'permission_group_id' => 7,
                'sort' => 2,
                'created_at' => '2025-03-03 20:38:37',
                'updated_at' => '2025-03-03 20:38:54',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Branch configurations',
                'icon' => NULL,
                'permission_group_id' => 11,
                'sort' => 0,
                'created_at' => '2025-03-03 20:39:14',
                'updated_at' => '2025-03-03 20:39:14',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Document formats',
                'icon' => NULL,
                'permission_group_id' => 11,
                'sort' => 1,
                'created_at' => '2025-03-04 21:17:37',
                'updated_at' => '2025-03-04 21:17:37',
            ),
            13 => 
            array (
                'id' => 15,
                'name' => 'Customers services',
                'icon' => 'groups',
                'permission_group_id' => 0,
                'sort' => 0,
                'created_at' => '2025-03-05 22:36:43',
                'updated_at' => '2025-03-05 22:47:11',
            ),
            14 => 
            array (
                'id' => 16,
                'name' => 'Customers',
                'icon' => NULL,
                'permission_group_id' => 15,
                'sort' => 0,
                'created_at' => '2025-03-05 22:56:34',
                'updated_at' => '2025-03-05 22:56:34',
            ),
            15 => 
            array (
                'id' => 17,
                'name' => 'Financing Modes Configurations',
                'icon' => NULL,
                'permission_group_id' => 11,
                'sort' => 2,
                'created_at' => '2025-03-06 16:39:47',
                'updated_at' => '2025-03-06 16:39:47',
            ),
            16 => 
            array (
                'id' => 18,
                'name' => 'Financing mode',
                'icon' => 'payments',
                'permission_group_id' => 0,
                'sort' => 1,
                'created_at' => '2025-03-08 22:05:57',
                'updated_at' => '2025-03-08 22:06:01',
            ),
            17 => 
            array (
                'id' => 19,
                'name' => 'Murabeha',
                'icon' => NULL,
                'permission_group_id' => 18,
                'sort' => 0,
                'created_at' => '2025-03-08 22:28:40',
                'updated_at' => '2025-03-08 22:28:40',
            ),
        ));
        
        
    }
}