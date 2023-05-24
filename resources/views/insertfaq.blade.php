@extends('public')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/formCRUD.css')}}">

<section class="form_section">
<div class="card">

        <h2 class="titolo">INSERISCI FAQ</h2>
    
{{ Form::open(array('route' => 'storefaq', 'class' => 'form-wrapper' )) }}
{{ Form::token() }}
{{ Form::label('Domanda', 'Domanda') }}
    {{ Form::textArea('Domanda', null, ['class' => 'form-control']) }}
    @if ($errors->first('Domanda'))
                <ul class="errors">
                    @foreach ($errors->get('Domanda') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Risposta', 'Risposta') }}
    {{ Form::textArea('Risposta', null, ['class' => 'form-control']) }}
    @if ($errors->first('Risposta'))
                <ul class="errors">
                    @foreach ($errors->get('Risposta') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                {{ Form::submit('Crea faq', ['class' => 'btn-modify']) }}
    {{ Form::close() }}

</div>
</section>
@endsection