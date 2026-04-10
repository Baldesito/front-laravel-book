@extends('layouts.app')

@section('title', 'Le Mie Prenotazioni')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fas fa-calendar-check"></i> Le Mie Prenotazioni</h1>
        <a href="{{ route('books.index') }}" class="btn btn-outline-primary">
            <i class="fas fa-book"></i> Torna al Catalogo
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($reservations->count() > 0)
        <div class="row">
            @foreach($reservations as $reservation)
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-header bg-warning text-dark">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-clock"></i> Prenotazione Attiva</span>
                                <small>{{ $reservation->reserved_at->format('d/m/Y H:i') }}</small>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    @if($reservation->bookCopy->book->cover_image)
                                        <img src="{{ Storage::url($reservation->bookCopy->book->cover_image) }}"
                                             class="img-fluid rounded"
                                             alt="{{ $reservation->bookCopy->book->title }}"
                                             style="max-height: 120px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 120px;">
                                            <i class="fas fa-book fa-2x text-muted"></i>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-8">
                                    <h5 class="card-title">{{ $reservation->bookCopy->book->title }}</h5>
                                    <p class="card-text">
                                        <strong>Autore:</strong> {{ $reservation->bookCopy->book->author }}<br>
                                        <strong>Categoria:</strong>
                                        <span class="badge bg-secondary">{{ $reservation->bookCopy->book->category->name }}</span><br>
                                        <strong>Codice Copia:</strong> <code>{{ $reservation->bookCopy->barcode }}</code><br>
                                        <strong>Condizione:</strong>
                                        <span class="badge bg-{{ $reservation->bookCopy->condition == 'ottimo' ? 'success' : ($reservation->bookCopy->condition == 'buono' ? 'primary' : 'warning') }}">
                                            {{ ucfirst($reservation->bookCopy->condition) }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i>
                                    Prenotato {{ $reservation->reserved_at->diffForHumans() }}
                                </small>

                                <form method="POST" action="{{ route('books.reservations.cancel', $reservation) }}"
                                      onsubmit="return confirm('Sei sicuro di voler annullare questa prenotazione?')"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-times"></i> Annulla Prenotazione
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $reservations->links() }}
        </div>
    @else
        <div class="text-center py-5">
            <i class="fas fa-calendar-times fa-4x text-muted mb-4"></i>
            <h3>Nessuna prenotazione attiva</h3>
            <p class="text-muted mb-4">Non hai ancora prenotato nessun libro.</p>
            <a href="{{ route('books.index') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-search"></i> Esplora il Catalogo
            </a>
        </div>
    @endif
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body text-center">
                    <h4>{{ $reservations->total() }}</h4>
                    <p class="mb-0">Prenotazioni Attive</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <h4>{{ auth()->user()->reservations()->where('status', 'completata')->count() }}</h4>
                    <p class="mb-0">Libri Letti</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-white">
                <div class="card-body text-center">
                    <h4>{{ auth()->user()->reservations()->where('status', 'annullata')->count() }}</h4>
                    <p class="mb-0">Prenotazioni Annullate</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
