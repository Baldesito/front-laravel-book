<x-mail::message>
# Ciao {{ auth()->user()->name }},

La tua prenotazione è stata confermata con successo!

Ecco i dettagli del libro che hai prenotato:
- **Titolo:** {{ $book->title }}
- **Autore:** {{ $book->author }}

Puoi passare in biblioteca a ritirarlo entro 3 giorni.

<x-mail::button :url="route('books.my-reservations')">
Vedi le tue prenotazioni
</x-mail::button>

Buona lettura,<br>
Lo staff della {{ config('app.name') }}
</x-mail::message>
