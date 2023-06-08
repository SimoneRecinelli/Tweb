@extends('public')

@section('scripts')

    @parent
    
    <script src="{{ asset('js/functions.js') }}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(function () {
            var idOfferta = {{ $offerte->idOfferta }};
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
<h1>Modifica Offerta</h1>
{{ Form::open(array('route' => ['modifyofferta', $offerte->idOfferta], 'method' => 'POST', 'class' => 'contact-form', 'enctype' => 'multipart/form-data', 'id' =>'modifyofferta')) }}
    @csrf
    {{ Form::token() }}

<div class="user-details">

    <div class="input-box">
    {{ Form::label('DescrizioneOfferta', 'Descrizione offerta', ['class' => 'label-input']) }}
    {{ Form::textArea('DescrizioneOfferta', $offerte->DescrizioneOfferta, ['class' => 'input', 'id' => 'DescrizioneOfferta']) }}
    </div>

    <div class="input-box">
    {{Form::label('Categoria', 'Categoria', ['class' => 'label-input']) }}
    {{ Form::text('Categoria', $offerte->Categoria, ['class' => 'input', 'id' => 'Categoria']) }}
    </div>

    <div class="input-box">
    {{Form::label('Scadenza', 'Scadenza', ['class' => 'label-input']) }}
    {{ Form::date('Scadenza', $offerte->Scadenza, ['class' => 'input', 'id' => 'Scadenza', 'value' => $offerte->Scadenza]) }}
    </div>


    <div class="input-box">
    {{Form::label('Oggetto', 'Oggetto', ['class' => 'label-input']) }}
    {{ Form::text('Oggetto', $offerte->Oggetto, ['class' => 'input', 'id' => 'Oggetto']) }}
    </div>


    <div class="input-box">
    {{Form::label('NomeAzienda', 'Nome Azienda', ['class' => 'label-input']) }}
    {{ Form::select('NomeAzienda', $items, $selected, ['class' => 'input', 'id' => 'NomeAzienda']) }}
    </div>



    <div class="input-box">
    {{Form::label('Prezzo', 'Prezzo', ['class' => 'label-input']) }}
    {{ Form::number('Prezzo', $offerte->Prezzo, ['class' => 'input', 'id' => 'Prezzo', 'step' => '0.01']) }}
    </div>


    <div class="input-box">
    {{Form::label('PercentualeSconto', 'Percentuale sconto', ['class' => 'label-input']) }}
    {{ Form::number('PercentualeSconto', $offerte->PercentualeSconto, ['class' => 'input', 'id' => 'PercentualeSconto']) }}
    </div>


    <div class="input-box">
    {{Form::label('Luogo', 'Luogo di fruizione', ['class' => 'label-input']) }}
    {{ Form::text('Luogo', $offerte->Luogo, ['class' => 'input', 'id' => 'Luogo']) }}
    </div>


    <div class="input-box">
    {{Form::label('Modalità', 'Modalità di fruizione', ['class' => 'label-input']) }}
    {{ Form::text('Modalità', $offerte->Modalità, ['class' => 'input', 'id' => 'Modalità']) }}
    </div>

    <div class="input-box">
        {{ Form::label('Evidenza', 'Evidenza', ['class' => 'label-input']) }}
        {{ Form::select('Evidenza', ['si' => 'si', 'no' => 'no'], ($offerte->Evidenza == 'si') ? 'si' : 'no', ['class' => 'input', 'id' => 'Evidenza']) }}

    </div>

    <div class="input-box-img">
    {{ Form::label('image', 'Immagine', ['class' => 'label-input']) }}
    {{ Form::file('image', ['class' => 'input', 'id' => 'image']) }}
    </div>

</div>
            <div class="button">
            {{ Form::submit('Modifica offerta', ['class' => 'form-btn1']) }}
            </div>

            {{ Form::close() }}  
        
<p class=ancora-back> <a href="{{route('modificaofferta')}}">Torna Indietro</a> </p>

</div>


</div>

@endsection