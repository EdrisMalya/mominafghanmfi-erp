<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jobs')->delete();
        
        \DB::table('jobs')->insert(array (
            0 => 
            array (
                'id' => 202,
                'queue' => 'default',
                'payload' => '{"uuid":"b6be0a39-772e-4531-a460-502ffb0f5f99","displayName":"App\\\\Jobs\\\\FetcherSeedFilesJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\FetcherSeedFilesJob","command":"O:28:\\"App\\\\Jobs\\\\FetcherSeedFilesJob\\":0:{}"}}',
                'attempts' => 1,
                'reserved_at' => 1741458331,
                'available_at' => 1741458329,
                'created_at' => 1741458329,
            ),
            1 => 
            array (
                'id' => 203,
                'queue' => 'default',
                'payload' => '{"uuid":"a29dc856-8a29-4eaf-a88e-c8bc8dd63033","displayName":"App\\\\Events\\\\UserUpdatedEvent","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"Illuminate\\\\Broadcasting\\\\BroadcastEvent","command":"O:38:\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\":14:{s:5:\\"event\\";O:27:\\"App\\\\Events\\\\UserUpdatedEvent\\":1:{s:6:\\"result\\";s:13:\\"Updated event\\";}s:5:\\"tries\\";N;s:7:\\"timeout\\";N;s:7:\\"backoff\\";N;s:13:\\"maxExceptions\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:5:\\"delay\\";N;s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1741458340,
                'created_at' => 1741458340,
            ),
        ));
        
        
    }
}