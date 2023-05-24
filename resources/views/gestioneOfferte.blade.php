@extends('public')

@section('content')
    <div class="static">
        <h1> Gestione offerte</h1>
        <a href="{{route('insertofferta')}}">Inserisci un'offerta</a>
        <a href="{{route('deleteofferta')}}">Elimina un'offerta</a>
        <a href="{{route('modificaofferta')}}">Modifica un'offerta</a>

    </div>



@endsection