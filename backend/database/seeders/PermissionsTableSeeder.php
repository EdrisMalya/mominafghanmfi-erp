<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Access',
                'key' => 'user-management-access',
                'permission_group_id' => 1,
                'created_at' => '2024-11-16 03:05:31',
                'updated_at' => '2024-11-16 03:05:31',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Access',
                'key' => 'users-access',
                'permission_group_id' => 2,
                'created_at' => '2024-11-17 16:00:21',
                'updated_at' => '2024-11-17 16:00:21',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Access',
                'key' => 'log-activity-access',
                'permission_group_id' => 6,
                'created_at' => '2024-11-17 16:00:39',
                'updated_at' => '2024-11-17 16:00:39',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'View details',
                'key' => 'log-activity-view-details',
                'permission_group_id' => 6,
                'created_at' => '2024-11-17 16:00:46',
                'updated_at' => '2024-11-17 16:00:46',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Recover delete record',
                'key' => 'log-activity-recover-delete-record',
                'permission_group_id' => 6,
                'created_at' => '2024-11-17 16:00:57',
                'updated_at' => '2024-11-17 16:00:57',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Access',
                'key' => 'roles-access',
                'permission_group_id' => 3,
                'created_at' => '2024-11-17 16:01:28',
                'updated_at' => '2024-11-17 16:01:28',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Create',
                'key' => 'roles-create',
                'permission_group_id' => 3,
                'created_at' => '2024-11-17 16:01:30',
                'updated_at' => '2024-11-17 16:01:30',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Edit',
                'key' => 'roles-edit',
                'permission_group_id' => 3,
                'created_at' => '2024-11-17 16:01:32',
                'updated_at' => '2024-11-17 16:01:32',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Delete',
                'key' => 'roles-delete',
                'permission_group_id' => 3,
                'created_at' => '2024-11-17 16:01:35',
                'updated_at' => '2024-11-17 16:01:35',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'View details',
                'key' => 'roles-view-details',
                'permission_group_id' => 3,
                'created_at' => '2024-11-17 16:01:38',
                'updated_at' => '2024-11-17 16:01:38',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Access',
                'key' => 'activity-log-access',
                'permission_group_id' => 4,
                'created_at' => '2024-11-17 16:02:10',
                'updated_at' => '2024-11-17 16:02:10',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'View details',
                'key' => 'activity-log-view-details',
                'permission_group_id' => 4,
                'created_at' => '2024-11-17 16:02:16',
                'updated_at' => '2024-11-17 16:02:16',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Recover delete record',
                'key' => 'activity-log-recover-delete-record',
                'permission_group_id' => 4,
                'created_at' => '2024-11-17 16:02:29',
                'updated_at' => '2024-11-17 16:02:29',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Access',
                'key' => 'login-log-access',
                'permission_group_id' => 5,
                'created_at' => '2024-11-17 16:02:45',
                'updated_at' => '2024-11-17 16:02:45',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Access',
                'key' => 'configurations-access',
                'permission_group_id' => 7,
                'created_at' => '2024-11-17 16:03:25',
                'updated_at' => '2024-11-17 16:03:25',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Access',
                'key' => 'backup-access',
                'permission_group_id' => 8,
                'created_at' => '2024-11-17 16:03:55',
                'updated_at' => '2024-11-17 16:03:55',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Run backup',
                'key' => 'backup-run-backup',
                'permission_group_id' => 8,
                'created_at' => '2024-11-17 16:04:04',
                'updated_at' => '2024-11-17 16:04:04',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Download backup',
                'key' => 'backup-download-backup',
                'permission_group_id' => 8,
                'created_at' => '2024-11-17 16:04:10',
                'updated_at' => '2024-11-17 16:04:10',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Restore backup',
                'key' => 'backup-restore-backup',
                'permission_group_id' => 8,
                'created_at' => '2024-11-17 16:04:15',
                'updated_at' => '2024-11-17 16:04:15',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Change backup',
                'key' => 'backup-change-backup',
                'permission_group_id' => 8,
                'created_at' => '2024-11-17 16:04:19',
                'updated_at' => '2024-11-17 16:04:19',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Access',
                'key' => 'languages-access',
                'permission_group_id' => 9,
                'created_at' => '2024-11-17 16:04:46',
                'updated_at' => '2024-11-17 16:04:46',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Create',
                'key' => 'languages-create',
                'permission_group_id' => 9,
                'created_at' => '2024-11-17 16:04:49',
                'updated_at' => '2024-11-17 16:04:49',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'View details',
                'key' => 'languages-view-details',
                'permission_group_id' => 9,
                'created_at' => '2024-11-17 16:04:56',
                'updated_at' => '2024-11-17 16:04:56',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Delete',
                'key' => 'languages-delete',
                'permission_group_id' => 9,
                'created_at' => '2024-11-17 16:05:00',
                'updated_at' => '2024-11-17 16:05:00',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Access',
                'key' => 'language-dictionary-access',
                'permission_group_id' => 10,
                'created_at' => '2024-11-17 16:06:15',
                'updated_at' => '2024-11-17 16:06:15',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Add word',
                'key' => 'language-dictionary-add-word',
                'permission_group_id' => 10,
                'created_at' => '2024-11-17 16:06:21',
                'updated_at' => '2024-11-17 16:06:21',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Edit word',
                'key' => 'language-dictionary-edit-word',
                'permission_group_id' => 10,
                'created_at' => '2024-11-17 16:06:25',
                'updated_at' => '2024-11-17 16:06:25',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Delete word',
                'key' => 'language-dictionary-delete-word',
                'permission_group_id' => 10,
                'created_at' => '2024-11-17 16:06:28',
                'updated_at' => '2024-11-17 16:06:28',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Access',
                'key' => 'system-configurations-access',
                'permission_group_id' => 11,
                'created_at' => '2025-03-03 20:39:04',
                'updated_at' => '2025-03-03 20:39:04',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Access',
                'key' => 'branch-configurations-access',
                'permission_group_id' => 12,
                'created_at' => '2025-03-03 20:39:20',
                'updated_at' => '2025-03-03 20:39:20',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Create',
                'key' => 'branch-configurations-create',
                'permission_group_id' => 12,
                'created_at' => '2025-03-03 20:39:25',
                'updated_at' => '2025-03-03 20:39:25',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Update',
                'key' => 'branch-configurations-update',
                'permission_group_id' => 12,
                'created_at' => '2025-03-03 20:39:27',
                'updated_at' => '2025-03-03 20:39:27',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Delete',
                'key' => 'branch-configurations-delete',
                'permission_group_id' => 12,
                'created_at' => '2025-03-03 20:39:29',
                'updated_at' => '2025-03-03 20:39:29',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Access',
                'key' => 'document-formats-access',
                'permission_group_id' => 13,
                'created_at' => '2025-03-04 21:17:43',
                'updated_at' => '2025-03-04 21:17:43',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Profile edit',
                'key' => 'users-profile-edit',
                'permission_group_id' => 2,
                'created_at' => '2025-03-04 22:13:43',
                'updated_at' => '2025-03-04 22:13:43',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'View details',
                'key' => 'users-view-details',
                'permission_group_id' => 2,
                'created_at' => '2025-03-04 23:05:34',
                'updated_at' => '2025-03-04 23:05:34',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Create',
                'key' => 'users-create',
                'permission_group_id' => 2,
                'created_at' => '2025-03-05 00:00:55',
                'updated_at' => '2025-03-05 00:00:55',
            ),
            37 => 
            array (
                'id' => 40,
                'name' => 'Edit',
                'key' => 'users-edit',
                'permission_group_id' => 2,
                'created_at' => '2025-03-05 00:01:48',
                'updated_at' => '2025-03-05 00:01:48',
            ),
            38 => 
            array (
                'id' => 41,
                'name' => 'Delete',
                'key' => 'users-delete',
                'permission_group_id' => 2,
                'created_at' => '2025-03-05 00:02:01',
                'updated_at' => '2025-03-05 00:02:01',
            ),
            39 => 
            array (
                'id' => 43,
                'name' => 'Access',
                'key' => 'customers-services-access',
                'permission_group_id' => 15,
                'created_at' => '2025-03-05 22:41:21',
                'updated_at' => '2025-03-05 22:41:21',
            ),
            40 => 
            array (
                'id' => 44,
                'name' => 'Access',
                'key' => 'customers-access',
                'permission_group_id' => 16,
                'created_at' => '2025-03-05 22:56:40',
                'updated_at' => '2025-03-05 22:56:40',
            ),
            41 => 
            array (
                'id' => 45,
                'name' => 'Create',
                'key' => 'customers-create',
                'permission_group_id' => 16,
                'created_at' => '2025-03-05 23:05:43',
                'updated_at' => '2025-03-05 23:05:43',
            ),
            42 => 
            array (
                'id' => 46,
                'name' => 'Update',
                'key' => 'customers-update',
                'permission_group_id' => 16,
                'created_at' => '2025-03-05 23:05:46',
                'updated_at' => '2025-03-05 23:05:46',
            ),
            43 => 
            array (
                'id' => 47,
                'name' => 'Delete',
                'key' => 'customers-delete',
                'permission_group_id' => 16,
                'created_at' => '2025-03-05 23:05:48',
                'updated_at' => '2025-03-05 23:05:48',
            ),
            44 => 
            array (
                'id' => 49,
                'name' => 'Update system configurations',
                'key' => 'system-configurations-update-system-configurations',
                'permission_group_id' => 11,
                'created_at' => '2025-03-06 15:56:27',
                'updated_at' => '2025-03-06 15:56:27',
            ),
            45 => 
            array (
                'id' => 50,
                'name' => 'Access',
                'key' => 'financing-modes-configurations-access',
                'permission_group_id' => 17,
                'created_at' => '2025-03-06 16:39:53',
                'updated_at' => '2025-03-06 16:39:53',
            ),
            46 => 
            array (
                'id' => 51,
                'name' => 'Create',
                'key' => 'financing-modes-configurations-create',
                'permission_group_id' => 17,
                'created_at' => '2025-03-06 21:52:25',
                'updated_at' => '2025-03-06 21:52:25',
            ),
            47 => 
            array (
                'id' => 52,
                'name' => 'Update',
                'key' => 'financing-modes-configurations-update',
                'permission_group_id' => 17,
                'created_at' => '2025-03-06 21:52:33',
                'updated_at' => '2025-03-06 21:52:33',
            ),
            48 => 
            array (
                'id' => 53,
                'name' => 'Delete',
                'key' => 'financing-modes-configurations-delete',
                'permission_group_id' => 17,
                'created_at' => '2025-03-06 21:52:36',
                'updated_at' => '2025-03-06 21:52:36',
            ),
            49 => 
            array (
                'id' => 54,
                'name' => 'Update configurations',
                'key' => 'financing-modes-configurations-update-configurations',
                'permission_group_id' => 17,
                'created_at' => '2025-03-06 23:06:03',
                'updated_at' => '2025-03-06 23:06:03',
            ),
            50 => 
            array (
                'id' => 55,
                'name' => 'Access',
                'key' => 'financing-mode-access',
                'permission_group_id' => 18,
                'created_at' => '2025-03-08 22:06:07',
                'updated_at' => '2025-03-08 22:06:07',
            ),
            51 => 
            array (
                'id' => 56,
                'name' => 'Access',
                'key' => 'murabeha-access',
                'permission_group_id' => 19,
                'created_at' => '2025-03-08 22:28:47',
                'updated_at' => '2025-03-08 22:28:47',
            ),
            52 => 
            array (
                'id' => 57,
                'name' => 'Add new request',
                'key' => 'murabeha-add-new-request',
                'permission_group_id' => 19,
                'created_at' => '2025-03-08 22:55:29',
                'updated_at' => '2025-03-08 22:55:29',
            ),
        ));
        
        
    }
}