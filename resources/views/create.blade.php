@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="py-4 text-center">Aggiungi un nuovo vino</h1>

        <div class="row">
            <div class="col-6 mx-auto">
                <form action="{{ route('wines.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="winery" class="form-label">Azienda</label>
                        <input type="text" class="form-control" id="text" aria-describedby="winery" name="winery">
                    </div>
                    <div class="mb-3">
                        <label for="wine" class="form-label">Vino</label>
                        <input type="text" class="form-control" id="text" aria-describedby="wine" name="wine">
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
                        <label for="average" class="form-label">Voto</label>
                        <input type="text" class="form-control" id="text" aria-describedby="average" name="average">
                    </div>
                    <div class="mb-3">
                        <label for="reviews" class="form-label">Recensioni</label>
                        <input type="text" class="form-control" id="text" aria-describedby="reviews" name="reviews">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Città</label>
                        <input type="text" class="form-control" id="text" aria-describedby="location"
                            name="location">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="text" class="form-control" id="text" aria-describedby="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-success">Salva</button>
                </form>

            </div>
        </div>

    </div>
@endsection
