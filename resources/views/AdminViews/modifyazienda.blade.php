@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/FormCRUD.css')}}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/TextArea.js') }}"></script>


<section class="form_section">
<div class="card">
<h2 class="titolo"> Modifica Azienda</h2>


{{ Form::open(array('route' => ['modifyazienda', $azienda->idAzienda], 'method' => 'POST', 'class' => 'form-wrapper', 'enctype' => 'multipart/form-data')) }}
    @csrf
    @method('PUT')
{{ Form::token() }}
{{ Form::label('NomeAzienda', 'Nome Azienda') }}
    {{ Form::text('NomeAzienda', $azienda->NomeAzienda, ['class' => 'form-control']) }}
    @if ($errors->first('NomeAzienda'))
                <ul class="errors">
                    @foreach ($errors->get('NomeAzienda') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Sede', 'Sede') }}
    {{ Form::text('Sede', $azienda->Sede, ['class' => 'form-control']) }}
    @if ($errors->first('Sede'))
                <ul class="errors">
                    @foreach ($errors->get('Sede') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Tipologia', 'Tipologia') }}
    {{ Form::text('Tipologia', $azienda->Tipologia, ['class' => 'form-control']) }}
    @if ($errors->first('Tipologia'))
                <ul class="errors">
                    @foreach ($errors->get('Tipologia') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('RagioneSociale', 'RagioneSociale') }}
    {{ Form::text('RagioneSociale', $azienda->RagioneSociale, ['class' => 'form-control']) }}
    @if ($errors->first('RagioneSociale'))
                <ul class="errors">
                    @foreach ($errors->get('RagioneSociale') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    
    {{Form::label('Descrizione', 'Descrizione') }}
    {{ Form::textArea('Descrizione', $azienda->Descrizione, ['class' => 'form-control', 'placeholder' => 'Inserisci una descrizione dell\'azienda']) }}
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

            </a>

            {{ Form::submit('Modifica azienda', ['class' => 'btn-modify']) }}
            {{ Form::close() }}  

            <p class=ancora-back> <a href="{{route('modificaazienda')}}">Torna Indietro</a> </p>

            </div>

</section>

@endsection
