@extends('public')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/Faq.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/ModifyFaq.css')}}">



<section class="faq_section">
        <h2 class="titolo">MODIFICA FAQ</h2>
        <br>
        
        {{ Form::open(array('route' => ['modifyfaq', $faq->id], 'method' => 'POST', 'class' => 'form-wrapper')) }}
@method('PUT')
{{ Form::token() }}
{{ Form::label('Domanda', 'Domanda') }}
    {{ Form::text('Domanda', $faq->Domanda, ['class' => 'form-control-question']) }}<br>
    @if ($errors->first('Domanda'))
                <ul class="errors">
                    @foreach ($errors->get('Domanda') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

    {{Form::label('Risposta', 'Risposta') }}
    {{ Form::text('Risposta', $faq->Risposta, ['class' => 'form-control-answer']) }}<br>
    @if ($errors->first('Risposta'))
                <ul class="errors">
                    @foreach ($errors->get('Risposta') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

                {{ Form::submit('Modifica faq', ['class' => 'btn-modify']) }}
            {{ Form::close() }}  
        
        
</section>
@endsection