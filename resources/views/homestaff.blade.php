@extends('public')

@section('content')
    <div class="static">
        <h1>Area Membro dello Staff</h1>
        <h2>Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}</h2>
        <h2>Recati sul tasto "Gestione Offerte" per gestire le offerte</h2>

</div>


    
@endsection