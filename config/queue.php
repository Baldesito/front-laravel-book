<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Nome della Connessione Predefinita della Coda
    |--------------------------------------------------------------------------
    |
    | Laravel supporta una varietà di backend tramite una singola API unificata,
    | fornendo un accesso conveniente a ogni backend utilizzando la sintassi
    | identica per ciascuno. La connessione della coda predefinita è definita di seguito.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Connessioni della Coda
    |--------------------------------------------------------------------------
    |
    | Qui puoi configurare le opzioni di connessione per ogni backend della coda
    | utilizzato dalla tua applicazione. Una configurazione di esempio è fornita
    | per ogni backend supportato da Laravel. Sei libero di aggiungerne altri.
    |
    | Driver: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver' => 'database',
            'connection' => env('DB_QUEUE_CONNECTION'),
            'table' => env('DB_QUEUE_TABLE', 'jobs'),
            'queue' => env('DB_QUEUE', 'default'),
            'retry_after' => (int) env('DB_QUEUE_RETRY_AFTER', 90),
            'after_commit' => false,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => env('BEANSTALKD_QUEUE_HOST', 'localhost'),
            'queue' => env('BEANSTALKD_QUEUE', 'default'),
            'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
            'block_for' => 0,
            'after_commit' => false,
        ],

        'sqs' => [
            'driver' => 'sqs',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'default'),
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'after_commit' => false,
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_QUEUE_CONNECTION', 'default'),
            'queue' => env('REDIS_QUEUE', 'default'),
            'retry_after' => (int) env('REDIS_QUEUE_RETRY_AFTER', 90),
            'block_for' => null,
            'after_commit' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Raggruppamento dei Lavori
    |--------------------------------------------------------------------------
    |
    | Le seguenti opzioni configurano il database e la tabella che memorizzano
    | le informazioni di raggruppamento dei lavori. Queste opzioni possono essere
    | aggiornate a qualsiasi connessione di database e tabella definita dalla tua applicazione.
    |
    */

    'batching' => [
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'job_batches',
    ],

    /*
    |--------------------------------------------------------------------------
    | Lavori della Coda Non Riusciti
    |--------------------------------------------------------------------------
    |
    | Queste opzioni configurano il comportamento della registrazione di lavori
    | della coda non riusciti, così puoi controllare come e dove i lavori non riusciti
    | vengono memorizzati. Laravel supporta l'archiviazione di lavori non riusciti
    | in un semplice file o in un database.
    |
    | Driver supportati: "database-uuids", "dynamodb", "file", "null"
    |
    */

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'failed_jobs',
    ],

];
