@extends('public')
@section('content')
@foreach($offerte as $offerta)
{{ Form::open(array('route' => ['destroyofferta', $offerta->idOfferta], 'method' => 'POST')) }}
@method('DELETE')
{{ Form::token() }}
<a class="card" >
                <img src="{{ asset('img/amazon.png') }}?t={{ time() }}" >
            <div class="container_card">
                <p>Descrizione offerta: {{$offerta->DescrizioneOfferta}}</p>
                <p>Categoria: {{$offerta->Categoria}}</p>
                <p>Scadenza: {{$offerta->Scadenza}}</p>
                <p>Oggetto: {{$offerta->Oggetto}}</p>
                <p>Azienda: {{$offerta->idOfferta}}</p>
                <p>Prezzo: {{$offerta->Prezzo}}</p>
                <p>Percentuale Sconto: {{$offerta->PercentualeSconto}}%</p>
                <p>Luogo: {{$offerta->Luogo}}</p>
                <p>Modalità: {{$offerta->Modalità}}</p>
                <p>Evidenza: {{$offerta->Evidenza}}</p>
            </div>
            </a>
            {{ Form::submit('Elimina offerta', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}  
        @endforeach
@endsection