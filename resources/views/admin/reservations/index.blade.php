
@extends('layouts.app')

@section('title', 'Prenotazioni')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-calendar-check"></i> Prenotazioni Attive</h1>
</div>

<div class="card">
    <div class="card-body">
        @if($reservations->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Utente</th>
                            <th>Libro</th>
                            <th>Codice Copia</th>
                            <th>Condizione</th>
                            <th>Data Prenotazione</th>
                            <th>Status</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>
                                    <strong>{{ $reservation->user->name }}</strong>
                                    <br><small class="text-muted">{{ $reservation->user->email }}</small>
                                </td>
                                <td>
                                    <strong>{{ $reservation->bookCopy->book->title }}</strong>
                                    <br><small class="text-muted">{{ $reservation->bookCopy->book->author }}</small>
                                </td>
                                <td>
                                    <code>{{ $reservation->bookCopy->barcode }}</code>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $reservation->bookCopy->condition == 'ottimo' ? 'success' : ($reservation->bookCopy->condition == 'buono' ? 'primary' : 'warning') }}">
                                        {{ ucfirst($reservation->bookCopy->condition) }}
                                    </span>
                                </td>
                                <td>{{ $reservation->reserved_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <span class="badge bg-warning">{{ ucfirst($reservation->status) }}</span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-outline-success" title="Completa">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" title="Annulla">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $reservations->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-calendar-check fa-3x text-muted mb-3"></i>
                <h5>Nessuna prenotazione attiva</h5>
                <p class="text-muted">Non ci sono prenotazioni attive al momento.</p>
            </div>
        @endif
    </div>
</div>
@endsection
