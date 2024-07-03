@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-center py-5">Lista Vini</h1>
            <a class="btn btn-success" href="{{ route('wines.create') }}">Crea nuovo prodotto</a>
        </div>
        <div class="row d-flex flex-wrap justify-content-center g-3">
            @if (Session::has('messageDelete'))
                <ul>
                    <li class="delete-msg alert alert-success"> {{ Session::get('messageDelete') }} </li>
                </ul>
            @endif

            @for ($i = 0; $i < 3; $i++)
                <div class="col-3">
                    @php
                        $curItem = $wines[$i];
                    @endphp

                    <div class="card h-100 " style="width: 18rem;">
                        @if (explode('/', $curItem->image)[0] == 'images')
                            <img src="{{ asset('storage/'. $curItem->image) }}" class="card-img-top"
                                alt="{{ $curItem['wine'] }}">
                        @endif
                        <img src="{{ $curItem['image'] }}" class="card-img-top" alt="{{ $curItem['wine'] }}">

                        <div class="card-body">
                            <h5 class="card-title">{{ $curItem['wine'] }}</h5>
                            <span class="h5">Azienda: </span><span>{{ $curItem['winery'] }}</span>
                            <br>
                            <span class="h5">Voto: </span><span>{{ $curItem['average'] }}</span>
                            <br>
                            <span class="h5">Recensione: </span><span>{{ $curItem['reviews'] }}</span>
                            <br>
                            <span class="h5">Città: </span><span>{{ $curItem['location'] }}</span><br>

                            <span class="h5">Tipo: </span><span>{{ $curItem['type'] }}</span><br>

                            <a href="{{ route('wines.show', ['wine' => $curItem->id]) }}"
                                class="btn btn-secondary mt-2">Dettagli</a>
                            <a href="{{ route('wines.edit', ['wine' => $curItem->id]) }}"
                                class="btn btn-warning mt-2">Modifica</a>
                            <form action="{{ route('wines.destroy', ['wine' => $curItem->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger delete-btn">&cross;</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

    </div>
@endsection
