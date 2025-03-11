<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AssetTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('asset_types')->delete();
        
        \DB::table('asset_types')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => 'Qawala',
                'status' => 1,
                'created_at' => '2025-03-11 00:20:43',
                'updated_at' => '2025-03-11 00:20:43',
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'Car license',
                'status' => 1,
                'created_at' => '2025-03-11 00:21:29',
                'updated_at' => '2025-03-11 00:21:29',
            ),
        ));
        
        
    }
}