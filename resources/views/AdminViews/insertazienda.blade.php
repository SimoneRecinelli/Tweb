@extends('public')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/FormCRUD.css')}}">

    <section class="form_section">
        <div class="card">


            <h2 class="titolo">Inserisci Azienda</h2>

            {{ Form::open(array('route' => 'storeazienda', 'class' => 'form-wrapper', 'enctype' => 'multipart/form-data')) }}
            @csrf
            {{ Form::token() }}

            {{ Form::label('NomeAzienda', 'Nome azienda') }}
            {{ Form::text('NomeAzienda', null, ['class' => 'form-control', 'placeholder' => 'Inserisci il nome dell\'azienda']) }}
            @if ($errors->first('NomeAzienda'))
                <ul class="errors">
                    @foreach ($errors->get('NomeAzienda') as $message)
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



            {{Form::label('RagioneSociale', 'Ragione sociale') }}
            {{ Form::text('RagioneSociale', null, ['class' => 'form-control', 'placeholder' => 'Inserisci la ragione sociale dell\'azienda']) }}
            @if ($errors->first('RagioneSociale'))
                <ul class="errors">
                    @foreach ($errors->get('RagioneSociale') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif

            {{Form::label('Descrizione', 'Descrizione') }}
            {{ Form::textArea('Descrizione', null, ['class' => 'form-control', 'placeholder' => 'Inserisci una descrizione dell\'azienda']) }}
            @if ($errors->first('Descrizione'))
                <ul class="errors">
                    @foreach ($errors->get('Descrizione') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif


            {{ Form::label('image', 'Immagine') }}
            {{ Form::file('image', ['class' => 'form-control-img', 'id' => 'image']) }}
            @if ($errors->first('image'))
                <ul class="errors">
                    @foreach ($errors->get('image') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif


            {{ Form::submit('Crea azienda', ['class' => 'btn-modify']) }}

            {{ Form::close() }}

            <p class=ancora-back> <a href="{{route('amministratore')}}">Torna Indietro</a> </p>

        </div>

    </section>

@endsection
