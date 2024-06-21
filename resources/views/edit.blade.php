@extends('layouts.app')

@section('content')
    <h1>Modifica vino</h1>
    <div class="container">
        <form action="{{ route('wines.update', $wine->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Vineria</span>
                <input value="{{ old($wine->winery) }}"id="winery" name="winery" type="text" class="form-control"
                    aria-describedby="basic-addon1">

            </div>


            <button class="btn btn-success m-3" type="submit">Salva modifiche</button><a class="m-3 btn btn-outline-danger"
                href="{{ route('wines.index') }}">Annulla</a>
        </form>
    </div>
@endsection
