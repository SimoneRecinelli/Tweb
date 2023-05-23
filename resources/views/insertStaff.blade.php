@extends('public')
@section('content')


<section class="form_section">
    
    <h2 class="titolo">Inserisci membro dello staff</h2>

    {{ Form::open(array('route' => 'storeStaff', 'class' => 'form-wrapper')) }}
    {{ Form::token() }}
    {{ Form::label('nome', 'Nome:') }}
    {{ Form::text('nome', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('nome'))
        <ul class="errors">
            @foreach ($errors->get('nome') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif

    {{Form::label('cognome', 'Cognome:') }}
    {{ Form::text('cognome', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('cognome'))
        <ul class="errors">
            @foreach ($errors->get('cognome') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif

    {{ Form::label('email', 'Email:') }}
    {{ Form::text('email', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('email'))
        <ul class="errors">
            @foreach ($errors->get('email') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif

    {{Form::label('eta', 'Età:') }}
    {{ Form::number('eta', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('eta'))
        <ul class="errors">
            @foreach ($errors->get('eta') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif

    {{Form::label('telefono', 'Telefono:') }}
    {{ Form::text('telefono', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('telefono'))
        <ul class="errors">
            @foreach ($errors->get('telefono') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif

    {{Form::label('residenza', 'Residenza:') }}
    {{ Form::text('residenza', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('residenza'))
        <ul class="errors">
            @foreach ($errors->get('residenza') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif
    {{Form::label('username', 'Username:') }}
    {{ Form::text('username', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('username'))
        <ul class="errors">
            @foreach ($errors->get('username') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif
    {{Form::label('password', 'Password:') }}
    {{ Form::text('password', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('password'))
        <ul class="errors">
            @foreach ($errors->get('password') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif
    {{Form::label('genere', 'Genere:') }}
    {{ Form::text('genere', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('genere'))
        <ul class="errors">
            @foreach ($errors->get('genere') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif

        </a>
        {{ Form::submit('Crea Membro Staff', ['class' => 'btn-modify']) }}
        {{ Form::close() }}

        </div>

        @endsection