@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="py-4 text-center">Aggiungi un nuovo vino</h1>

        <div class="row">
            <div class="col-6 mx-auto">
                <form action="{{ route('wines.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="winery" class="form-label">Azienda</label>
                        <input type="text" class="form-control @error('winery') is-invalid @enderror" id="text" aria-describedby="winery" name="winery" value="{{ old('winery') }}">
                        @error('winery')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="wine" class="form-label">Vino</label>
                        <input type="text" class="form-control @error('wine') is-invalid @enderror" id="text" aria-describedby="wine" name="wine" value="{{ old('wine') }}">
                        @error('wine')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label for="wine" class="form-label">Inserisci Immagine</label>
                        <input type="file" class="form-control" id="text" aria-describedby="wine" name="image">
                    </div>

                    <label for="type" class="form-label">Tipo</label>
                    <select class="form-select mb-3" aria-label="select" id="type" name="type">
                        <option selected>Seleziona il tipo di vino</option>
                        <option value="Bianco">Bianco</option>
                        <option value="Rosso">Rosso</option>
                        <option value="Frizzante">Frizzante</option>
                        <option value="Rosé">Rosé</option>
                        <option value="Dessert">Dessert</option>
                        <option value="Porto">Porto</option>
                    </select>
                    <div class="mb-3">
                        <label for="average" class="form-label">Valutazioni</label>
                        <input type="text" class="form-control @error('average') is-invalid @enderror" id="text" aria-describedby="average" name="average" value="{{ old('average') }}">
                        @error('average')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-3">

                        <label for="reviews" class="form-label">Numero recensioni</label>
                        <input type="number" class="form-control  @error('reviews') is-invalid @enderror" id="text" aria-describedby="reviews" name="reviews" value="{{ old('reviews') }}">
                    @error('reviews')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="my-range" class="form-label">Media Voti</label>
                        <input id="my-range" type="range" class="form-range" id="text" aria-describedby="reviews" name="average"  min="0" max="5"  step="0.5">
                        <span id="range-value">0.0</span>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label ">Provenienza</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" id="text" aria-describedby="location"
                            name="location" value="{{ old('location') }}">
                            @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">URL Immagine</label>
                        <input type="text" class="form-control" id="text" aria-describedby="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-success">Salva nuovo prodotto</button>
                </form>

            </div>
        </div>

    </div>
@endsection
