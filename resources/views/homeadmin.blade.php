@extends('public')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/HomeAdmin.css')}}">

    <div class="container-admin">
        <div class="container1">

            <h1>Area di gestione admin</h1>
            <h2>Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}</h2>
            <h3>Gestisci le aziende o i membri dello staff:</h3>
        </div>

        <div class="container2">
            <h2> Gestione aziende</h2>
            <a class="bottone" href="{{route('insertazienda')}}">Inserisci Azienda</a>
            <a class="bottone" href="{{route('modificaazienda')}}">Modifica Azienda</a>
        </div>

        <div class="container3">
            <h2> Gestione Membri Dello Staff </h2>
            <a class="bottone" href="{{route('insertStaff')}}">Inserisci Membro Staff</a>
            <a class="bottone" href="{{route('showStaff')}}">Modifica Membro Staff</a>
            </div>

        <div class="container4">
            <h2> Gestione utente</h2>
            <a class="bottone-elimina" href="{{route('showUtenti')}}">Elimina Utente</a>
        </div>

    </div>
@endsection()


