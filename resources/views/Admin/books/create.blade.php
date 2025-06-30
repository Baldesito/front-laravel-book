@extends('layouts.app')

@section('title', 'Gestione Copie - ' . $book->title)

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <h1>Gestione Copie: {{ $book->title }}</h1>
            <p class="text-muted">di {{ $book->author }}</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Aggiungi Copie</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.books.copies.store', $book) }}">
                        @csrf

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Numero di copie da aggiungere</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                   id="quantity" name="quantity" value="1" min="1" max="10" required>
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="condition" class="form-label">Condizione</label>
                            <select class="form-select @error('condition') is-invalid @enderror"
                                    id="condition" name="condition" required>
                                <option value="ottimo">Ottimo</option>
                                <option value="buono" selected>Buono</option>
                                <option value="discreto">Discreto</option>
                            </select>
                            @error('condition')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Aggiungi Copie
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Copie Esistenti ({{ $book->copies->count() }})</h5>
                </div>
                <div class="card-body">
                    @if($book->copies->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Codice</th>
                                        <th>Condizione</th>
                                        <th>Status</th>
                                        <th>Note</th>
                                        <th>Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($book->copies as $copy)
                                        <tr>
                                            <td><code>{{ $copy->barcode }}</code></td>
                                            <td>
                                                <span class="badge bg-{{ $copy->condition == 'ottimo' ? 'success' : ($copy->condition == 'buono' ? 'primary' : 'warning') }}">
                                                    {{ ucfirst($copy->condition) }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-{{ $copy->status == 'disponibile' ? 'success' : 'danger' }}">
                                                    {{ ucfirst($copy->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $copy->notes ?? '-' }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-danger" title="Elimina">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center text-muted">Nessuna copia presente. Aggiungine una!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.books') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Torna alla lista libri
        </a>
    </div>
</div>
@endsection
