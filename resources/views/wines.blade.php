@extends('layouts.app')

@section('content')
    <div class="container ">
        <h1 class="text-center py-5">Lista Vini</h1>
        <div class="row d-flex flex-wrap justify-content-center g-3">

            @for ($i = 0; $i < 30; $i++)
                <div class="col-3">
                    @php
                        $curItem = $wines[$i];
                    @endphp

                    <div class="card h-100 " style="width: 18rem;">
                        <img src="{{ $curItem['image'] }}" class="card-img-top" alt="{{ $curItem['wine'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $curItem['wine'] }}</h5>
                            <span class="h5">Azienda: </span><span>{{ $curItem['winery'] }}</span>
                            <br>
                            <span class="h5">Voto: </span><span>{{ $curItem['average'] }}</span>
                            <br>
                            <span class="h5">Recensione: </span><span>{{ $curItem['reviews'] }}</span>
                            <br>
                            <span class="h5">Città: </span><span>{{ $curItem['location'] }}</span>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

    </div>
@endsection
