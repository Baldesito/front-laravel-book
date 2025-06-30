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
}
