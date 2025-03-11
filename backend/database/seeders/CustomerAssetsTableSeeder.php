<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomerAssetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customer_assets')->delete();
        
        \DB::table('customer_assets')->insert(array (
            0 => 
            array (
                'id' => 7,
                'relation' => 'murabeha',
                'relation_id' => 6,
                'asset' => 'This is test asset',
                'asset_type_id' => 5,
                'legal_document_file_id' => 25,
                'value' => 1000,
                'created_by' => 4,
                'created_at' => '2025-03-11 15:40:13',
                'updated_at' => '2025-03-11 15:43:22',
            ),
            1 => 
            array (
                'id' => 8,
                'relation' => 'murabeha',
                'relation_id' => 6,
                'asset' => 'Rinah Lyons',
                'asset_type_id' => 5,
                'legal_document_file_id' => 26,
                'value' => 100000,
                'created_by' => 4,
                'created_at' => '2025-03-11 22:49:57',
                'updated_at' => '2025-03-11 22:49:57',
            ),
        ));
        
        
    }
}