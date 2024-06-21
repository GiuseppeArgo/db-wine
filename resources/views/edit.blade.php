@extends('layouts.app')

@section('content')
    <h1>Modifica vino</h1>
    <div class="container">
        <form action="{{ route('wines.update', $wine->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Vineria</span>
                <input value="{{ $wine->winery }}"id="winery" name="winery" type="text" class="form-control"
                    aria-describedby="basic-addon1">

            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Vino</span>
                <input value="{{ $wine->wine }}"id="wine" name="wine" type="text" class="form-control"
                    aria-describedby="basic-addon1">

            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Valutazione</span>
                <input value="{{ $wine->average }}"id="average " name="average " type="number" class="form-control"
                    aria-describedby="basic-addon1">

            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Numero recensioni</span>
                <input value="{{ $wine->reviews }}"id="reviews " name="reviews " type="number" class="form-control"
                    aria-describedby="basic-addon1">

            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Provenienza</span>
                <input value="{{ $wine->location }}"id="location " name="location " type="text" class="form-control"
                    aria-describedby="basic-addon1">

            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Url immagine</span>
                <input value="{{ $wine->image }}"id="image " name="image " type="text" class="form-control"
                    aria-describedby="basic-addon1">

            </div>


            <button class="btn btn-success m-3" type="submit">Salva modifiche</button><a class="m-3 btn btn-outline-danger"
                href="{{ route('wines.index') }}">Annulla</a>
        </form>
    </div>
@endsection
