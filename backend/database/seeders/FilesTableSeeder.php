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
            3 => 
            array (
                'id' => 11,
                'relation_id' => 4,
                'relation_type' => 'customer_files',
                'folder_prepend' => 'photo',
                'file_path' => 'customer_files/4/photo/YE2mDKAlgwaYA0XWaQAYs329SCcl0kzesZHeE5do.png',
                'file_url' => 'http://localhost:8000/storage/customer_files/4/photo/YE2mDKAlgwaYA0XWaQAYs329SCcl0kzesZHeE5do.png',
                'file_size' => '150782',
                'file_name' => 'edris-profile.png',
                'created_by' => 4,
                'created_at' => '2025-03-09 14:37:05',
                'updated_at' => '2025-03-09 14:37:05',
            ),
            4 => 
            array (
                'id' => 12,
                'relation_id' => 4,
                'relation_type' => 'customer_files',
                'folder_prepend' => 'nic_copy',
                'file_path' => 'customer_files/4/nic_copy/M6jSR1Rrn9ETJWXA9x1sKqbYwMHOW2YysIT5G4XO.jpg',
                'file_url' => 'http://localhost:8000/storage/customer_files/4/nic_copy/M6jSR1Rrn9ETJWXA9x1sKqbYwMHOW2YysIT5G4XO.jpg',
                'file_size' => '156643',
                'file_name' => 'ID 1.jpeg',
                'created_by' => 4,
                'created_at' => '2025-03-09 14:37:05',
                'updated_at' => '2025-03-09 14:37:05',
            ),
            5 => 
            array (
                'id' => 13,
                'relation_id' => 6,
                'relation_type' => 'murabeha_customer_assets',
                'folder_prepend' => 'asset',
                'file_path' => 'murabeha_customer_assets/6/asset/0ZBjZMj79OdP6clXdKOVZZyOexvmWhMAozHMj0l6.jpg',
                'file_url' => 'http://localhost:8000/storage/murabeha_customer_assets/6/asset/0ZBjZMj79OdP6clXdKOVZZyOexvmWhMAozHMj0l6.jpg',
                'file_size' => '380793',
                'file_name' => 'DSC_0891.JPG',
                'created_by' => 4,
                'created_at' => '2025-03-11 01:08:09',
                'updated_at' => '2025-03-11 01:08:09',
            ),
            6 => 
            array (
                'id' => 14,
                'relation_id' => 4,
                'relation_type' => 'customer_files',
                'folder_prepend' => 'murabeha_asset',
                'file_path' => 'customer_files/4/murabeha_asset/sIkO2AgsU8g1EdgpwOZxS2tuThHTmkz20iyCoMbu.jpg',
                'file_url' => 'http://localhost:8000/storage/customer_files/4/murabeha_asset/sIkO2AgsU8g1EdgpwOZxS2tuThHTmkz20iyCoMbu.jpg',
                'file_size' => '380793',
                'file_name' => 'DSC_0891.JPG',
                'created_by' => 4,
                'created_at' => '2025-03-11 01:09:38',
                'updated_at' => '2025-03-11 01:09:38',
            ),
            7 => 
            array (
                'id' => 16,
                'relation_id' => 4,
                'relation_type' => 'customer_files',
                'folder_prepend' => '/murabeha_assets/6',
                'file_path' => 'customer_files/4//murabeha_assets/6/yLcgOJXFpJhQkSXtoesAJQTqSgon8VB5rcBaHqbl.jpg',
                'file_url' => 'http://localhost:8000/storage/customer_files/4//murabeha_assets/6/yLcgOJXFpJhQkSXtoesAJQTqSgon8VB5rcBaHqbl.jpg',
                'file_size' => '380793',
                'file_name' => 'DSC_0891.JPG',
                'created_by' => 4,
                'created_at' => '2025-03-11 01:13:58',
                'updated_at' => '2025-03-11 01:13:58',
            ),
            8 => 
            array (
                'id' => 19,
                'relation_id' => 4,
                'relation_type' => 'customer_files',
                'folder_prepend' => '/murabeha_assets/6',
                'file_path' => 'customer_files/4//murabeha_assets/6/YxiBLy86yizQwF65MDgISu3BmqYNP5vzkRoWf92r.png',
                'file_url' => 'http://localhost:8000/storage/customer_files/4//murabeha_assets/6/YxiBLy86yizQwF65MDgISu3BmqYNP5vzkRoWf92r.png',
                'file_size' => '10262',
                'file_name' => '637881058818827653.jpg',
                'created_by' => 4,
                'created_at' => '2025-03-11 01:43:06',
                'updated_at' => '2025-03-11 01:43:06',
            ),
            9 => 
            array (
                'id' => 25,
                'relation_id' => 4,
                'relation_type' => 'customer_files',
                'folder_prepend' => '/murabeha_assets/6',
                'file_path' => 'customer_files/4//murabeha_assets/6/axM9npMwoRY33W771mGa5FsTH4e90kzuFxkNo5lo.png',
                'file_url' => 'http://localhost:8000/storage/customer_files/4//murabeha_assets/6/axM9npMwoRY33W771mGa5FsTH4e90kzuFxkNo5lo.png',
                'file_size' => '10262',
                'file_name' => '637881058818827653.jpg',
                'created_by' => 4,
                'created_at' => '2025-03-11 15:40:13',
                'updated_at' => '2025-03-11 15:40:13',
            ),
            10 => 
            array (
                'id' => 26,
                'relation_id' => 4,
                'relation_type' => 'customer_files',
                'folder_prepend' => '/murabeha_assets/6',
                'file_path' => 'customer_files/4//murabeha_assets/6/rnnvX7Zf8lquAok1GTALqueR6mJaD16Q5d6pO96d.jpg',
                'file_url' => 'http://localhost:8000/storage/customer_files/4//murabeha_assets/6/rnnvX7Zf8lquAok1GTALqueR6mJaD16Q5d6pO96d.jpg',
                'file_size' => '673501',
                'file_name' => 'edris.jpg',
                'created_by' => 4,
                'created_at' => '2025-03-11 22:49:57',
                'updated_at' => '2025-03-11 22:49:57',
            ),
        ));
        
        
    }
}