@extends('public')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/Profile.css')}}">
    <div class="card">

        <h1>Profilo utente</h1>
        <p><strong>Nome:</strong> {{ Auth::user()->nome }}</p>
        <p><strong>Cognome:</strong> {{ Auth::user()->cognome }}</p>
        <p><strong>Username:</strong> {{ Auth::user()->username }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Telefono:</strong> {{ Auth::user()->telefono }}</p>
        <p><strong>Genere:</strong> {{ Auth::user()->genere }}</p>
        <p><strong>Età:</strong> {{ Auth::user()->eta}}</p>
        <p><strong>Residenza:</strong> {{ Auth::user()->residenza }}</p>
        <!--<p><strong>Password:</strong> {{ Auth::user()->password }}</p>-->
        <p><strong>Ruolo:</strong> {{ Auth::user()->role }}</p>

    <div class="btn-bottom">
    <a class="bottone-modifica" href="{{ route('showUser')}}">Modifica profilo</a>
    <a class="bottone-modifica" href="{{ route('modificapassword')}}">Modifica password</a>
    <a class="bottone-elimina" href="{{ route('deleteProfile')}}">Elimina profilo</a>
    </div>

  
    </div>

    
   

       
        
@endsection