@extends('layouts.app')

@section('content')
    <h1>Modifica vino</h1>
    <div class="container">
        <form action="{{ route('wines.update', $wine->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Azienda</span>
                <input value="{{ $wine->winery }}"id="winery" name="winery" type="text" class="form-control"
                    aria-describedby="basic-addon1">

            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Vino</span>
                <input value="{{ $wine->wine }}"id="wine" name="wine" type="text" class="form-control"
                    aria-describedby="basic-addon1">

            </div>

            <div class="mb-3">
                <label for="wine" class="form-label">Inserisci Immagine</label>
                <input type="file" class="form-control" id="text" aria-describedby="wine" name="image">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Valutazione</span>
                <input value="{{ $wine->average }}"id="average " name="average " type="number" class="form-control"
                    aria-describedby="basic-addon1">

            </div>

            <div class="mb-3">
                <label for="reviews" class="form-label">Numero recensioni</label>
                <input type="number" class="form-control" id="text" aria-describedby="reviews" name="reviews">
            </div>
            
            <div class="mb-3">
                <label for="my-range" class="form-label">Media Voti</label>
                <input id="my-range" type="range" class="form-range" id="text" aria-describedby="reviews" name="average"  min="0" max="5"  step="0.5">
                <span id="range-value">0.0</span>
            </div>


            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Provenienza</span>
                <input value="{{ $wine->location }}"id="location " name="location " type="text" class="form-control"
                    aria-describedby="basic-addon1">

            </div>

            <div class="mb-3">
                <div class="" role="group">
                    <select class="form-select" multiple aria-label="Multiple select example" name="spices[]">
                        @foreach ($spices as $spice)
                            <option @selected(in_array($spice->id, old('spices', []))) value="{{ $spice->id }}" >
                                {{ $spice->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Url immagine</span>
                <input value="{{ $wine->image }}"id="image " name="image " type="text" class="form-control"
                    aria-describedby="basic-addon1">

            </div>


            <button class="btn btn-success m-3" type="submit">Salva modifiche</button>
            <a class="m-3 btn btn-outline-danger"href="{{ route('wines.index') }}">Annulla</a>
        </form>
    </div>
@endsection
