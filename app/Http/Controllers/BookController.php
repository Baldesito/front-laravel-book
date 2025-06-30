<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('category')
                     ->whereHas('copies', function($q) {
                         $q->where('status', 'disponibile');
                     });

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('author', 'like', '%' . $request->search . '%');
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        $books = $query->paginate(12);
        $categories = Category::all();

        return view('books.index', compact('books', 'categories'));
    }

    public function show(Book $book)
    {
        $book->load('category', 'availableCopies');
        $bestCopy = $book->getBestAvailableCopy();

        return view('books.show', compact('book', 'bestCopy'));
    }

    public function reserve(Book $book)
    {
        $bestCopy = $book->getBestAvailableCopy();

        if (!$bestCopy) {
            return back()->with('error', 'Nessuna copia disponibile');
        }

        Reservation::create([
            'user_id' => auth()->id(),
            'book_copy_id' => $bestCopy->id,
            'reserved_at' => now()
        ]);

        $bestCopy->update(['status' => 'prenotato']);

        return back()->with('success', 'Libro prenotato con successo!');
    }
    public function myReservations()
    {
        $reservations = Reservation::with('bookCopy.book.category')
                                  ->where('user_id', auth()->id())
                                  ->where('status', 'attiva')
                                  ->orderBy('reserved_at', 'desc')
                                  ->paginate(10);

        return view('books.my-reservations', compact('reservations'));
    }

    /**
     * Annulla una prenotazione
     */
    public function cancelReservation(Reservation $reservation)
    {
        // Verifica che la prenotazione appartenga all'utente autenticato
        if ($reservation->user_id !== auth()->id()) {
            return back()->with('error', 'Non puoi annullare questa prenotazione');
        }

        // Verifica che la prenotazione sia ancora attiva
        if ($reservation->status !== 'attiva') {
            return back()->with('error', 'Questa prenotazione non può essere annullata');
        }

        // Annulla la prenotazione
        $reservation->update(['status' => 'annullata']);

        // Rendi disponibile la copia
        $reservation->bookCopy->update(['status' => 'disponibile']);

        return back()->with('success', 'Prenotazione annullata con successo!');
    }
}
