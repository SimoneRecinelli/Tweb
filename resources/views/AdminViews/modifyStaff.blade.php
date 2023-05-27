@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/Registrazione.css')}}">

<div class="signup-container">

        <h1>Modifica dati membro Staff</h1>

        {{ Form::open(array('route' => ['modifyStaff', $staff->id], 'method' => 'POST', 'class' => 'form-wrapper')) }}
        @csrf
        @method('PUT')
        {{ Form::token() }}

        <div class="user-details">

        <div class="input-box">
        {{ Form::label('nome', 'Nome:', ['class' => 'label-input']) }}
        {{ Form::text('nome', $staff->nome, ['class' => 'input']) }}
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
        {{ Form::text('cognome', $staff->cognome, ['class' => 'input']) }}
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
        {{ Form::text('email', $staff->email, ['class' => 'input']) }}
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
        {{ Form::number('eta', $staff->eta, ['class' => 'input']) }}
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
        {{ Form::text('telefono', $staff->telefono, ['class' => 'input']) }}
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
        {{ Form::text('residenza', $staff->residenza, ['class' => 'input']) }}
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
        {{ Form::text('username', $staff->username, ['class' => 'input']) }}
        @if ($errors->first('username'))
            <ul class="errors">
                @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
        </div>

        <div class="input-box">
        {{Form::label('password', 'Password:', ['class' => 'label-input']) }}
        {{ Form::text('password', $staff->password, ['class' => 'input']) }}
        @if ($errors->first('password'))
            <ul class="errors">
                @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
        </div>
        
        <div class="input-box">
        {{Form::label('genere', 'Genere:', ['class' => 'label-input']) }}
        {{ Form::select('genere', $opzioni = ['0' => 'uomo','1' => 'donna',],   ['class' => 'input']) }}
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


@endsection