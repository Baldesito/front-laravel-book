<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Driver di Sessione Predefinito
    |--------------------------------------------------------------------------
    |
    | Questa opzione determina il driver di sessione predefinito utilizzato per
    | le richieste in arrivo. Laravel supporta una varietà di opzioni di
    | archiviazione per persistere i dati di sessione. L'archiviazione su
    | database è una scelta predefinita eccellente.
    |
    | Supportati: "file", "cookie", "database", "memcached",
    |            "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Durata della Sessione
    |--------------------------------------------------------------------------
    |
    | Qui puoi specificare il numero di minuti durante i quali desideri che la
    | sessione rimanga inattiva prima di scadere. Se vuoi che scadano
    | immediatamente alla chiusura del browser, puoi indicarlo tramite
    | l'opzione di configurazione expire_on_close.
    |
    */

    'lifetime' => (int) env('SESSION_LIFETIME', 120),

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |--------------------------------------------------------------------------
    | Crittografia della Sessione
    |--------------------------------------------------------------------------
    |
    | Questa opzione ti consente di specificare facilmente che tutti i dati
    | di sessione devono essere crittografati prima dell'archiviazione.
    | La crittografia viene eseguita automaticamente da Laravel e puoi
    | utilizzare la sessione normalmente.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    |--------------------------------------------------------------------------
    | Ubicazione File di Sessione
    |--------------------------------------------------------------------------
    |
    | Quando si utilizza il driver di sessione "file", i file di sessione
    | vengono posizionati su disco. L'ubicazione di archiviazione predefinita
    | è definita qui; tuttavia, sei libero di fornire un'altra ubicazione
    | dove dovrebbero essere archiviati.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Connessione Database della Sessione
    |--------------------------------------------------------------------------
    |
    | Quando si utilizzano i driver di sessione "database" o "redis", puoi
    | specificare una connessione che dovrebbe essere utilizzata per gestire
    | queste sessioni. Questo dovrebbe corrispondere a una connessione nelle
    | opzioni di configurazione del database.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Tabella Database della Sessione
    |--------------------------------------------------------------------------
    |
    | Quando si utilizza il driver di sessione "database", puoi specificare
    | la tabella da utilizzare per archiviare le sessioni. Naturalmente, è
    | definito un valore predefinito sensato; tuttavia, sei libero di
    | cambiarla con un'altra tabella.
    |
    */

    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |--------------------------------------------------------------------------
    | Archivio Cache della Sessione
    |--------------------------------------------------------------------------
    |
    | Quando si utilizza uno dei backend di sessione basati sulla cache del
    | framework, puoi definire l'archivio cache che dovrebbe essere utilizzato
    | per archiviare i dati di sessione tra le richieste. Questo deve
    | corrispondere a uno dei tuoi archivi cache definiti.
    |
    | Interessa: "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Lotteria di Pulizia della Sessione
    |--------------------------------------------------------------------------
    |
    | Alcuni driver di sessione devono pulire manualmente la loro ubicazione
    | di archiviazione per eliminare le vecchie sessioni. Qui ci sono le
    | probabilità che ciò accada su una determinata richiesta. Per impostazione
    | predefinita, le probabilità sono 2 su 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Nome del Cookie di Sessione
    |--------------------------------------------------------------------------
    |
    | Qui puoi cambiare il nome del cookie di sessione creato dal framework.
    | Generalmente, non dovresti aver bisogno di cambiare questo valore poiché
    | farlo non fornisce un miglioramento significativo della sicurezza.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Percorso del Cookie di Sessione
    |--------------------------------------------------------------------------
    |
    | Il percorso del cookie di sessione determina il percorso per il quale il
    | cookie sarà considerato disponibile. Generalmente, questo sarà il
    | percorso root della tua applicazione, ma sei libero di cambiarlo quando
    | necessario.
    |
    */

    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Dominio del Cookie di Sessione
    |--------------------------------------------------------------------------
    |
    | Questo valore determina il dominio e i sottodomini per i quali il cookie
    | di sessione è disponibile. Per impostazione predefinita, il cookie sarà
    | disponibile per il dominio root e tutti i sottodomini. Generalmente,
    | questo non dovrebbe essere cambiato.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Cookie Solo HTTPS
    |--------------------------------------------------------------------------
    |
    | Impostando questa opzione su true, i cookie di sessione verranno inviati
    | al server solo se il browser ha una connessione HTTPS. Questo eviterà
    | che il cookie venga inviato quando non può essere fatto in modo sicuro.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | Accesso Solo HTTP
    |--------------------------------------------------------------------------
    |
    | Impostando questo valore su true impedirà a JavaScript di accedere al
    | valore del cookie e il cookie sarà accessibile solo tramite il protocollo
    | HTTP. È improbabile che tu debba disabilitare questa opzione.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Cookie Same-Site
    |--------------------------------------------------------------------------
    |
    | Questa opzione determina come si comportano i tuoi cookie quando
    | avvengono richieste cross-site e può essere utilizzata per mitigare gli
    | attacchi CSRF. Per impostazione predefinita, imposteremo questo valore
    | su "lax" per consentire richieste cross-site sicure.
    |
    | Vedi: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie#samesitesamesite-value
    |
    | Supportati: "lax", "strict", "none", null
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |--------------------------------------------------------------------------
    | Cookie Partizionati
    |--------------------------------------------------------------------------
    |
    | Impostando questo valore su true, il cookie verrà associato al sito di
    | primo livello per un contesto cross-site. I cookie partizionati sono
    | accettati dal browser quando contrassegnati come "secure" e l'attributo
    | Same-Site è impostato su "none".
    |
    */

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

];
