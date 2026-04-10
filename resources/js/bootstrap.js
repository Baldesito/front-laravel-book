import 'bootstrap';

/**
 * Caricheremo la libreria axios HTTP che ci consente di effettuare facilmente richieste
 * al nostro backend Laravel. Questa libreria gestisce automaticamente l'invio del token
 * CSRF come intestazione in base al valore del cookie del token "XSRF".
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo espone un'API espressiva per iscriversi ai canali e ascoltare
 * gli eventi trasmessi da Laravel. Echo e la trasmissione di eventi
 * consentono al tuo team di costruire facilmente robuste applicazioni web in tempo reale.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
