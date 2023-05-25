@extends('public')
@section('content')

@foreach($aziende as $azienda)
{{ Form::open(array('route' => ['updateazienda', $azienda->idAzienda], 'method' => 'GET')) }}
@method('GET')
{{ Form::token() }}
<a class="card" >
    @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $azienda->image])
            <div class="container_card">
                <p>{{$azienda->NomeAzienda}}</p>
            </div>
            </a>
            {{ Form::submit('Modifica azienda', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}  
        @endforeach

@endsection