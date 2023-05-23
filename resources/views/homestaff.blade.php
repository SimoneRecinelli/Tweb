@extends('public')

@section('content')
    <div class="static">
        <h3>Area Membro dello Staff</h3>
        <p>Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}</p>
        <p>Seleziona la funzione da attivare</p>

        <h2> Gestione offerte</h2>
<a href="{{route('insertofferta')}}">inserisci un'offerta'</a>
<a href="{{route('deleteofferta')}}">elimina un'offerta'</a>
<a href="{{route('modificaofferta')}}">modifica un'offerta'</a>

</div>


    
@endsection