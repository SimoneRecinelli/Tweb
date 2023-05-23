@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/FormCRUD.css')}}">

<section class="form_section">
    
    <h2 class="titolo">Inserisci Azienda</h2>

{{ Form::open(array('route' => 'storeazienda', 'class' => 'form-wrapper')) }}
{{ Form::token() }}
    {{ Form::label('Nome', 'Nome') }}
    {{ Form::textArea('Nome', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Nome'))
                <ul class="errors">
                    @foreach ($errors->get('Nome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Sede', 'Sede') }}
    {{ Form::textArea('Sede', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Sede'))
                <ul class="errors">
                    @foreach ($errors->get('Sede') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Tipologia', 'Tipologia') }}
    {{ Form::textArea('Tipologia', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Tipologia'))
                <ul class="errors">
                    @foreach ($errors->get('Tipologia') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('RagioneSociale', 'RagioneSociale') }}
    {{ Form::textArea('RagioneSociale', null, ['class' => 'form-control']) }}<br>
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
@endsection