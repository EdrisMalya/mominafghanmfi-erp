<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountryProvincesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('country_provinces')->delete();
        
        \DB::table('country_provinces')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Badakhshan',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:37',
                'updated_at' => '2023-09-13 19:35:37',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Badghis',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Baghlan',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Balkh',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Bamyan',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Daykundi',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Farah',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Faryab',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Ghazni',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Ghor',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Helmand',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Herat',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Jowzjan',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Kabul',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Kandahar',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Kapisa',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Khost',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Kunar',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Kunduz',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Laghman',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Logar',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Nangarhar',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Nimroz',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Nuristan',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Paktia',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Paktika',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Panjshir',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Parwan',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Samangan',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Sar-e Pol',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Takhar',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Urozgan',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Wardak',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Zabul',
                'active' => '1',
                'created_at' => '2023-09-13 19:35:38',
                'updated_at' => '2023-09-13 19:35:38',
            ),
        ));
        
        
    }
}