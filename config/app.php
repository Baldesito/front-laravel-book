<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Nome dell'Applicazione
    |--------------------------------------------------------------------------
    |
    | Questo valore è il nome della tua applicazione, che verrà utilizzato quando il
    | framework ha bisogno di inserire il nome dell'applicazione in una notifica o
    | in altri elementi UI dove il nome dell'applicazione deve essere visualizzato.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Ambiente dell'Applicazione
    |--------------------------------------------------------------------------
    |
    | Questo valore determina l'"ambiente" in cui la tua applicazione è attualmente
    | in esecuzione. Questo può determinare come preferisci configurare i vari
    | servizi che l'applicazione utilizza. Impostalo nel tuo file ".env".
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Modalità Debug dell'Applicazione
    |--------------------------------------------------------------------------
    |
    | Quando la tua applicazione è in modalità debug, verranno mostrati messaggi
    | di errore dettagliati con stack trace ad ogni errore che si verifica
    | nell'applicazione. Se disabilitata, viene mostrata una semplice pagina di errore generica.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL dell'Applicazione
    |--------------------------------------------------------------------------
    |
    | Questo URL è utilizzato dalla console per generare correttamente gli URL quando si
    | utilizza lo strumento da riga di comando Artisan. Dovresti impostarlo nella radice
    | dell'applicazione in modo che sia disponibile all'interno dei comandi Artisan.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Fuso Orario dell'Applicazione
    |--------------------------------------------------------------------------
    |
    | Qui puoi specificare il fuso orario predefinito per la tua applicazione, che
    | verrà utilizzato dalle funzioni di data e data-ora di PHP. Il fuso orario
    | è impostato su "UTC" per impostazione predefinita in quanto è adatto per la maggior parte dei casi.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Configurazione Locale dell'Applicazione
    |--------------------------------------------------------------------------
    |
    | La locale dell'applicazione determina la locale predefinita che verrà utilizzata
    | dai metodi di traduzione / localizzazione di Laravel. Questa opzione può essere
    | impostata su qualsiasi locale per il quale hai intenzione di avere stringhe di traduzione.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Chiave di Crittografia
    |--------------------------------------------------------------------------
    |
    | Questa chiave viene utilizzata dai servizi di crittografia di Laravel e dovrebbe essere impostata
    | su una stringa casuale di 32 caratteri per garantire che tutti i valori crittografati
    | siano sicuri. Dovresti farlo prima di distribuire l'applicazione.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Driver Modalità Manutenzione
    |--------------------------------------------------------------------------
    |
    | Queste opzioni di configurazione determinano il driver utilizzato per determinare e
    | gestire lo stato della "modalità manutenzione" di Laravel. Il driver "cache" consente
    | di controllare la modalità manutenzione su più macchine.
    |
    | Driver supportati: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
