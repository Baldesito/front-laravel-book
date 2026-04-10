
@extends('layouts.app')

@section('title', 'Nuova Categoria')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-plus"></i> Aggiungi Nuova Categoria</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.categories.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome Categoria *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        <div class="form-text">Descrizione opzionale della categoria</div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.categories') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Indietro
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Salva Categoria
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
