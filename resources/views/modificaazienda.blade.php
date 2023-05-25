@extends('public')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/ModificaAzienda.css') }}">
    <h1 class="titolo"> Gestisci le seguenti aziende:</h1>
    @foreach($aziende as $azienda)
        {{ Form::open(array('route' => ['updateazienda', $azienda->idAzienda], 'method' => 'GET')) }}
        @method('GET')
        {{ Form::token() }}
        <div class="table-container">
        <table class="form-table">
            <tr>
                <td>
                    <p>{{ $azienda->NomeAzienda }}</p>
                </td>
                <td>
                    {{ Form::submit('Modifica azienda', ['class' => 'btn btn-primary']) }}
                </td>
            </tr>
        </table>
        </div>
        {{ Form::close() }}

        @unless($loop->last)
            <hr> <!-- Aggiungi un separatore tra le iterazioni tranne l'ultima -->
        @endunless
    @endforeach

@endsection
