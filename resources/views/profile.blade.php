@extends('public')

@section('content')

    <div class="static">

        <h1>Profilo utente</h1>

        <p><strong>Nome:</strong> {{ $user->nome }}</p>
        <p><strong>Cognome:</strong> {{ Auth::user()->cognome }}</p>
        <p><strong>Genere:</strong> {{ Auth::user()->genere }}</p>
        <p><strong>Età:</strong> {{ Auth::user()->età }}</p>
        <p><strong>Residenza:</strong> {{ Auth::user()->residenza }}</p>
        <p><strong>Telefono:</strong> {{ Auth::user()->telefono }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Username:</strong> {{ Auth::user()->username }}</p>
        <p><strong>Password:</strong> {{ Auth::user()->password }}</p>
        <p><strong>Ruolo:</strong> {{ Auth::user()->role }}</p>
    </div>
@endsection