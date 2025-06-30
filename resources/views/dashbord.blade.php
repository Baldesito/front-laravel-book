
@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <h1><i class="fas fa-tachometer-alt"></i> Dashboard Amministratore</h1>
        <p class="text-muted">Benvenuto nel pannello di controllo della biblioteca</p>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $stats['total_books'] }}</h4>
                        <p class="mb-0">Libri</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-book fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $stats['total_copies'] }}</h4>
                        <p class="mb-0">Copie</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-copy fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $stats['active_reservations'] }}</h4>
                        <p class="mb-0">Prenotazioni</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-calendar-check fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $stats['total_users'] }}</h4>
                        <p class="mb-0">Utenti</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-cogs"></i> Gestione Contenuti</h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <a href="{{ route('admin.books') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-book"></i> Gestione Libri
                        <small class="text-muted float-end">{{ $stats['total_books'] }} libri</small>
                    </a>
                    <a href="{{ route('admin.categories') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-tags"></i> Gestione Categorie
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-users"></i> Gestione Utenti</h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <a href="{{ route('admin.reservations') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-calendar-check"></i> Prenotazioni Attive
                        <small class="text-muted float-end">{{ $stats['active_reservations'] }} attive</small>
                    </a>
                    <a href="{{ route('admin.users') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-users"></i> Utenti Registrati
                        <small class="text-muted float-end">{{ $stats['total_users'] }} utenti</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
