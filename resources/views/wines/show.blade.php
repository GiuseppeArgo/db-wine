@extends('layouts.app')

@section('content')
    <div class="container pt-5 d-flex justify-content-around align-items-center">
        <div class="mt-5">
            <img src="{{ $wine->image }}" alt="{{ $wine->wine }}">
        </div>
        <div class="mt-5">
            <h5 class="mb-5">{{ $wine->wine }}</h5>
            <p class="mb-5">Azienda: {{ $wine->winery }}</p>
            <p class="mb-5">Città: {{ $wine->location }}</p>
            <p class="mb-5">Voto: {{ $wine->average }}</p>
            <p class="mb-5">Recensioni: {{ $wine->reviews }}</p>
            <a href="{{ route('wines.index') }}" class="btn btn-secondary">Torna alla lista</a>
        </div>
    </div>
@endsection
