@extends('public')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/Catalogo.css')}}">


    <div id="container">

        <div class="search_container">
            <form action="{{ route('search')}}" method="GET">
                <label for="oggetto">Oggetto:</label><input id="obj" type="text" name="oggetto"
                                                            placeholder="Inserisci l'oggetto dell'offerta">
                <label for="azienda">Azienda:</label><input id="azienda" type="text" name="azienda"
                                                            placeholder="Inserisci l'azienda dell'offerta">
                <button id="button" type="submit">Cerca</button>
            </form>
        </div>


        <div id="categorie">
            <h3>Scegli una categoria</h3>
            <br>
            @foreach($categorie as $categoria)
                <label>
                    <input type="radio" name="categoria" value="{{ $categoria }}"
                           onclick="window.location.href='{{ route('catalogo', [$categoria]) }}'"
                    @isset($catselezionata)
                        {{$categoria == $catselezionata ? 'checked' : ''}}
                            @endisset>

                    {{ $categoria }}
                </label><br>
            @endforeach
        </div>


        <div id="catalogo">
            <h2>Offerte</h2>
            @if (count($offerte) == 0)
                <p>Siamo spiacenti ma i parametri da lei selezionati non hanno prodotto nessuno risultato</p>
            @else

                @isset($offerte)
                    @foreach($offerte as $offerta)
                        <a class="card" href="{{ route('coupon', [$offerta->idOfferta]) }}">
                            <h3>{{$offerta->NomeAzienda}}</h3>
                            <div class="image">
                                @include('helpers.productImg', ['attrs' => 'imagefrm', 'imgFile' => $offerta->image])
                            </div>
                            <div class="container_card">
                                <p>{{$offerta->Oggetto}}</p>
                                <p style="font-size:30px;">-{{$offerta->PercentualeSconto}}%</p>
                            </div>
                        </a>

                    @endforeach
                    @include('pagination.paginator', ['paginator' => $offerte])

                @endisset()

            @endif


        </div>

@endsection