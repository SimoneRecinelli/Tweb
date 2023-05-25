@extends('public')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/FormCRUD.css')}}">

    <section class="form_section">

        <h2 class="titolo">Modifica i dati del membro</h2>

        {{ Form::open(array('route' => ['modifyStaff', $staff->id], 'method' => 'POST', 'class' => 'form-wrapper')) }}
        @method('PUT')
        {{ Form::token() }}
        {{ Form::label('nome', 'Nome:') }}
        {{ Form::text('nome', $staff->nome, ['class' => 'form-control']) }}<br>
        @if ($errors->first('nome'))
            <ul class="errors">
                @foreach ($errors->get('nome') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif

        {{Form::label('cognome', 'Cognome:') }}
        {{ Form::text('cognome', $staff->cognome, ['class' => 'form-control']) }}<br>
        @if ($errors->first('cognome'))
            <ul class="errors">
                @foreach ($errors->get('cognome') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif

        {{Form::label('email', 'Email:') }}
        {{ Form::text('email', $staff->email, ['class' => 'form-control']) }}<br>
        @if ($errors->first('email'))
            <ul class="errors">
                @foreach ($errors->get('email') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif

        {{Form::label('eta', 'Età:') }}
        {{ Form::number('eta', $staff->eta, ['class' => 'form-control']) }}<br>
        @if ($errors->first('eta'))
            <ul class="errors">
                @foreach ($errors->get('eta') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif

        {{Form::label('telefono', 'Telefono:') }}
        {{ Form::text('telefono', $staff->telefono, ['class' => 'form-control']) }}<br>
        @if ($errors->first('telefono'))
            <ul class="errors">
                @foreach ($errors->get('telefono') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif

        {{Form::label('residenza', 'Residenza:') }}
        {{ Form::text('residenza', $staff->residenza, ['class' => 'form-control']) }}<br>
        @if ($errors->first('residenza'))
            <ul class="errors">
                @foreach ($errors->get('residenza') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
        {{Form::label('username', 'Username:') }}
        {{ Form::text('username', $staff->username, ['class' => 'form-control']) }}<br>
        @if ($errors->first('username'))
            <ul class="errors">
                @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
        {{Form::label('password', 'Password:') }}
        {{ Form::text('password', $staff->password, ['class' => 'form-control']) }}<br>
        @if ($errors->first('password'))
            <ul class="errors">
                @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
        {{Form::label('genere', 'Genere:') }}
        {{ Form::select('genere', $opzioni = ['0' => 'uomo','1' => 'donna',],   ['class' => 'form-control']) }}<br>
        @if ($errors->first('genere'))
            <ul class="errors">
                @foreach ($errors->get('genere') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif

            </a>
            {{ Form::submit('Modifica profilo', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
    </section>

@endsection