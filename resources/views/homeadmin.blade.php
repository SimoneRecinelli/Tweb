@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/Catalogo.css')}}">

<div id="catalogo">

        <h2>Aziende</h2>
        @if (count($aziende) == 0)
    <p>Siamo spiacenti ma i parametri da lei selezionati non hanno prodotto nessuno risultato</p>
    @else
    @foreach($aziende as $azienda)

            <a class="card" href="">
                <img src="{{ asset('img/product/amazon.png') }}?t={{ time() }}" >
            <div class="container_card">
                <p>{{$azienda->Nome}}</p>
            </div>
            </a>
        @endforeach
    @endif

    <h2> Gestione aziende</h2>
<a href="{{route('insertazienda')}}">inserisci un'azienda'</a>
<a href="{{route('deleteazienda')}}">elimina un'azienda'</a>
<a href="{{route('modificaazienda')}}">modifica un'azienda'</a>

    <h1>Profilo utente</h1>
    <p><strong>Nome:</strong> {{ Auth::user()->nome }}</p>
    <p><strong>Cognome:</strong> {{ Auth::user()->cognome }}</p>
    <p><strong>Genere:</strong> {{ Auth::user()->genere }}</p>
    <p><strong>Età:</strong> {{ Auth::user()->eta }}</p>
    <p><strong>Residenza:</strong> {{ Auth::user()->residenza }}</p>
    <p><strong>Telefono:</strong> {{ Auth::user()->telefono }}</p>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    <p><strong>Username:</strong> {{ Auth::user()->username }}</p>
    <p><strong>Password:</strong> {{ Auth::user()->password }}</p>
    <p><strong>Ruolo:</strong> {{ Auth::user()->role }}</p>

</div>


@endsection()