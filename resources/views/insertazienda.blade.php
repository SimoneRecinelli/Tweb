@extends('public')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/FormCRUD.css')}}">

    <section class="form_section">
        <div class="card">


            <h2 class="titolo">Inserisci Azienda</h2>

            {{ Form::open(array('route' => 'storeazienda', 'class' => 'form-wrapper')) }}
            {{ Form::token() }}

            {{ Form::label('NomeAzienda', 'Nome Azienda') }}
            {{ Form::text('NomeAzienda', null, ['class' => 'form-control', 'placeholder' => 'Inserisci il nome dell\'azienda']) }}
            @if ($errors->first('NomeAzienda'))
                <ul class="errors">
                    @foreach ($errors->get('Nome') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif

            {{Form::label('Sede', 'Sede') }}
            {{ Form::text('Sede', null, ['class' => 'form-control', 'placeholder' => 'Inserisci la sede dell\'azienda']) }}
            @if ($errors->first('Sede'))
                <ul class="errors">
                    @foreach ($errors->get('Sede') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif


            {{Form::label('Tipologia', 'Tipologia') }}
            {{ Form::text('Tipologia', null, ['class' => 'form-control', 'placeholder' => 'Inserisci la tipologia dell\'azienda']) }}
            @if ($errors->first('Tipologia'))
                <ul class="errors">
                    @foreach ($errors->get('Tipologia') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif



            {{Form::label('RagioneSociale', 'RagioneSociale') }}
            {{ Form::text('RagioneSociale', null, ['class' => 'form-control', 'placeholder' => 'Inserisci la ragione sociale dell\'azienda']) }}
            @if ($errors->first('RagioneSociale'))
                <ul class="errors">
                    @foreach ($errors->get('RagioneSociale') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
            {{ Form::submit('Crea azienda', ['class' => 'btn-modify']) }}

            {{ Form::close() }}

        </div>
    </section>

@endsection
