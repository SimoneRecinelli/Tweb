@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/GestioneFaq.css')}}">

<div class="section">
    <h1 class="titolo"> Gestisci le seguenti aziende:</h1>
    
        <table class="table">
                <tr>
                    <th>Nome Azienda</th>
                    <th>Sede</th>
                    <th>Tipologia</th>
                    <th>Ragione Sociale</th>
                    <th>Modifica</th>
                    <th>Elimina</th>

                </tr>
            <tbody>
                @foreach($aziende as $azienda)
                    <tr>
                        <td>{{ $azienda->NomeAzienda }}</td>
                        <td>{{ $azienda->Sede }}</td>
                        <td>{{ $azienda->Tipologia }}</td>
                        <td>{{ $azienda->RagioneSociale }}</td>

                        <td>
                            {{ Form::open(array('route' => ['updateazienda', $azienda->idAzienda], 'method' => 'GET')) }}
                            @method('GET')
                            @csrf
                            {{ Form::token() }}
                            {{ Form::submit('Modifica azienda', ['class' => 'btn-modify']) }}
                            {{ Form::close() }}
                        </td>

                        <td>
                            {{ Form::open(array('route' => ['destroyazienda', $azienda->idAzienda], 'method' => 'POST')) }}
                            @method('DELETE')
                            {{ Form::token() }}
                            {{ Form::submit('Elimina azienda', ['class' => 'btn-delete']) }}
                            {{ Form::close() }}
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection