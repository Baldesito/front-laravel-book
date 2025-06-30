
@extends('layouts.app')

@section('title', 'Benvenuto')

@section('content')
<div class="jumbotron bg-primary text-white rounded p-5 mb-4">
    <div class="container-fluid py-5">
        <h1 class="display-4"><i class="fas fa-book-open"></i> Benvenuto nella nostra Biblioteca</h1>
        <p class="col-md-8 fs-4">Scopri migliaia di libri, prenota le tue letture preferite e gestisci le tue prenotazioni in modo semplice e veloce.</p>

        @guest
            <div class="mt-4">
                <a class="btn btn-light btn-lg me-3" href="{{ route('register') }}" role="button">
                    <i class="fas fa-user-plus"></i> Registrati
                </a>
                <a class="btn btn-outline-light btn-lg" href="{{ route('login') }}" role="button">
                    <i class="fas fa-sign-in-alt"></i> Accedi
                </a>
            </div>
        @else
            <div class="mt-4">
                <a class="btn btn-light btn-lg" href="{{ route('books.index') }}" role="button">
                    <i class="fas fa-search"></i> Esplora i Libri
                </a>
            </div>
        @endguest
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-search fa-3x text-primary mb-3"></i>
                <h5 class="card-title">Cerca e Scopri</h5>
                <p class="card-text">Esplora il nostro vasto catalogo di libri con filtri avanzati per categoria, autore e titolo.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-calendar-check fa-3x text-success mb-3"></i>
                <h5 class="card-title">Prenota Facilmente</h5>
                <p class="card-text">Prenota i tuoi libri preferiti con un semplice click e ricevi conferma immediata.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-star fa-3x text-warning mb-3"></i>
                <h5 class="card-title">Qualità Garantita</h5>
                <p class="card-text">Tutte le nostre copie sono catalogate per condizione, garantendo sempre la migliore esperienza di lettura.</p>
            </div>
        </div>
    </div>
</div>

@auth
<div class="row mt-5">
    <div class="col-12">
        <h3><i class="fas fa-fire"></i> I Tuoi Ultimi Libri</h3>
        <p class="text-muted">Ecco alcuni suggerimenti basati sulle tue preferenze</p>
        {{-- Qui potresti aggiungere una sezione con libri consigliati --}}
    </div>
</div>
@endauth
@endsection
