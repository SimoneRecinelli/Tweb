@extends('public')

@section('scripts')

    @parent
    <script src="{{ asset('js/functionsPUT.js') }}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(function () {
            var idOfferta = {{ $offerta->idOfferta }};
            var actionUrl = "{{ route('modifyofferta', ['idOfferta' => ':idOfferta']) }}";
            actionUrl = actionUrl.replace(':idOfferta', idOfferta);
            var formId = 'modifyofferta';
            $(":input").on('blur', function (event) {
                var formElementId = $(this).attr('id');
                doElemValidation(formElementId, actionUrl, formId);
            });
            $("#modifyofferta").on('submit', function (event) {
                event.preventDefault();
                doFormValidation(actionUrl, formId);
            });
        });
    </script>

@endsection

@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/Registrazione.css')}}">

<div class="signup-container">
{{ Form::open(array('route' => ['modifyofferta', $offerta->idOfferta], 'method' => 'PUT', 'class' => 'contact-form', 'enctype' => 'multipart/form-data', 'id' =>'modifyofferta')) }}
    @csrf
    {{ Form::token() }}

<div class="user-details">

    <div class="input-box">
    {{ Form::label('DescrizioneOfferta', 'Descrizione offerta', ['class' => 'label-input']) }}
    {{ Form::text('DescrizioneOfferta', $offerta->DescrizioneOfferta, ['class' => 'input', 'id' => 'DescrizioneOfferta']) }}
    </div>

    <div class="input-box">
    {{Form::label('Categoria', 'Categoria', ['class' => 'label-input']) }}
    {{ Form::text('Categoria', $offerta->Categoria, ['class' => 'input', 'id' => 'Categoria']) }}
    </div>

    <div class="input-box">
    {{Form::label('Scadenza', 'Scadenza', ['class' => 'label-input']) }}
    {{ Form::date('Scadenza', $offerta->Scadenza, ['class' => 'input', 'id' => 'Scadenza', 'value' => $offerta->Scadenza]) }}
    </div>


    <div class="input-box">
    {{Form::label('Oggetto', 'Oggetto', ['class' => 'label-input']) }}
    {{ Form::text('Oggetto', $offerta->Oggetto, ['class' => 'input', 'id' => 'Oggetto']) }}
    </div>


    <div class="input-box">
    {{Form::label('NomeAzienda', 'Nome Azienda', ['class' => 'label-input']) }}
    {{ Form::select('NomeAzienda', $aziende, $offerta->NomeAzienda, ['class' => 'input', 'id' => 'NomeAzienda']) }}
    </div>


    <div class="input-box">
    {{Form::label('Prezzo', 'Prezzo', ['class' => 'label-input']) }}
    {{ Form::number('Prezzo', $offerta->Prezzo, ['class' => 'input', 'id' => 'Prezzo']) }}
    </div>


    <div class="input-box">
    {{Form::label('PercentualeSconto', 'PercentualeSconto', ['class' => 'label-input']) }}
    {{ Form::number('PercentualeSconto', $offerta->PercentualeSconto, ['class' => 'input', 'id' => 'PercentualeSconto']) }}
    </div>


    <div class="input-box">
    {{Form::label('Luogo', 'Luogo di fruizione', ['class' => 'label-input']) }}
    {{ Form::text('Luogo', $offerta->Luogo, ['class' => 'input', 'id' => 'Luogo']) }}
    </div>


    <div class="input-box">
    {{Form::label('Modalità', 'Modalità di fruizione', ['class' => 'label-input']) }}
    {{ Form::text('Modalità', $offerta->Modalità, ['class' => 'input', 'id' => 'Modalità']) }}
    </div>

    <div class="input-box">
        {{ Form::label('Evidenza', 'Evidenza', ['class' => 'label-input']) }}
        {{ Form::select('Evidenza', ['1' => 'Si', '0' => 'No'], ($offerta->Evidenza == 'si') ? '1' : '0', ['class' => 'input', 'id' => 'Evidenza']) }}
    </div>

    <div class="input-box">
    {{ Form::label('image', 'Immagine', ['class' => 'label-input']) }}
    {{ Form::file('image', ['class' => 'input', 'id' => 'image']) }}
    </div>

</div>
            <div class="button">
            {{ Form::submit('Modifica offerta', ['class' => 'form-btn1']) }}
            </div>

            {{ Form::close() }}  
        
            </div>


</div>

@endsection