@extends('public')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/GestioneFaq.css')}}">

    <div class="section">
        <br>
        <h2 class="titolo">Elimina i seguenti utenti:</h2>
        <table class=table>

            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Email</th>
                <th>Username</th>
                <th>Età</th>
                <th>Genere</th>
                <th>Residenza</th>
                <th>Telefono</th>
                <th>Elimina</th>
            </tr>

            <tbody>
            @foreach($user as $user)
                <tr>
                    <td>{{$user->nome}}</td>
                    <td>{{$user->cognome}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->eta}}</td>
                    <td>{{$user->genere}}</td>
                    <td>{{$user->residenza}}</td>
                    <td>{{$user->telefono}}</td>
                    <td>
                        {{ Form::open(array('route' => ['destroyUtenti', $user->id], 'method' => 'POST')) }}
                        @method('DELETE')
                        {{ Form::token() }}
                        {{ Form::submit('Elimina Utente', ['class' => 'btn-delete']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
