

@extends('public')

@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/Profile.css')}}">
    <div class="card">

        <h1>Modifica Password</h1>
    

        <p><strong>Nome:</strong> {{ Auth::user()->nome }}</p>
        <p><strong>Cognome:</strong> {{ Auth::user()->cognome }}</p>
        <p><strong>Genere:</strong> {{ Auth::user()->genere }}</p>
        <p><strong>Età:</strong> {{ Auth::user()->eta}}</p>
        <p><strong>Residenza:</strong> {{ Auth::user()->residenza }}</p>
        <p><strong>Telefono:</strong> {{ Auth::user()->telefono }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Username:</strong> {{ Auth::user()->username }}</p>
        <p><strong>Ruolo:</strong> {{ Auth::user()->role }}</p>

        {{ Form::open(array('route' => ['putpassword'], 'method' => 'POST', 'class' => 'form-wrapper')) }}
    @method('PUT')
    {{ Form::token() }}
    <p><strong>{{Form::label('password', 'Password:') }}</strong>
    {{ Form::text('password', null, ['class' => 'form-control', 'id' => 'pass', 'placeholder' => 'Inserisci nuova password']) }} </p>
    
    
        
        @if ($errors->first('password')  )
        
        <ul class="errors" >
            @foreach ($errors->get('password') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>

        @endif
        <div class="btn-bottom">
        {{ Form::submit('Modifica password', ['class' => 'bottone-modifica']) }}
        {{ Form::close() }}
</div>
    </div>


        @endsection