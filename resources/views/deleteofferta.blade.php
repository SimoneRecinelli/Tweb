@extends('public')
@section('content')
@foreach($offerte as $offerta)
{{ Form::open(array('route' => ['destroyofferta', $offerta->id], 'method' => 'POST')) }}
@method('DELETE')
{{ Form::token() }}
<a class="card" >
                <img src="{{ asset('img/amazon.png') }}?t={{ time() }}" >
            <div class="container_card">
                <p>{{$azienda->Nome}}</p>
            </div>
            </a>
            {{ Form::submit('Elimina offerta', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}  
        @endforeach
@endsection