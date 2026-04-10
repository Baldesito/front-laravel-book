<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Servizi di Terze Parti
    |--------------------------------------------------------------------------
    |
    | Questo file serve per memorizzare le credenziali per servizi di terze
    | parti come Mailgun, Postmark, AWS e altri. Questo file fornisce la
    | posizione di fatto per questo tipo di informazioni, permettendo ai
    | pacchetti di avere un file convenzionale per individuare le varie
    | credenziali dei servizi.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
