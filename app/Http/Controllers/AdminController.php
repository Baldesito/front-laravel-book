<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCopy;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_books' => Book::count(),
            'total_copies' => BookCopy::count(),
            'active_reservations' => Reservation::where('status', 'attiva')->count(),
            'total_users' => User::where('role', 'user')->count()
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function books(Request $request)
    {
        $query = Book::with('category', 'copies');

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('author', 'like', '%' . $request->search . '%')
                  ->orWhere('isbn', 'like', '%' . $request->search . '%');
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        $books = $query->paginate(10);
        $categories = Category::all();

        return view('admin.books.index', compact('books', 'categories'));
    }

    public function createBook()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    public function storeBook(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'isbn' => 'required|unique:books',
            'author' => 'required',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        Book::create($data);

        return redirect()->route('admin.books')->with('success', 'Libro creato con successo!');
    }

    public function reservations()
    {
        $reservations = Reservation::with('user', 'bookCopy.book')
                                  ->where('status', 'attiva')
                                  ->paginate(10);

        return view('admin.reservations.index', compact('reservations'));
    }

    public function users()
    {
        $users = User::where('role', 'user')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function bookCopies(Book $book)
    {
    $book->load('copies');
    return view('admin.books.copies', compact('book'));
    }

    public function storeBookCopy(Request $request, Book $book)
    {
    $request->validate([
        'quantity' => 'required|integer|min:1|max:10',
        'condition' => 'required|in:ottimo,buono,discreto'
    ]);

    for ($i = 0; $i < $request->quantity; $i++) {
        $book->copies()->create([
            'condition' => $request->condition,
            'status' => 'disponibile',
            'barcode' => 'BC' . strtoupper(Str::random(10))
        ]);
    }

    return redirect()->route('admin.books.copies', $book)
                     ->with('success', $request->quantity . ' copie aggiunte con successo!');
    }
}
