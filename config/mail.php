<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mailer Predefinito
    |--------------------------------------------------------------------------
    |
    | Questa opzione controlla il mailer predefinito utilizzato per inviare
    | tutti i messaggi di posta elettronica a meno che non sia esplicitamente
    | specificato un altro mailer durante l'invio del messaggio. Tutti i
    | mailer aggiuntivi possono essere configurati nell'array "mailers".
    | Sono forniti esempi di ogni tipo di mailer.
    |
    */

    'default' => env('MAIL_MAILER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Configurazioni Mailer
    |--------------------------------------------------------------------------
    |
    | Qui puoi configurare tutti i mailer utilizzati dalla tua applicazione
    | e le loro rispettive impostazioni. Diversi esempi sono stati configurati
    | per te e sei libero di aggiungere i tuoi secondo le necessità della
    | tua applicazione.
    |
    | Laravel supporta una varietà di driver di trasporto della posta che
    | possono essere utilizzati durante la consegna di un'email. Puoi
    | specificare quale stai utilizzando per i tuoi mailer di seguito.
    | Puoi anche aggiungere mailer aggiuntivi se necessario.
    |
    | Supportati: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |             "postmark", "resend", "log", "array",
    |             "failover", "roundrobin"
    |
    */

    'mailers' => [

        'smtp' => [
            'transport' => 'smtp',
            'scheme' => env('MAIL_SCHEME'),
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 2525),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'resend' => [
            'transport' => 'resend',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
            'retry_after' => 60,
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
            'retry_after' => 60,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Indirizzo Mittente Globale
    |--------------------------------------------------------------------------
    |
    | Potresti desiderare che tutti gli email inviati dalla tua applicazione
    | provengano dallo stesso indirizzo. Qui puoi specificare un nome e un
    | indirizzo utilizzati globalmente per tutti gli email inviati dalla
    | tua applicazione.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

];
