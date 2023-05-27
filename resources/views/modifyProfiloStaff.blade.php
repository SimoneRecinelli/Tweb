@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/Registrazione.css')}}">



<div class="signup-container">
    
    <h1>Modifica Profilo</h1>
    <div class="content">

    {{ Form::open(array('route' => ['putProfileStaff'], 'method' => 'POST', 'class' => 'contact-form')) }}
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

    


        <div class="button">
        {{ Form::submit('Modifica profilo', ['class' => 'form-btn1']) }}
        </div>
        {{ Form::close() }}
        </div>


  </div>
        @endsection