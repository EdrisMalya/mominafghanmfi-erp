<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('files')->delete();
        
        \DB::table('files')->insert(array (
            0 => 
            array (
                'id' => 4,
                'relation_id' => 3,
                'relation_type' => 'customer_files',
                'folder_prepend' => 'photo',
                'file_path' => 'customer_files/3/photo/qdf16KhfmK0PI779O5V2J3W0QtRMBcuBCV6dN49b.jpg',
                'file_url' => 'http://localhost:8000/storage/customer_files/3/photo/qdf16KhfmK0PI779O5V2J3W0QtRMBcuBCV6dN49b.jpg',
                'file_size' => '380793',
                'file_name' => 'DSC_0891.JPG',
                'created_by' => 4,
                'created_at' => '2025-03-07 01:58:40',
                'updated_at' => '2025-03-07 01:58:40',
            ),
            1 => 
            array (
                'id' => 8,
                'relation_id' => 1,
                'relation_type' => 'customer_files',
                'folder_prepend' => 'photo',
                'file_path' => 'customer_files/1/photo/MrfIMFDUWAkcoNebGYU30MTiZBKfXTzT9BDrNPXW.jpg',
                'file_url' => 'http://localhost:8000/storage/customer_files/1/photo/MrfIMFDUWAkcoNebGYU30MTiZBKfXTzT9BDrNPXW.jpg',
                'file_size' => '380793',
                'file_name' => 'DSC_0891.JPG',
                'created_by' => 4,
                'created_at' => '2025-03-07 02:15:24',
                'updated_at' => '2025-03-07 02:15:24',
            ),
            2 => 
            array (
                'id' => 10,
                'relation_id' => 3,
                'relation_type' => 'customer_files',
                'folder_prepend' => 'nic_copy',
                'file_path' => 'customer_files/3/nic_copy/rHCqexTFhY3ZZeT18Xgt16VLHYT9phlq93XKftuj.jpg',
                'file_url' => 'http://localhost:8000/storage/customer_files/3/nic_copy/rHCqexTFhY3ZZeT18Xgt16VLHYT9phlq93XKftuj.jpg',
                'file_size' => '80832',
                'file_name' => 'University graduation letter.jpeg',
                'created_by' => 4,
                'created_at' => '2025-03-07 03:05:09',
                'updated_at' => '2025-03-07 03:05:09',
            ),
        ));
        
        
    }
}