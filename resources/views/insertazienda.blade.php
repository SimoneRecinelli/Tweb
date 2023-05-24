@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/Registrazione.css')}}">

<div class="signup-container">
    
    <h1>Inserisci Azienda</h1>

    <div class="content">

{{ Form::open(array('route' => 'storeazienda', 'class' => 'contact-form')) }}
{{ Form::token() }}

    <div class="user-details">

    <div class="input-box">
    {{ Form::label('NomeAzienda', 'Nome Azienda', ['class' => 'label-input']) }}
    {{ Form::text('NomeAzienda', null, ['class' => 'input']) }}
    @if ($errors->first('NomeAzienda'))
                <ul class="errors">
                    @foreach ($errors->get('Nome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>

    <div class="input-box">
    {{Form::label('Sede', 'Sede', ['class' => 'label-input']) }}
    {{ Form::text('Sede', null, ['class' => 'input']) }}
    @if ($errors->first('Sede'))
                <ul class="errors">
                    @foreach ($errors->get('Sede') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>

    <div class="input-box">
    {{Form::label('Tipologia', 'Tipologia', ['class' => 'label-input']) }}
    {{ Form::text('Tipologia', null, ['class' => 'input']) }}
    @if ($errors->first('Tipologia'))
                <ul class="errors">
                    @foreach ($errors->get('Tipologia') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>

    <div class="input-box">
    {{Form::label('RagioneSociale', 'RagioneSociale', ['class' => 'label-input']) }}
    {{ Form::text('RagioneSociale', null, ['class' => 'input']) }}
    @if ($errors->first('RagioneSociale'))
                <ul class="errors">
                    @foreach ($errors->get('RagioneSociale') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>

    <div class="button">
    {{ Form::submit('Crea azienda', ['class' => 'form-btn1']) }}
    </div>

{{ Form::close() }}
</div>
</div>
</div>
@endsection