@extends('layouts.app')

@section('content')
    <div class="container pt-5 d-flex justify-content-around align-items-center">
        <div class="mt-5">
            
            @if (explode('/', $wine->image)[0] == 'images')
                <img src="{{ asset('storage/' . $wine->image) }}" class="card-img-top" alt="{{ $wine->image }}">
                
            @else
                <img src="{{ $wine['image'] }}" class="card-img-top" alt="{{ $wine['wine'] }}">
            @endif
        </div>
        <div class="mt-5">
            <h5 class="mb-5">{{ $wine->wine }}</h5>
            <p class="mb-5">Azienda: {{ $wine->winery }}</p>
            <p class="mb-5">Città: {{ $wine->location }}</p>
            <p class="mb-5">Voto: {{ $wine->average }}</p>
            <p class="mb-5">Recensioni: {{ $wine->reviews }}</p>

            <p>Spezie e Aromi:</p>
            <ul>

                @forelse ($wine->spices as $spice)
                    <li>
                        {{ $spice->name }}
                    </li>
                @empty
                    <li>
                        Non ci sono aromi
                    </li>
                @endforelse
            </ul>
            <a href="{{ route('wines.index') }}" class="btn btn-secondary">Torna alla lista</a>
        </div>
    </div>
@endsection
