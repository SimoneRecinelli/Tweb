@extends('public')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/HomeStaff.css')}}">

    <div class="container-staff">

        <div class="container1">
            <h1>Area Membro dello Staff</h1>
            <h2>Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}</h2>
        </div>

        <div class="container2">
            <h2> Gestione offerte</h2>
            <a class="bottone" href="{{route('insertofferta')}}">Inserisci un'offerta</a>
            <a class="bottone" href="{{route('modificaofferta')}}">Modifica un'offerta</a>
            <a class="bottone-elimina" href="{{route('deleteofferta')}}">Elimina un'offerta</a>
        </div>

    </div>

@endsection