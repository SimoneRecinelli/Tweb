@extends('public')
@section('content')


{{ Form::open(array('route' => 'storeazienda')) }}
{{ Form::token() }}
    {{ Form::label('Nome', 'Nome') }}
    {{ Form::text('Nome', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Nome'))
                <ul class="errors">
                    @foreach ($errors->get('Nome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Sede', 'Sede') }}
    {{ Form::text('Sede', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Sede'))
                <ul class="errors">
                    @foreach ($errors->get('Sede') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Tipologia', 'Tipologia') }}
    {{ Form::text('Tipologia', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('Tipologia'))
                <ul class="errors">
                    @foreach ($errors->get('Tipologia') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('RagioneSociale', 'RagioneSociale') }}
    {{ Form::text('RagioneSociale', null, ['class' => 'form-control']) }}<br>
    @if ($errors->first('RagioneSociale'))
                <ul class="errors">
                    @foreach ($errors->get('RagioneSociale') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{ Form::submit('Crea azienda', ['class' => 'btn btn-primary']) }}

{{ Form::close() }}

@endsection