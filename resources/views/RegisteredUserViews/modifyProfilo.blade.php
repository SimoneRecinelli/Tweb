@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/Registrazione.css')}}">



<div class="signup-container">
    
    <h1>Modifica Profilo</h1>
    <div class="content">

    {{ Form::open(array('route' => ['putProfile'], 'method' => 'POST', 'class' => 'contact-form')) }}
    @csrf
    @method('PUT')
    {{ Form::token() }}
    
    <div class="user-details">


    <div class="input-box">
    {{ Form::label('nome', 'Nome:', ['class' => 'label-input']) }}
    {{ Form::text('nome', $user->nome, ['class' => 'input']) }}
    @if ($errors->first('nome'))
        <ul class="errors">
            @foreach ($errors->get('nome') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif
    </div>

    <div class="input-box">
    {{Form::label('cognome', 'Cognome:', ['class' => 'label-input']) }}
    {{ Form::text('cognome', $user->cognome, ['class' => 'input']) }}
    @if ($errors->first('cognome'))
        <ul class="errors">
            @foreach ($errors->get('cognome') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif
    </div>

    <div class="input-box">
    {{Form::label('email', 'Email:', ['class' => 'label-input']) }}
    {{ Form::text('email', $user->email, ['class' => 'input']) }}
    @if ($errors->first('email'))
        <ul class="errors">
            @foreach ($errors->get('email') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif
    </div>

    <div class="input-box">
    {{Form::label('eta', 'Età:', ['class' => 'label-input']) }}
    {{ Form::number('eta', $user->eta, ['class' => 'input']) }}
    @if ($errors->first('eta'))
        <ul class="errors">
            @foreach ($errors->get('eta') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif
    </div>

    <div class="input-box">
    {{Form::label('telefono', 'Telefono:', ['class' => 'label-input']) }}
    {{ Form::text('telefono', $user->telefono, ['class' => 'input']) }}
    @if ($errors->first('telefono'))
        <ul class="errors">
            @foreach ($errors->get('telefono') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif
    </div>

    <div class="input-box">
    {{Form::label('residenza', 'Residenza:', ['class' => 'label-input']) }}
    {{ Form::text('residenza', $user->residenza, ['class' => 'input']) }}
    @if ($errors->first('residenza'))
        <ul class="errors">
            @foreach ($errors->get('residenza') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div class="input-box">
    {{Form::label('username', 'Username:', ['class' => 'label-input']) }}
    {{ Form::text('username', $user->username, ['class' => 'input', 'readonly' => 'readonly']) }}
    </div>

    <div class="input-box">
    {{Form::label('genere', 'Genere:', ['class' => 'label-input']) }}
    {{ Form::select('genere', $opzioni = ['Uomo' => 'Uomo','Donna' => 'Donna'], ($user->genere == 'Uomo') ? 'Uomo' : 'Donna',  ['class' => 'input']) }}<br>
    @if ($errors->first('genere'))
        <ul class="errors">
            @foreach ($errors->get('genere') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
        </div>

       
        </div>
        <div class="button">
        {{ Form::submit('Modifica profilo', ['class' => 'form-btn1']) }}
        </div>
        {{ Form::close() }}

  </div>

  <p class=ancora-back> <a href="{{route('profile')}}">Torna Indietro</a> </p>

        @endsection