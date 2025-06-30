@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @if($book->cover_image)
                <img src="{{ Storage::url($book->cover_image) }}" class="img-fluid rounded shadow" alt="{{ $book->title }}">
            @else
                <div class="bg-light d-flex align-items-center justify-content-center rounded shadow" style="height: 400px;">
                    <i class="fas fa-book fa-5x text-muted"></i>
                </div>
            @endif
        </div>

        <div class="col-md-8">
            <div class="mb-3">
                <a href="{{ route('books.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Torna al catalogo
                </a>
            </div>

            <h1 class="mb-3">{{ $book->title }}</h1>

            <div class="row mb-4">
                <div class="col-md-6">
                    <p><strong>Autore:</strong> {{ $book->author }}</p>
                    <p><strong>ISBN:</strong> <code>{{ $book->isbn }}</code></p>
                    <p><strong>Categoria:</strong>
                        <span class="badge bg-secondary fs-6">{{ $book->category->name }}</span>
                    </p>
                </div>
                <div class="col-md-6">
                    @if($book->publisher)
                        <p><strong>Editore:</strong> {{ $book->publisher }}</p>
                    @endif
                    @if($book->publication_year)
                        <p><strong>Anno di pubblicazione:</strong> {{ $book->publication_year }}</p>
                    @endif
                    <p><strong>Copie disponibili:</strong>
                        <span class="badge bg-success">{{ $book->availableCopies->count() }}</span>
                    </p>
                </div>
            </div>

            @if($book->description)
                <div class="mb-4">
                    <h5>Descrizione</h5>
                    <p class="text-muted">{{ $book->description }}</p>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    @if($bestCopy)
                        <h5 class="card-title text-success">
                            <i class="fas fa-check-circle"></i> Libro disponibile
                        </h5>
                        <p class="card-text">
                            Copia disponibile in condizione:
                            <span class="badge bg-{{ $bestCopy->condition == 'ottimo' ? 'success' : ($bestCopy->condition == 'buono' ? 'primary' : 'warning') }}">
                                {{ ucfirst($bestCopy->condition) }}
                            </span>
                        </p>

                        @auth
                            <form method="POST" action="{{ route('books.reserve', $book) }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="fas fa-calendar-plus"></i> Prenota questo libro
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                                <i class="fas fa-sign-in-alt"></i> Accedi per prenotare
                            </a>
                        @endauth
                    @else
                        <h5 class="card-title text-warning">
                            <i class="fas fa-exclamation-triangle"></i> Non disponibile
                        </h5>
                        <p class="card-text">Nessuna copia disponibile al momento. Riprova più tardi!</p>
                        <button class="btn btn-secondary btn-lg" disabled>
                            <i class="fas fa-ban"></i> Non disponibile
                        </button>
                    @endif
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success mt-3">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger mt-3">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

    @if($book->availableCopies->count() > 1)
        <div class="row mt-5">
            <div class="col-12">
                <h5>Copie disponibili</h5>
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Codice</th>
                                <th>Condizione</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($book->availableCopies as $copy)
                                <tr>
                                    <td><code>{{ $copy->barcode }}</code></td>
                                    <td>
                                        <span class="badge bg-{{ $copy->condition == 'ottimo' ? 'success' : ($copy->condition == 'buono' ? 'primary' : 'warning') }}">
                                            {{ ucfirst($copy->condition) }}
                                        </span>
                                    </td>
                                    <td>{{ $copy->notes ?? 'Nessuna nota' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
