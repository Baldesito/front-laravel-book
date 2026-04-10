/**
 * Prima di tutto caricheremo tutte le dipendenze JavaScript di questo progetto,
 * che includono Vue e altre librerie. È un ottimo punto di partenza quando
 * si costruiscono applicazioni web robuste e potenti con Vue e Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Successivamente, creeremo una nuova istanza dell'applicazione Vue. Potrai quindi iniziare
 * a registrare i componenti con l'istanza dell'applicazione in modo che siano pronti
 * per essere utilizzati nelle visualizzazioni della tua applicazione. Un esempio è incluso per te.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

/**
 * Il seguente blocco di codice può essere utilizzato per registrare automaticamente
 * i tuoi componenti Vue. Eseguirà una scansione ricorsiva di questa directory
 * per i componenti Vue e li registrerà automaticamente con il loro "basename".
 *
 * Es. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Infine, allegheremo l'istanza dell'applicazione a un elemento HTML con
 * un attributo "id" pari a "app". Questo elemento è incluso con lo
 * scaffolding "auth". Altrimenti, dovrai aggiungere tu stesso un elemento.
 */

app.mount('#app');
