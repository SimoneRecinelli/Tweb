@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/GestioneFaq.css')}}">

<div class="section">
    <br>
<h2 class="titolo">OFFERTE</h2>

    <table class="table">
            <tr>
                <th>Oggetto</th>
                <th>Descrizione</th>
                <th>Categoria</th>
                <th>Scadenza</th>
                <th>Azienda</th>
                <th>Prezzo</th>
                <th>Percentuale</th>
                <th>Luogo</th>
                <th>Modalità</th>
                <th>Evidenza</th>
                <th>Modifica</th>
                <th>Elimina</th>
            </tr>
        <tbody>
            @isset($offerte)
            @foreach($offerte as $offerta)
                <tr>
                    <td>{{$offerta->Oggetto}}</td>
                    <td>{{$offerta->DescrizioneOfferta}}</td>
                    <td>{{$offerta->Categoria}}</td>
                    <td>{{$offerta->Scadenza}}</td>
                    <td>{{$offerta->NomeAzienda}}</td>
                    <td>{{$offerta->Prezzo}}</td>
                    <td>{{$offerta->PercentualeSconto}}%</td>
                    <td>{{$offerta->Luogo}}</td>
                    <td>{{$offerta->Modalità}}</td>
                    <td>{{$offerta->Evidenza}}</td>
                    <td>
                        {{ Form::open(array('route' => ['updateofferta', $offerta->idOfferta], 'method' => 'GET')) }}
                        @method('GET')
                        @csrf
                        {{ Form::token() }}
                        {{ Form::submit('Modifica offerta', ['class' => 'btn-modify']) }}
                        {{ Form::close() }}
                    </td>

                    <td>
                    {{ Form::open(array('route' => ['destroyofferta', $offerta->idOfferta], 'method' => 'POST')) }}
                    @method('DELETE')
                    {{ Form::token() }}
                    {{ Form::submit('Elimina offerta', ['class' => 'btn-delete']) }}
                    {{ Form::close() }} 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('pagination.paginator', ['paginator' => $offerte])
@endisset()

<p class=ancora-back> <a href="{{route('homestaff')}}">Torna Indietro</a> </p>


@endsection
