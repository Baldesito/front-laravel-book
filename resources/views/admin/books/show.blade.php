{{-- resources/views/books/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        @if($book->cover_image)
            <img src="{{ Storage::url($book->cover_image) }}" class="img-fluid">
        @endif
    </div>
    <div class="col-md-8">
        <h1>{{ $book->title }}</h1>
        <p><strong>Autore:</strong> {{ $book->author }}</p>
        <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
        <p><strong>Categoria:</strong> {{ $book->category->name }}</p>
        @if($book->description)
            <p><strong>Descrizione:</strong> {{ $book->description }}</p>
        @endif

        @if($bestCopy)
            <div class="alert alert-success">
                <strong>Copia disponibile:</strong> Condizione {{ $bestCopy->condition }}
            </div>

            @auth
                <form method="POST" action="{{ route('books.reserve', $book) }}">
                    @csrf
                    <button type="submit" class="btn btn-success">Prenota questo libro</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Accedi per prenotare</a>
            @endauth
        @else
            <div class="alert alert-warning">
                Nessuna copia disponibile al momento
            </div>
        @endif
    </div>
</div>
@endsection
