@extends('public')
@section('content')

@foreach($aziende as $azienda)
{{ Form::open(array('route' => ['updateazienda', $azienda->idAzienda], 'method' => 'GET')) }}
@method('GET')
{{ Form::token() }}
<a class="card" >
                <img src="{{ asset('img/amazon.png') }}?t={{ time() }}" >
            <div class="container_card">
                <p>{{$azienda->NomeAzienda}}</p>
            </div>
            </a>
            {{ Form::submit('Modifica azienda', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}  
        @endforeach

@endsection