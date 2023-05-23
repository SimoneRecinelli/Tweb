@extends('public')
@section('content')
{{ Form::open(array('route' => ['modifyazienda', $azienda->id], 'method' => 'POST')) }}
@method('PUT')
{{ Form::token() }}
{{ Form::label('Nome', 'Nome') }}
    {{ Form::text('Nome', $azienda->Nome, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Nome'))
                <ul class="errors">
                    @foreach ($errors->get('Nome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Sede', 'Sede') }}
    {{ Form::text('Sede', $azienda->Sede, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Sede'))
                <ul class="errors">
                    @foreach ($errors->get('Sede') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Tipologia', 'Tipologia') }}
    {{ Form::text('Tipologia', $azienda->Tipologia, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Tipologia'))
                <ul class="errors">
                    @foreach ($errors->get('Tipologia') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('RagioneSociale', 'RagioneSociale') }}
    {{ Form::text('RagioneSociale', $azienda->RagioneSociale, ['class' => 'form-control']) }}<br>
    @if ($errors->first('RagioneSociale'))
                <ul class="errors">
                    @foreach ($errors->get('RagioneSociale') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </a>
            {{ Form::submit('Modifica azienda', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}  
@endsection