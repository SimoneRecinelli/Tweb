@extends('public')
@section('content')

@foreach($offerte as $offerta)
{{ Form::open(array('route' => ['updateofferta', $offerta->idOfferta], 'method' => 'GET')) }}
@method('GET')
@csrf
{{ Form::token() }}
<a class="card" >
            <div class="container_card">
                <p>Descrizione offerta: {{$offerta->DescrizioneOfferta}}</p>
                <p>Categoria: {{$offerta->Categoria}}</p>
                <p>Scadenza: {{$offerta->Scadenza}}</p>
                <p>Oggetto: {{$offerta->Oggetto}}</p>
                <p>Nome Azienda: {{$offerta->NomeAzienda}}</p>
                <p>Prezzo: {{$offerta->Prezzo}}</p>
                <p>Percentuale sconto: {{$offerta->PercentualeSconto}}%</p>
                <p>Luogo: {{$offerta->Luogo}}</p>
                <p>Modalità: {{$offerta->Modalità}}</p>
                <p>Evidenza: {{$offerta->Evidenza}}</p>
                <p>Immagine:</p>
                @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $offerta->image])
            </div>
            </a>
            {{ Form::submit('Modifica offerta', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}  
        @endforeach

@endsection