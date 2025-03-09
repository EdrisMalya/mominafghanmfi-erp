<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RequestStepFieldsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('request_step_fields')->delete();
        
        \DB::table('request_step_fields')->insert(array (
            0 => 
            array (
                'id' => 456,
                'request_step_field_id' => NULL,
                'finance_mode_request_step_id' => 64,
                'order' => 0,
                'field_name' => 'Phone number',
                'width' => '1x3',
                'field' => '{"value":"text-field","label":"Text field","options":{"required":true},"width":1}',
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            1 => 
            array (
                'id' => 457,
                'request_step_field_id' => NULL,
                'finance_mode_request_step_id' => 64,
                'order' => 1,
                'field_name' => 'Current job',
                'width' => '1x3',
                'field' => '{"value":"text-field","label":"Text field","options":{"required":true},"width":1}',
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            2 => 
            array (
                'id' => 458,
                'request_step_field_id' => NULL,
                'finance_mode_request_step_id' => 64,
                'order' => 2,
                'field_name' => 'Personal monthly income',
                'width' => '1x3',
                'field' => '{"label":"Number field","value":"number-field","options":{"allow_negative":false,"required":true,"min":"1","max":0}}',
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            3 => 
            array (
                'id' => 459,
                'request_step_field_id' => NULL,
                'finance_mode_request_step_id' => 64,
                'order' => 3,
                'field_name' => 'Family monthly income',
                'width' => '1x3',
                'field' => '{"label":"Number field","value":"number-field","options":{"allow_negative":false,"required":true,"min":"1","max":0}}',
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            4 => 
            array (
                'id' => 460,
                'request_step_field_id' => NULL,
                'finance_mode_request_step_id' => 64,
                'order' => 4,
                'field_name' => 'Other income source',
                'width' => '1x3',
                'field' => '{"label":"Number field","value":"number-field","options":{"allow_negative":false,"required":true,"min":"1","max":0}}',
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            5 => 
            array (
                'id' => 461,
                'request_step_field_id' => NULL,
                'finance_mode_request_step_id' => 64,
                'order' => 5,
                'field_name' => 'current province',
                'width' => '1x3',
                'field' => '{"label":"Province selector","value":"province-selector","options":{"required":true,"multiple":false}}',
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            6 => 
            array (
                'id' => 462,
                'request_step_field_id' => NULL,
                'finance_mode_request_step_id' => 64,
                'order' => 6,
                'field_name' => 'Current District',
                'width' => '1x3',
                'field' => '{"value":"text-field","label":"Text field","options":{"required":true},"width":1}',
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            7 => 
            array (
                'id' => 463,
                'request_step_field_id' => NULL,
                'finance_mode_request_step_id' => 64,
                'order' => 7,
                'field_name' => 'Current Village',
                'width' => '1x3',
                'field' => '{"value":"text-field","label":"Text field","options":{"required":true},"width":1}',
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            8 => 
            array (
                'id' => 464,
                'request_step_field_id' => NULL,
                'finance_mode_request_step_id' => 64,
                'order' => 8,
                'field_name' => 'Nature of residence',
                'width' => '1x3',
                'field' => '{"label":"Radio button","value":"radio-button","options":{"required":true,"options":["Owner","Rental","Mortgaged"]}}',
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            9 => 
            array (
                'id' => 465,
                'request_step_field_id' => NULL,
                'finance_mode_request_step_id' => 65,
                'order' => 0,
                'field_name' => 'Add all customer assets',
                'width' => '3x3',
                'field' => '{"label":"Multiple fields","value":"multiple-fields","options":{"required":true,"fields":[{"id":"nqxaycva","order":"1","field_name":"Asset type","width":"1x3","field":{"label":"Text field","value":"text-field","options":{"required":true}}},{"id":"0ouwj413","order":"2","field_name":"Legal document","width":"1x3","field":{"value":"text-field","label":"Text field","options":{"required":true},"width":1}},{"id":"3g209z0x","order":"3","field_name":"Value","width":"1x3","field":{"label":"Number field","value":"number-field","options":{"allow_negative":false,"required":true,"min":"1","max":0}}}]}}',
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:47',
            ),
            10 => 
            array (
                'id' => 469,
                'request_step_field_id' => NULL,
                'finance_mode_request_step_id' => 66,
                'order' => 0,
                'field_name' => 'Enter all borrowings information',
                'width' => '3x3',
                'field' => '{"label":"Multiple fields","value":"multiple-fields","options":{"required":true,"fields":[{"id":"5a2gphsp","order":1,"field_name":"Loan Reference","width":"1x3","field":{"value":"text-field","label":"Text field","options":{"required":true},"width":1}},{"id":"4ay7n2jo","order":2,"field_name":"Name of the lender","width":"1x3","field":{"value":"text-field","label":"Text field","options":{"required":true},"width":1}},{"id":"159icuoo","order":3,"field_name":"Address of the lender","width":"1x3","field":{"value":"text-field","label":"Text field","options":{"required":true},"width":1}},{"id":"f2b80drc","order":4,"field_name":"For how long have you taken the loan?","width":"1x3","field":{"value":"text-field","label":"Text field","options":{"required":true},"width":1}},{"id":"zt1iyb3e","order":5,"field_name":"Amount of the loan","width":"1x3","field":{"label":"Number field","value":"number-field","options":{"allow_negative":false,"required":true,"min":"1","max":0}}}]}}',
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            11 => 
            array (
                'id' => 475,
                'request_step_field_id' => NULL,
                'finance_mode_request_step_id' => 67,
                'order' => 0,
                'field_name' => 'Item Name',
                'width' => '1x3',
                'field' => '{"value":"text-field","label":"Text field","options":{"required":true},"width":1}',
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            12 => 
            array (
                'id' => 476,
                'request_step_field_id' => NULL,
                'finance_mode_request_step_id' => 67,
                'order' => 1,
                'field_name' => 'Quality',
                'width' => '1x3',
                'field' => '{"value":"text-field","label":"Text field","options":{"required":true},"width":1}',
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            13 => 
            array (
                'id' => 477,
                'request_step_field_id' => NULL,
                'finance_mode_request_step_id' => 67,
                'order' => 2,
                'field_name' => 'Quantity',
                'width' => '1x3',
                'field' => '{"label":"Number field","value":"number-field","options":{"allow_negative":false,"required":true,"min":"1","max":0}}',
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            14 => 
            array (
                'id' => 478,
                'request_step_field_id' => NULL,
                'finance_mode_request_step_id' => 67,
                'order' => 3,
                'field_name' => 'Price Per Item',
                'width' => '1x3',
                'field' => '{"label":"Number field","value":"number-field","options":{"allow_negative":false,"required":true,"min":"1","max":0}}',
                'created_at' => '2025-03-08 11:43:14',
                'updated_at' => '2025-03-08 11:43:14',
            ),
            15 => 
            array (
                'id' => 479,
                'request_step_field_id' => 465,
                'finance_mode_request_step_id' => 65,
                'order' => 0,
                'field_name' => 'Asset type',
                'width' => '1x3',
                'field' => '{"label":"Text field","value":"text-field","options":{"required":true}}',
                'created_at' => '2025-03-08 11:43:47',
                'updated_at' => '2025-03-08 11:43:47',
            ),
            16 => 
            array (
                'id' => 480,
                'request_step_field_id' => 465,
                'finance_mode_request_step_id' => 65,
                'order' => 1,
                'field_name' => 'Legal document',
                'width' => '1x3',
                'field' => '{"value":"text-field","label":"Text field","options":{"required":true},"width":1}',
                'created_at' => '2025-03-08 11:43:47',
                'updated_at' => '2025-03-08 11:43:47',
            ),
            17 => 
            array (
                'id' => 481,
                'request_step_field_id' => 465,
                'finance_mode_request_step_id' => 65,
                'order' => 2,
                'field_name' => 'Value',
                'width' => '1x3',
                'field' => '{"label":"Number field","value":"number-field","options":{"allow_negative":false,"required":true,"min":"1","max":0}}',
                'created_at' => '2025-03-08 11:43:47',
                'updated_at' => '2025-03-08 11:43:47',
            ),
            18 => 
            array (
                'id' => 482,
                'request_step_field_id' => 469,
                'finance_mode_request_step_id' => 66,
                'order' => 0,
                'field_name' => 'Loan Reference',
                'width' => '1x3',
                'field' => '{"value":"text-field","label":"Text field","options":{"required":true},"width":1}',
                'created_at' => '2025-03-08 11:43:47',
                'updated_at' => '2025-03-08 11:43:47',
            ),
            19 => 
            array (
                'id' => 483,
                'request_step_field_id' => 469,
                'finance_mode_request_step_id' => 66,
                'order' => 1,
                'field_name' => 'Name of the lender',
                'width' => '1x3',
                'field' => '{"value":"text-field","label":"Text field","options":{"required":true},"width":1}',
                'created_at' => '2025-03-08 11:43:47',
                'updated_at' => '2025-03-08 11:43:47',
            ),
            20 => 
            array (
                'id' => 484,
                'request_step_field_id' => 469,
                'finance_mode_request_step_id' => 66,
                'order' => 2,
                'field_name' => 'Address of the lender',
                'width' => '1x3',
                'field' => '{"value":"text-field","label":"Text field","options":{"required":true},"width":1}',
                'created_at' => '2025-03-08 11:43:47',
                'updated_at' => '2025-03-08 11:43:47',
            ),
            21 => 
            array (
                'id' => 485,
                'request_step_field_id' => 469,
                'finance_mode_request_step_id' => 66,
                'order' => 3,
                'field_name' => 'For how long have you taken the loan?',
                'width' => '1x3',
                'field' => '{"value":"text-field","label":"Text field","options":{"required":true},"width":1}',
                'created_at' => '2025-03-08 11:43:47',
                'updated_at' => '2025-03-08 11:43:47',
            ),
            22 => 
            array (
                'id' => 486,
                'request_step_field_id' => 469,
                'finance_mode_request_step_id' => 66,
                'order' => 4,
                'field_name' => 'Amount of the loan',
                'width' => '1x3',
                'field' => '{"label":"Number field","value":"number-field","options":{"allow_negative":false,"required":true,"min":"1","max":0}}',
                'created_at' => '2025-03-08 11:43:47',
                'updated_at' => '2025-03-08 11:43:47',
            ),
        ));
        
        
    }
}