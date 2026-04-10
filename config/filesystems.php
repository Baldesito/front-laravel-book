<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Disco Filesystem Predefinito
    |--------------------------------------------------------------------------
    |
    | Qui puoi specificare il disco filesystem predefinito che deve essere
    | utilizzato dal framework. Il disco "local", così come una varietà di
    | dischi basati su cloud sono disponibili per l'archiviazione dei file.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Dischi Filesystem
    |--------------------------------------------------------------------------
    |
    | Di seguito puoi configurare tutti i dischi filesystem necessari, e puoi
    | persino configurare più dischi per lo stesso driver. Esempi per la
    | maggior parte dei driver di archiviazione supportati sono configurati
    | qui come riferimento.
    |
    | Driver supportati: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Link Simbolici
    |--------------------------------------------------------------------------
    |
    | Qui puoi configurare i link simbolici che verranno creati quando viene
    | eseguito il comando Artisan `storage:link`. Le chiavi dell'array devono
    | essere le posizioni dei link e i valori devono essere i loro target.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
