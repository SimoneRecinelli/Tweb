@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/formCRUD.css')}}">


<section class="form_section">
<div class="card">
<h2 class="titolo"> Modifica Azienda</h2>


{{ Form::open(array('route' => ['modifyazienda', $azienda->idAzienda], 'method' => 'POST', 'class' => 'form-wrapper')) }}
@method('PUT')
{{ Form::token() }}
{{ Form::label('NomeAzienda', 'Nome Azienda') }}
    {{ Form::textArea('NomeAzienda', $azienda->NomeAzienda, ['class' => 'form-control']) }}
    @if ($errors->first('NomeAzienda'))
                <ul class="errors">
                    @foreach ($errors->get('NomeAzienda') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Sede', 'Sede') }}
    {{ Form::textArea('Sede', $azienda->Sede, ['class' => 'form-control']) }}
    @if ($errors->first('Sede'))
                <ul class="errors">
                    @foreach ($errors->get('Sede') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Tipologia', 'Tipologia') }}
    {{ Form::textArea('Tipologia', $azienda->Tipologia, ['class' => 'form-control']) }}
    @if ($errors->first('Tipologia'))
                <ul class="errors">
                    @foreach ($errors->get('Tipologia') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('RagioneSociale', 'RagioneSociale') }}
    {{ Form::textArea('RagioneSociale', $azienda->RagioneSociale, ['class' => 'form-control']) }}
    @if ($errors->first('RagioneSociale'))
                <ul class="errors">
                    @foreach ($errors->get('RagioneSociale') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </a>
            {{ Form::submit('Modifica azienda', ['class' => 'btn-modify']) }}
            {{ Form::close() }}  


            </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
  // Seleziona tutte le textarea con l'ID "expandingTextarea" e aggiungi un gestore per l'evento di input
  $('.form-control').on('input', function() {
    // Imposta l'altezza minima della textarea (puoi modificarla a tuo piacimento)
    var minHeight = 40;
    // Imposta l'altezza massima della textarea (puoi modificarla a tuo piacimento)
    var maxHeight = 300;
    
    // Calcola l'altezza necessaria in base al contenuto
    var scrollHeight = this.scrollHeight;
    // Limita l'altezza tra il valore minimo e massimo
    var height = Math.min(maxHeight, Math.max(scrollHeight, minHeight));
    
    // Imposta la nuova altezza della textarea
    $(this).css('height', height + 'px');
  });
});
</script>

@endsection
