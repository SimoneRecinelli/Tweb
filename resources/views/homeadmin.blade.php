@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/HomeAdmin.css')}}">

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
        <a href="{{route('insertazienda')}}">Inserisci un'azienda'</a>
        <a href="{{route('deleteazienda')}}">Elimina un'azienda'</a>
        <a href="{{route('modificaazienda')}}">Modifica un'azienda'</a>

<h3>Numero totale coupon emessi {{$num}}</h3>

    <h2> Gestione Membri Dello Staff </h2>
        <a href="{{route('insertStaff')}}">Inserisci un membro dello staff</a>
        <a href="{{route('insertazienda')}}">Modifica un membro dello staff</a>
        <a href="{{route('insertazienda')}}">Elimina un membro dello staff</a>
</div>


@endsection()