@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/Registrazione.css')}}">

<div class="signup-container">
{{ Form::open(array('route' => ['modifyofferta', $offerta->idOfferta], 'method' => 'POST', 'class' => 'contact-form', 'enctype' => 'multipart/form-data')) }}
@csrf
@method('PUT')
<div class="user-details">

<div class="input-box">
{{ Form::token() }}
{{ Form::label('DescrizioneOfferta', 'DescrizioneOfferta', ['class' => 'label-input']) }}
    {{ Form::text('DescrizioneOfferta', $offerta->DescrizioneOfferta, ['class' => 'input']) }}
    @if ($errors->first('DescrizioneOfferta'))
                <ul class="errors">
                    @foreach ($errors->get('DescrizioneOfferta') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>

    <div class="input-box">
    {{Form::label('Categoria', 'Categoria', ['class' => 'label-input']) }}
    {{ Form::text('Categoria', $offerta->Categoria, ['class' => 'input']) }}
    @if ($errors->first('Categoria'))
                <ul class="errors">
                    @foreach ($errors->get('Categoria') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>

    <div class="input-box">
    {{Form::label('Scadenza', 'Scadenza', ['class' => 'label-input']) }}
    {{ Form::date('Scadenza', $offerta->Scadenza, ['class' => 'input']) }}
    @if ($errors->first('Scadenza'))
                <ul class="errors">
                    @foreach ($errors->get('Scadenza') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>


    <div class="input-box">
    {{Form::label('Oggetto', 'Oggetto', ['class' => 'label-input']) }}
    {{ Form::text('Oggetto', $offerta->Oggetto, ['class' => 'input']) }}
    @if ($errors->first('Oggetto'))
                <ul class="errors">
                    @foreach ($errors->get('Oggetto') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>


    <div class="input-box">
    {{Form::label('NomeAzienda', 'Nome Azienda', ['class' => 'label-input']) }}
    {{ Form::select('NomeAzienda', $aziende,$offerta->NomeAzienda, ['class' => 'input']) }}
    @if ($errors->first('NomeAzienda'))
                <ul class="errors">
                    @foreach ($errors->get('NomeAzienda') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>


    <div class="input-box">
    {{Form::label('Prezzo', 'Prezzo', ['class' => 'label-input']) }}
    {{ Form::number('Prezzo', $offerta->Prezzo, ['class' => 'input']) }}
    @if ($errors->first('Prezzo'))
                <ul class="errors">
                    @foreach ($errors->get('Prezzo') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>


    <div class="input-box">
    {{Form::label('PercentualeSconto', 'PercentualeSconto', ['class' => 'label-input']) }}
    {{ Form::number('PercentualeSconto', $offerta->PercentualeSconto, ['class' => 'input']) }}
    @if ($errors->first('PercentualeSconto'))
                <ul class="errors">
                    @foreach ($errors->get('PercentualeSconto') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>


    <div class="input-box">
    {{Form::label('Luogo', 'Luogo', ['class' => 'label-input']) }}
    {{ Form::text('Luogo', $offerta->Luogo, ['class' => 'input']) }}
    @if ($errors->first('Luogo'))
                <ul class="errors">
                    @foreach ($errors->get('Luogo') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>


    <div class="input-box">
    {{Form::label('Modalità', 'Modalità', ['class' => 'label-input']) }}
    {{ Form::text('Modalità', $offerta->Modalità, ['class' => 'input']) }}
    @if ($errors->first('Modalità'))
                <ul class="errors">
                    @foreach ($errors->get('Modalità') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>

    <div class="input-box">
    {{Form::label('Evidenza', 'Evidenza', ['class' => 'label-input']) }}
    {{ Form::text('Evidenza', $offerta->Evidenza, ['class' => 'input']) }}
    @if ($errors->first('Evidenza'))
                <ul class="errors">
                    @foreach ($errors->get('Evidenza') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>

    <div class="input-box">
    {{ Form::label('image', 'Immagine', ['class' => 'label-input']) }}
    {{ Form::file('image', ['class' => 'input', 'id' => 'image']) }}
    @if ($errors->first('image'))
                <ul class="errors">
                    @foreach ($errors->get('image') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>
</div>
            <div class="button">
            {{ Form::submit('Modifica offerta', ['class' => 'form-btn1']) }}
            </div>

            {{ Form::close() }}  
        
            </div>


</div>

@endsection