@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/HomeAdmin.css')}}">

<div id="catalogo">

    <h1>Area Amministratore</h1>
    <h4>Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}</h4>
    <h4>Recati sul bottone "Gestione" per gestire le aziende e i membri dello staff</h4>
</div>


@endsection()