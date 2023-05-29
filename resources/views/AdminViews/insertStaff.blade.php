@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/Registrazione.css')}}">


<div class="signup-container">
    
    <h1>Inserisci membro Staff</h1>

    {{ Form::open(array('route' => 'storeStaff', 'class' => 'form-wrapper')) }}
    @csrf
    {{ Form::token() }}

    <div class="user-details">

        <div class="input-box">
            {{ Form::label('nome', 'Nome:', ['class' => 'label-input']) }}
            {{ Form::text('nome', null, ['class' => 'input', 'placeholder' => 'Inserisci il nome']) }}
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
            {{ Form::text('cognome', null, ['class' => 'input', 'placeholder' => 'Inserisci il cognome']) }}
            @if ($errors->first('cognome'))
                <ul class="errors">
                    @foreach ($errors->get('cognome') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="input-box">
            {{ Form::label('email', 'Email:', ['class' => 'label-input']) }}
            {{ Form::text('email', null, ['class' => 'input', 'placeholder' => 'Inserisci l\'email']) }}
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
            {{ Form::number('eta', null, ['class' => 'input', 'placeholder' => 'Inserisci l\'età']) }}
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
            {{ Form::text('telefono', null, ['class' => 'input', 'placeholder' => 'Inserisci il telefono']) }}
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
            {{ Form::text('residenza', null, ['class' => 'input', 'placeholder' => 'Inserisci la residenza']) }}
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
            {{ Form::text('username', null, ['class' => 'input', 'placeholder' => 'Inserisci lo username']) }}
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
            {{ Form::password('password', null, ['class' => 'input', 'placeholder' => 'Inserisci la password']) }}
            @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
</section>
        <div class="input-box">
            {{Form::label('genere', 'Genere:', ['class' => 'label-input']) }}
            {{ Form::select('genere', $opzioni = ['Uomo' => 'Uomo','Donna' => 'Donna'], ['class' => 'input', 'placeholder' => 'Seleziona il genere']) }}
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
        {{ Form::submit('Crea Membro Staff', ['class' => 'form-btn1']) }}
    </div>

    {{ Form::close() }}
</div>

@endsection