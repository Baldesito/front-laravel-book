
@extends('layouts.app')

@section('title', 'Gestione Libri')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-book"></i> Gestione Libri</h1>
    <a href="{{ route('admin.books.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nuovo Libro
    </a>
</div>

<div class="card">
    <div class="card-header">
        <form method="GET" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cerca per titolo, autore, ISBN..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="category_id" class="form-select">
                    <option value="">Tutte le categorie</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-primary">
                    <i class="fas fa-search"></i> Cerca
                </button>
            </div>
        </form>
    </div>

    <div class="card-body">
        @if($books->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Copertina</th>
                            <th>Titolo</th>
                            <th>Autore</th>
                            <th>Categoria</th>
                            <th>ISBN</th>
                            <th>Copie</th>
                            <th>Disponibili</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>
                                    @if($book->cover_image)
                                        <img src="{{ Storage::url($book->cover_image) }}" alt="Copertina" style="width: 40px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center" style="width: 40px; height: 50px;">
                                            <i class="fas fa-book text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $book->title }}</strong>
                                    @if($book->publication_year)
                                        <br><small class="text-muted">({{ $book->publication_year }})</small>
                                    @endif
                                </td>
                                <td>{{ $book->author }}</td>
                                <td>
                                    <span class="badge bg-secondary">{{ $book->category->name }}</span>
                                </td>
                                <td><code>{{ $book->isbn }}</code></td>
                                <td>
                                    <span class="badge bg-primary">{{ $book->copies->count() }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-success">{{ $book->availableCopies->count() }}</span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-primary" title="Visualizza">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-secondary" title="Modifica">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $books->withQueryString()->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-book fa-3x text-muted mb-3"></i>
                <h5>Nessun libro trovato</h5>
                <p class="text-muted">Non ci sono libri che corrispondono ai criteri di ricerca.</p>
            </div>
        @endif
    </div>
</div>
@endsection
