@extends('layouts.app')

@section('content')
    <div class="container ">
        <h1 class="text-center fw-bold py-5" style="font-size: 4rem;">🥂 Lista Vini 🍷</h1>
        <div class="d-flex justify-content-between align-items-center py-2">
            <a class="btn btn-primary align-self-start" href="{{ route('wines.create') }}">Crea nuovo prodotto</a>

            <div class="pb-4 d-flex justify-content-end">
                <form class="d-flex" action="{{ route('wines.index') }}" method="GET">
                    @csrf
                    <label class="me-2" for="per_page"><small class=" text-secondary">Elementi per
                            pagina</small></label>
                    <div class="col-xs-2 me-2">
                        <select class="form-select form-select-sm" aria-label="Seleziona il numero di elementi per pagina"
                            name="per_page" id="per_page">
                            <option selected value="5" @selected($wines->perPage() == 5)>5</option>
                            <option value="10" @selected($wines->perPage() == 10)>10</option>
                            <option value="15" @selected($wines->perPage() == 15)>15</option>
                            <option value="20" @selected($wines->perPage() == 20)>20</option>
                            <option value="50" @selected($wines->perPage() == 50)>50</option>
                            <option value="100" @selected($wines->perPage() == 100)>100</option>
                        </select>

                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Applica</button>
                </form>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 pb-4">
            @if (Session::has('messageDelete'))
                <ul>
                    <li class="delete-msg alert alert-success"> {{ Session::get('messageDelete') }} </li>
                </ul>
            @endif

            @foreach ($wines as $curItem)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ $curItem['image'] }}" class="card-img-top" alt="{{ $curItem['wine'] }}"
                            style="width: 200px; object-fit: cover; margin: auto;">



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
            @endforeach
        </div>
        <div class="pt-2">{{ $wines->links() }}</div>
    </div>
@endsection
