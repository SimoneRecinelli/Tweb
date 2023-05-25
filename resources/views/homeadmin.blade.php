@extends('public')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/HomeAdmin.css')}}">

    <div id="catalogo">

        <h1>Area di gestione admin</h1>

        <h4>Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}</h4>
        <h4>Gestisci le aziende o i membri dello staff:</h4>


        <h2> Gestione aziende</h2>
        <a href="{{route('insertazienda')}}">Inserisci Azienda</a>
        <a href="{{route('deleteazienda')}}">Elimina Azienda</a>
        <a href="{{route('modificaazienda')}}">Modifica Azienda</a>


        <hr>

        <h2> Gestione Membri Dello Staff </h2>
        <a href="{{route('insertStaff')}}">Inserisci un membro dello staff</a>
        <a href="{{route('showStaff')}}">Modifica un membro dello staff</a>
        <a href="{{route('deleteStaff')}}">Elimina un membro dello staff</a>
    </div>
    <hr>

@endsection()


