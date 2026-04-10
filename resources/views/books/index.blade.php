@extends('layouts.app')

@section('title', 'Catalogo Libri')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fas fa-book"></i> Catalogo Libri</h1>
    </div>

    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header bg-white border-bottom-0 pt-3">
            <form method="GET" class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cerca per titolo o autore..." value="{{ request('search') }}">
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
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search"></i> Cerca
                    </button>
                </div>
                @if(request('search') || request('category_id'))
                    <div class="col-md-2">
                        <a href="{{ route('books.index') }}" class="btn btn-outline-secondary w-100">
                            <i class="fas fa-times"></i> Reset
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>

    @if($books->count() > 0)
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">
            @foreach($books as $book)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">

                        @if($book->cover_image)
                            @if(Str::startsWith($book->cover_image, ['http://', 'https://']))
                                <img src="{{ $book->cover_image }}" class="card-img-top" alt="{{ $book->title }}" style="height: 280px; object-fit: cover;">
                            @else
                                <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top" alt="{{ $book->title }}" style="height: 280px; object-fit: cover;">
                            @endif
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 280px;">
                                <i class="fas fa-book fa-3x text-muted"></i>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-truncate" title="{{ $book->title }}">{{ $book->title }}</h5>
                            <h6 class="card-subtitle mb-3 text-muted">{{ $book->author }}</h6>

                            <span class="badge bg-primary bg-opacity-10 text-primary mb-3 align-self-start">{{ $book->category->name }}</span>

                            <p class="card-text text-muted small flex-grow-1">
                                {{ Str::limit($book->description, 80, '...') }}
                            </p>
                        </div>

                        <div class="card-footer bg-white border-top-0 pt-0 pb-3">
                            <a href="{{ route('books.show', $book) }}" class="btn btn-primary w-100">
                                <i class="fas fa-eye me-1"></i> Visualizza Dettagli
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $books->withQueryString()->links() }}
        </div>
    @else
        <div class="text-center py-5">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h3>Nessun libro trovato</h3>
            @if(request('search') || request('category_id'))
                <p class="text-muted">Non ci sono libri che corrispondono ai criteri di ricerca.</p>
                <a href="{{ route('books.index') }}" class="btn btn-primary">
                    <i class="fas fa-refresh"></i> Visualizza tutti i libri
                </a>
            @else
                <p class="text-muted">Il catalogo è vuoto. Torna più tardi!</p>
            @endif
        </div>
    @endif
</div>

@if(auth()->check() && auth()->user()->isAdmin())
    <div class="position-fixed bottom-0 end-0 m-4">
        <a href="{{ route('admin.books.create') }}" class="btn btn-success btn-lg rounded-circle shadow" title="Aggiungi nuovo libro">
            <i class="fas fa-plus"></i>
        </a>
    </div>
@endif
@endsection
