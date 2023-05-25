@extends('public')
@section('content')
{{ Form::open(array('route' => ['modifyofferta', $offerta->idOfferta], 'method' => 'POST')) }}
@csrf
@method('PUT')
{{ Form::token() }}
{{ Form::label('DescrizioneOfferta', 'DescrizioneOfferta') }}
    {{ Form::text('DescrizioneOfferta', $offerta->DescrizioneOfferta, ['class' => 'form-control']) }}<br>
    @if ($errors->first('DescrizioneOfferta'))
                <ul class="errors">
                    @foreach ($errors->get('DescrizioneOfferta') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Categoria', 'Categoria') }}
    {{ Form::text('Categoria', $offerta->Categoria, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Categoria'))
                <ul class="errors">
                    @foreach ($errors->get('Categoria') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Scadenza', 'Scadenza') }}
    {{ Form::date('Scadenza', $offerta->Scadenza, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Scadenza'))
                <ul class="errors">
                    @foreach ($errors->get('Scadenza') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Oggetto', 'Oggetto') }}
    {{ Form::text('Oggetto', $offerta->Oggetto, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Oggetto'))
                <ul class="errors">
                    @foreach ($errors->get('Oggetto') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </a>


    {{Form::label('NomeAzienda', 'Nome Azienda') }}
    {{ Form::select('NomeAzienda', $aziende,$offerta->NomeAzienda, ['class' => 'form-control']) }}<br>
    @if ($errors->first('NomeAzienda'))
                <ul class="errors">
                    @foreach ($errors->get('NomeAzienda') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </a>


    {{Form::label('Prezzo', 'Prezzo') }}
    {{ Form::number('Prezzo', $offerta->Prezzo, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Prezzo'))
                <ul class="errors">
                    @foreach ($errors->get('Prezzo') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </a>


    {{Form::label('PercentualeSconto', 'PercentualeSconto') }}
    {{ Form::number('PercentualeSconto', $offerta->PercentualeSconto, ['class' => 'form-control', 'step' => '0.01']) }}<br>
    @if ($errors->first('PercentualeSconto'))
                <ul class="errors">
                    @foreach ($errors->get('PercentualeSconto') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </a>


    {{Form::label('Luogo', 'Luogo') }}
    {{ Form::text('Luogo', $offerta->Luogo, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Luogo'))
                <ul class="errors">
                    @foreach ($errors->get('Luogo') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </a>


    {{Form::label('Modalità', 'Modalità') }}
    {{ Form::text('Modalità', $offerta->Modalità, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Modalità'))
                <ul class="errors">
                    @foreach ($errors->get('Modalità') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </a>


    {{Form::label('Evidenza', 'Evidenza') }}
    {{ Form::text('Evidenza', $offerta->Evidenza, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Evidenza'))
                <ul class="errors">
                    @foreach ($errors->get('Evidenza') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </a>
            {{ Form::submit('Modifica offerta', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}  
@endsection