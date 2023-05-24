@extends('public')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/FormCRUD.css')}}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/TextArea.js') }}"></script>

<section class="form_section">
    <div class="card">
        
        <h2 class="titolo">MODIFICA FAQ</h2>
        
        {{ Form::open(array('route' => ['modifyfaq', $faq->id], 'method' => 'POST', 'class' => 'form-wrapper')) }}
@method('PUT')
{{ Form::token() }}
{{ Form::label('Domanda', 'Domanda') }}
    {{ Form::textArea('Domanda', $faq->Domanda, ['class' => 'form-control']) }}
    @if ($errors->first('Domanda'))
                <ul class="errors">
                    @foreach ($errors->get('Domanda') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Risposta', 'Risposta') }}
    {{ Form::textArea('Risposta', $faq->Risposta, ['class' => 'form-control']) }}
    @if ($errors->first('Risposta'))
                <ul class="errors">
                    @foreach ($errors->get('Risposta') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

                {{ Form::submit('Modifica faq', ['class' => 'btn-modify']) }}
            {{ Form::close() }}  
        
    </div>
</section>
@endsection