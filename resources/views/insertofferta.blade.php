@extends('public')
@section('content')


{{ Form::open(array('route' => 'storeofferta')) }}
@csrf
{{ Form::token() }}
    {{ Form::label('DescrizioneOfferta', 'DescrizioneOfferta') }}
    {{ Form::text('DescrizioneOfferta', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('DescrizioneOfferta'))
                <ul class="errors">
                    @foreach ($errors->get('DescrizioneOfferta') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Categoria', 'Categoria') }}
    {{ Form::text('Categoria', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Categoria'))
                <ul class="errors">
                    @foreach ($errors->get('Categoria') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{ Form::label('Scadenza', 'Scadenza') }}
    {{ Form::date('Scadenza', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Scadenza'))
                <ul class="errors">
                    @foreach ($errors->get('Scadenza') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif


    {{Form::label('Oggetto', 'Oggetto') }}
    {{ Form::text('Oggetto', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Oggetto'))
                <ul class="errors">
                    @foreach ($errors->get('Oggetto') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    
    
    {{Form::label('NomeAzienda', 'Nome Azienda') }}
    {{ Form::select('NomeAzienda', $aziende, ['class' => 'form-control']) }}<br>
    @if ($errors->first('NomeAzienda'))
                <ul class="errors">
                    @foreach ($errors->get('NomeAzienda') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                

    {{Form::label('Prezzo', 'Prezzo') }}
    {{ Form::number('Prezzo', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Prezzo'))
                <ul class="errors">
                    @foreach ($errors->get('Prezzo') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif


    {{ Form::label('PercentualeSconto', 'PercentualeSconto') }}
    {{ Form::number('PercentualeSconto', null, ['class' => 'form-control', 'step' => '0.01']) }}<br>
    @if ($errors->first('PercentualeSconto'))
                <ul class="errors">
                    @foreach ($errors->get('PercentualeSconto') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif


    {{Form::label('Luogo', 'Luogo') }}
    {{ Form::text('Luogo', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Luogo'))
                <ul class="errors">
                    @foreach ($errors->get('Luogo') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif


    {{Form::label('Modalità', 'Modalità') }}
    {{ Form::text('Modalità', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Modalità'))
                <ul class="errors">
                    @foreach ($errors->get('Modalità') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif


    {{Form::label('Evidenza', 'Evidenza') }}
    {{ Form::text('Evidenza', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Evidenza'))
                <ul class="errors">
                    @foreach ($errors->get('Evidenza') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif


    {{ Form::submit('Crea offerta', ['class' => 'btn btn-primary']) }}

{{ Form::close() }}

@endsection