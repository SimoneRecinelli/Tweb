@extends('public')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/HomeAdmin.css')}}">

    <div class="container-admin">
        <div class="container1">

            <h1>Area di gestione admin</h1>
            <h2>Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}</h2>
    
        </div>

        <div class="container2">
            <h2> Gestione aziende</h2>
            <a class="bottone" href="{{route('insertazienda')}}">Inserisci Azienda</a>
            <a class="bottone" href="{{route('modificaazienda')}}">Modifica/elimina Azienda</a>
        </div>

        <div class="container2">
            <h2> Gestione Faq </h2>
            <a class="bottone" href="{{ route('insertfaq') }}">Inserisci Faq</a>
            <a class="bottone" href="{{ route('gestionefaq') }}">Modifica/elimina Faq</a>
        </div>

        <div class="container2">
            <h2> Gestione Membri Dello Staff </h2>
            <a class="bottone" href="{{route('insertStaff')}}">Inserisci Membro Staff</a>
            <a class="bottone" href="{{route('showStaff')}}">Modifica/elimina Membro Staff</a>
        </div>

        <div class="container2">
            <h2> Gestione utenti</h2>
            <a class="bottone-elimina" href="{{route('showUtenti')}}">Elimina Utente</a>
        </div>

    </div>
@endsection()


