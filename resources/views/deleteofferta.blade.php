@extends('public')
@section('content')
@foreach($offerte as $offerta)
{{ Form::open(array('route' => ['destroyofferta', $offerta->id], 'method' => 'POST')) }}
@method('DELETE')
{{ Form::token() }}
<a class="card" >
                <img src="{{ asset('img/amazon.png') }}?t={{ time() }}" >
            <div class="container_card">
                <p>{{$offerta->DescrizioneOfferta}}</p>
                <p>{{$offerta->Categoria}}</p>
                <p>{{$offerta->Scadenza}}</p>
                <p>{{$offerta->Oggetto}}</p>
                <p>{{$offerta->Azienda}}</p>
                <p>{{$offerta->Prezzo}}</p>
                <p>{{$offerta->PercentualeSconto}}</p>
                <p>{{$offerta->Luogo}}</p>
                <p>{{$offerta->Modalità}}</p>
                <p>{{$offerta->Evidenza}}</p>
            </div>
            </a>
            {{ Form::submit('Elimina offerta', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}  
        @endforeach
@endsection