@extends('public')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/FormCRUD.css') }}">
    <section class="form_section">
        <div class="card">
            <h2 class="titolo">Inserisci Offerta</h2>

            {{ Form::open(array('route' => 'storeofferta', 'class' => 'form-wrapper')) }}
            @csrf
            {{ Form::token() }}

            {{ Form::label('DescrizioneOfferta', 'DescrizioneOfferta') }}
            {{ Form::text('DescrizioneOfferta', null, ['class' => 'form-control', 'placeholder' => 'Inserisci la descrizione dell\'offerta']) }}<br>
            @if ($errors->first('DescrizioneOfferta'))
                <ul class="errors">
                    @foreach ($errors->get('DescrizioneOfferta') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif

            {{ Form::label('Categoria', 'Categoria') }}
            {{ Form::text('Categoria', null, ['class' => 'form-control', 'placeholder' => 'Inserisci la categoria dell\'offerta']) }}<br>
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

            {{ Form::label('Oggetto', 'Oggetto') }}
            {{ Form::text('Oggetto', null, ['class' => 'form-control', 'placeholder' => 'Inserisci l\'oggetto dell\'offerta']) }}<br>
            @if ($errors->first('Oggetto'))
                <ul class="errors">
                    @foreach ($errors->get('Oggetto') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif

            {{ Form::label('NomeAzienda', 'Nome Azienda') }}
            {{ Form::select('NomeAzienda', $aziende, null, ['class' => 'form-control', 'placeholder' => 'Seleziona un\'azienda']) }}<br>
            @if ($errors->first('NomeAzienda'))
                <ul class="errors">
                    @foreach ($errors->get('NomeAzienda') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif

            {{ Form::label('Prezzo', 'Prezzo') }}
            {{ Form::number('Prezzo', null, ['class' => 'form-control', 'placeholder' => 'Inserisci il prezzo dell\'offerta']) }}<br>
            @if ($errors->first('Prezzo'))
                <ul class="errors">
                    @foreach ($errors->get('Prezzo') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif

            {{ Form::label('PercentualeSconto', 'PercentualeSconto') }}
            {{ Form::number('PercentualeSconto', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => 'Inserisci la percentuale di sconto']) }}<br>
            @if ($errors->first('PercentualeSconto'))
                <ul class="errors">
                    @foreach ($errors->get('PercentualeSconto') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif

            {{ Form::label('Luogo', 'Luogo') }}
            {{ Form::text('Luogo', null, ['class' => 'form-control', 'placeholder' => 'Inserisci il luogo dell\'offerta']) }}<br>
            @if ($errors->first('Luogo'))
                <ul class="errors">
                    @foreach ($errors->get('Luogo') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif

            {{ Form::label('Modalità', 'Modalità') }}
            {{ Form::text('Modalità', null, ['class' => 'form-control', 'placeholder' => 'Inserisci la modalità dell\'offerta']) }}<br>
            @if ($errors->first('Modalità'))
                <ul class="errors">
                    @foreach ($errors->get('Modalità') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif

            {{ Form::label('Evidenza', 'Evidenza') }}
            {{ Form::text('Evidenza', null, ['class' => 'form-control', 'placeholder' => 'Inserisci l\'evidenza dell\'offerta']) }}<br>
            @if ($errors->first('Evidenza'))
                <ul class="errors">
                    @foreach ($errors->get('Evidenza') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif

            {{ Form::submit('Crea offerta', ['class' => 'btn-modify']) }}

            {{ Form::close() }}
        </div>
    </section>
@endsection
