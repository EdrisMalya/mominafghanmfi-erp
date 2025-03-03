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
                'id' => 1,
                'queue' => 'default',
                'payload' => '{"uuid":"ed571fc9-bf42-4e20-a985-547ef47d7e2e","displayName":"App\\\\Events\\\\UserUpdatedEvent","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"Illuminate\\\\Broadcasting\\\\BroadcastEvent","command":"O:38:\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\":14:{s:5:\\"event\\";O:27:\\"App\\\\Events\\\\UserUpdatedEvent\\":1:{s:6:\\"result\\";s:13:\\"Updated event\\";}s:5:\\"tries\\";N;s:7:\\"timeout\\";N;s:7:\\"backoff\\";N;s:13:\\"maxExceptions\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:5:\\"delay\\";N;s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1741018097,
                'created_at' => 1741018097,
            ),
            1 => 
            array (
                'id' => 2,
                'queue' => 'default',
                'payload' => '{"uuid":"f4cc8d8d-fac1-4c86-afe1-d6dd04e6ecd4","displayName":"App\\\\Jobs\\\\FetcherSeedFilesJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\FetcherSeedFilesJob","command":"O:28:\\"App\\\\Jobs\\\\FetcherSeedFilesJob\\":0:{}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1741018117,
                'created_at' => 1741018117,
            ),
            2 => 
            array (
                'id' => 3,
                'queue' => 'default',
                'payload' => '{"uuid":"5d9850bf-a3c5-40e7-88e6-a94d681cd726","displayName":"App\\\\Jobs\\\\FetcherSeedFilesJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\FetcherSeedFilesJob","command":"O:28:\\"App\\\\Jobs\\\\FetcherSeedFilesJob\\":0:{}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1741018125,
                'created_at' => 1741018125,
            ),
            3 => 
            array (
                'id' => 4,
                'queue' => 'default',
                'payload' => '{"uuid":"215d78f1-35e0-4ab5-b5a7-d1f4a5b0fddb","displayName":"App\\\\Jobs\\\\FetcherSeedFilesJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\FetcherSeedFilesJob","command":"O:28:\\"App\\\\Jobs\\\\FetcherSeedFilesJob\\":0:{}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1741018130,
                'created_at' => 1741018130,
            ),
            4 => 
            array (
                'id' => 5,
                'queue' => 'default',
                'payload' => '{"uuid":"d6353a6c-2294-4784-b495-19a91da3eeb5","displayName":"App\\\\Jobs\\\\FetcherSeedFilesJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\FetcherSeedFilesJob","command":"O:28:\\"App\\\\Jobs\\\\FetcherSeedFilesJob\\":0:{}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1741018134,
                'created_at' => 1741018134,
            ),
            5 => 
            array (
                'id' => 6,
                'queue' => 'default',
                'payload' => '{"uuid":"eeb7641d-3be8-4ce0-b532-a05ec025a0a2","displayName":"App\\\\Jobs\\\\FetcherSeedFilesJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\FetcherSeedFilesJob","command":"O:28:\\"App\\\\Jobs\\\\FetcherSeedFilesJob\\":0:{}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1741018144,
                'created_at' => 1741018144,
            ),
            6 => 
            array (
                'id' => 7,
                'queue' => 'default',
                'payload' => '{"uuid":"65eeb84c-b75b-4cb1-b31e-c68cb899f394","displayName":"App\\\\Jobs\\\\FetcherSeedFilesJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\FetcherSeedFilesJob","command":"O:28:\\"App\\\\Jobs\\\\FetcherSeedFilesJob\\":0:{}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1741018154,
                'created_at' => 1741018154,
            ),
            7 => 
            array (
                'id' => 8,
                'queue' => 'default',
                'payload' => '{"uuid":"c2f453a8-09c4-4ddd-8a2f-49fa95492e4d","displayName":"App\\\\Jobs\\\\FetcherSeedFilesJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\FetcherSeedFilesJob","command":"O:28:\\"App\\\\Jobs\\\\FetcherSeedFilesJob\\":0:{}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1741018160,
                'created_at' => 1741018160,
            ),
            8 => 
            array (
                'id' => 9,
                'queue' => 'default',
                'payload' => '{"uuid":"64049f04-cc84-42c2-b88d-08f7e301e861","displayName":"App\\\\Jobs\\\\FetcherSeedFilesJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\FetcherSeedFilesJob","command":"O:28:\\"App\\\\Jobs\\\\FetcherSeedFilesJob\\":0:{}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1741018165,
                'created_at' => 1741018165,
            ),
            9 => 
            array (
                'id' => 10,
                'queue' => 'default',
                'payload' => '{"uuid":"cc39684b-8087-4bf5-a2c6-f7720a8dc4dd","displayName":"App\\\\Jobs\\\\FetcherSeedFilesJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\FetcherSeedFilesJob","command":"O:28:\\"App\\\\Jobs\\\\FetcherSeedFilesJob\\":0:{}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1741018167,
                'created_at' => 1741018167,
            ),
            10 => 
            array (
                'id' => 11,
                'queue' => 'default',
                'payload' => '{"uuid":"6733cd30-7283-4a09-9615-c74a802426cf","displayName":"App\\\\Jobs\\\\FetcherSeedFilesJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\FetcherSeedFilesJob","command":"O:28:\\"App\\\\Jobs\\\\FetcherSeedFilesJob\\":0:{}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1741018169,
                'created_at' => 1741018169,
            ),
            11 => 
            array (
                'id' => 12,
                'queue' => 'default',
                'payload' => '{"uuid":"1f8d33cd-48e5-4b94-8c8f-b907df46212e","displayName":"App\\\\Events\\\\UserUpdatedEvent","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"Illuminate\\\\Broadcasting\\\\BroadcastEvent","command":"O:38:\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\":14:{s:5:\\"event\\";O:27:\\"App\\\\Events\\\\UserUpdatedEvent\\":1:{s:6:\\"result\\";s:13:\\"Updated event\\";}s:5:\\"tries\\";N;s:7:\\"timeout\\";N;s:7:\\"backoff\\";N;s:13:\\"maxExceptions\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:5:\\"delay\\";N;s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1741018199,
                'created_at' => 1741018199,
            ),
            12 => 
            array (
                'id' => 13,
                'queue' => 'default',
                'payload' => '{"uuid":"cd10221a-9eb9-4384-ba0b-d3210d8e3f68","displayName":"App\\\\Events\\\\UserUpdatedEvent","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"Illuminate\\\\Broadcasting\\\\BroadcastEvent","command":"O:38:\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\":14:{s:5:\\"event\\";O:27:\\"App\\\\Events\\\\UserUpdatedEvent\\":1:{s:6:\\"result\\";s:13:\\"Updated event\\";}s:5:\\"tries\\";N;s:7:\\"timeout\\";N;s:7:\\"backoff\\";N;s:13:\\"maxExceptions\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:5:\\"delay\\";N;s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1741026326,
                'created_at' => 1741026326,
            ),
            13 => 
            array (
                'id' => 14,
                'queue' => 'default',
                'payload' => '{"uuid":"1d07e7c7-d6cb-49e4-b452-4856be6ce547","displayName":"App\\\\Jobs\\\\FetcherSeedFilesJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\FetcherSeedFilesJob","command":"O:28:\\"App\\\\Jobs\\\\FetcherSeedFilesJob\\":0:{}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1741030577,
                'created_at' => 1741030577,
            ),
            14 => 
            array (
                'id' => 15,
                'queue' => 'default',
                'payload' => '{"uuid":"b770acc4-0f2d-4214-9472-e680e95a23e3","displayName":"App\\\\Jobs\\\\FetcherSeedFilesJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\FetcherSeedFilesJob","command":"O:28:\\"App\\\\Jobs\\\\FetcherSeedFilesJob\\":0:{}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1741030581,
                'created_at' => 1741030581,
            ),
        ));
        
        
    }
}