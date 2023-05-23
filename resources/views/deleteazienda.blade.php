@extends('public')
@section('content')
@foreach($aziende as $azienda)
{{ Form::open(array('route' => ['destroyazienda', $azienda->id], 'method' => 'POST')) }}
@method('DELETE')
{{ Form::token() }}
<a class="card" >
                <img src="{{ asset('img/amazon.png') }}?t={{ time() }}" >
            <div class="container_card">
                <p>{{$azienda->Nome}}</p>
            </div>
            </a>
            {{ Form::submit('Elimina azienda', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}  
        @endforeach
@endsection