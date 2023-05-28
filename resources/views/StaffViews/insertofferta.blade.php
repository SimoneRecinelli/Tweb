@extends('public')

@section('scripts')

    @parent

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(function () {
            var actionUrl = "{{ route('storeofferta') }}";
            var formId = 'addofferta';
            $(":input").on('blur', function (event) {
                var formElementId = $(this).attr('id');
                doElemValidation(formElementId, actionUrl, formId);
            });
            $("#addofferta").on('submit', function (event) {
                event.preventDefault();
                doFormValidation(actionUrl, formId);
            });
        });
    </script>

@endsection

@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/Registrazione.css')}}">


    <div class="signup-container">

    <h1>Inserisci Offerta</h1>

    <div class="content">
    {{ Form::open(array('route' => 'storeofferta', 'class' => 'contact-form', 'id' => 'addofferta', 'files' => true, 'enctype' => 'multipart/form-data')) }}
        @csrf
        {{ Form::token() }}
        <div class="user-details">

            <div class="input-box">
            {{ Form::label('Categoria', 'Categoria', ['class' => 'label-input']) }}
            {{ Form::text('Categoria', null, ['class' => 'input', 'placeholder' => 'Inserisci la categoria dell\'offerta', 'id' => 'Categoria']) }}
            </div>

            <div class="input-box">
            {{ Form::label('Scadenza', 'Scadenza', ['class' => 'label-input']) }}
            {{ Form::date('Scadenza', null, ['class' => 'input', 'id' => 'Scadenza']) }}
            </div>

            <div class="input-box">
            {{ Form::label('Oggetto', 'Oggetto', ['class' => 'label-input']) }}
            {{ Form::text('Oggetto', null, ['class' => 'input', 'placeholder' => 'Inserisci l\'oggetto dell\'offerta', 'id' => 'Oggetto']) }}
            </div>

            <div class="input-box">
            {{ Form::label('NomeAzienda', 'Nome Azienda', ['class' => 'label-input']) }}
            {{ Form::select('NomeAzienda', $aziende, null, ['class' => 'input', 'placeholder' => 'Seleziona un\'azienda', 'id' => 'NomeAzienda']) }}
            </div>

            <div class="input-box">
            {{ Form::label('Prezzo', 'Prezzo', ['class' => 'label-input']) }}
            {{ Form::number('Prezzo', null, ['class' => 'input', 'placeholder' => 'Inserisci il prezzo dell\'offerta', 'id' => 'Prezzo']) }}

            </div>

            <div class="input-box">
            {{ Form::label('PercentualeSconto', 'Percentuale sconto', ['class' => 'label-input']) }}
            {{ Form::number('PercentualeSconto', null, ['class' => 'input', 'placeholder' => 'Inserisci la percentuale di sconto', 'id' => 'PercentualeSconto']) }}

            </div>

            <div class="input-box">
            {{ Form::label('Luogo', 'Luogo di fruizione', ['class' => 'label-input']) }}
            {{ Form::text('Luogo', null, ['class' => 'input', 'placeholder' => 'Inserisci il luogo dell\'offerta', 'id' => 'Luogo']) }}
            </div>

            <div class="input-box">
            {{ Form::label('Modalità', 'Modalità di fruizione', ['class' => 'label-input']) }}
            {{ Form::text('Modalità', null, ['class' => 'input', 'placeholder' => 'Inserisci la modalità dell\'offerta', 'id' => 'Modalità']) }}
            </div>

            <div class="input-box">
            {{ Form::label('Evidenza', 'Evidenza', ['class' => 'label-input']) }}
            {{ Form::select('Evidenza', ['1' => 'si', '0' => 'no'], ['class' => 'input', 'id' => 'Evidenza']) }}
            </div>

            <div class="input-box">
            {{ Form::label('image', 'Immagine', ['class' => 'label-input']) }}
            {{ Form::file('image', ['class' => 'input', 'id' => 'image']) }}
            </div>

            <div class="input-box">
                {{ Form::label('DescrizioneOfferta', 'Descrizione Estesa', ['class' => 'label-input']) }}
                {{ Form::textarea('DescrizioneOfferta', null, ['class' => 'input', 'placeholder' => 'Inserisci la descrizione dell\'offerta', 'id' => 'DescrizioneOfferta',  'rows' => 2]) }}
            </div>

        </div>

    <div class="button">
    {{ Form::submit('Crea offerta', ['class' => 'form-btn1']) }}
    </div>
    
    {{ Form::close() }}
   
   </div>
</div>

@endsection
