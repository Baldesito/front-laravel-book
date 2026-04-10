<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Impostazioni Predefinite di Autenticazione
    |--------------------------------------------------------------------------
    |
    | Questa opzione definisce il "guard" di autenticazione predefinito e il
    | "broker" di ripristino password per la tua applicazione. Puoi modificare
    | questi valori come richiesto, ma sono un ottimo punto di partenza per
    | la maggior parte delle applicazioni.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Guard di Autenticazione
    |--------------------------------------------------------------------------
    |
    | Successivamente, puoi definire ogni guard di autenticazione per la tua
    | applicazione. Naturalmente, è stata definita una configurazione predefinita
    | eccellente che utilizza l'archiviazione della sessione più il provider
    | utente Eloquent.
    |
    | Tutti i guard di autenticazione hanno un provider utente, che definisce
    | come gli utenti vengono effettivamente recuperati dal tuo database o da
    | un altro sistema di archiviazione utilizzato dall'applicazione. In genere
    | viene utilizzato Eloquent.
    |
    | Supportati: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Provider Utente
    |--------------------------------------------------------------------------
    |
    | Tutti i guard di autenticazione hanno un provider utente, che definisce
    | come gli utenti vengono effettivamente recuperati dal tuo database o da
    | un altro sistema di archiviazione utilizzato dall'applicazione. In genere
    | viene utilizzato Eloquent.
    |
    | Se hai più tabelle o modelli di utenti, puoi configurare più provider
    | per rappresentare il modello/tabella. Questi provider possono quindi
    | essere assegnati a qualsiasi guard di autenticazione aggiuntivo definito.
    |
    | Supportati: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Ripristino Password
    |--------------------------------------------------------------------------
    |
    | Queste opzioni di configurazione specificano il comportamento della
    | funzionalità di ripristino password di Laravel, inclusa la tabella
    | utilizzata per l'archiviazione dei token e il provider utente invocato
    | per recuperare effettivamente gli utenti.
    |
    | Il tempo di scadenza è il numero di minuti per cui ogni token di
    | ripristino sarà considerato valido. Questa funzione di sicurezza mantiene
    | i token di breve durata in modo che abbiano meno tempo per essere indovinati.
    | Puoi modificarlo secondo le necessità.
    |
    | L'impostazione throttle è il numero di secondi che un utente deve
    | aspettare prima di generare altri token di ripristino password. Ciò
    | impedisce all'utente di generare molto rapidamente un gran numero di
    | token di ripristino password.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Timeout Conferma Password
    |--------------------------------------------------------------------------
    |
    | Qui puoi definire il numero di secondi prima che una finestra di
    | conferma password scada e agli utenti venga chiesto di reinserire la
    | loro password tramite la schermata di conferma. Per impostazione
    | predefinita, il timeout dura tre ore.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
