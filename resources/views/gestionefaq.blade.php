@extends('public')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/Faq.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/ModificaFaq.css')}}">

<section id="faq_section">
        <h2 class="titolo">DOMANDE FREQUENTI</h2>
        <br>
        
        @foreach($faqs as $faq)
        <div class="bottone-faq">
            <a href="{{ route('updatefaq', $faq->id) }}" class="btn">Modifica faq</a>
        </div>

        <details>
            <summary>
                {{$faq->Domanda}} 
            </summary>
            <p>
                {{$faq->Risposta}} 
            </p>
        </details>
        
        <hr>
        @endforeach
</section>
@endsection


<!--  html con button
        @section('content')

<link rel="stylesheet" type="text/css" href="css/Faq.css">
<link rel="stylesheet" type="text/css" href="css/ModificaFaq.css">

<section id="faq_section">
        <h2 class="titolo">DOMANDE FREQUENTI</h2>
        <br>
        
        @foreach($faqs as $faq)
        {{ Form::open(array('route' => ['updatefaq', $faq->id], 'method' => 'GET')) }}
@method('GET')
{{ Form::token() }}

<div class="bottone-faq">
        {{ Form::submit('Modifica faq', ['class' => 'btn']) }}
            {{ Form::close() }}
        </div>

        <details>
                <summary>
                {{$faq->Domanda}} 

                </summary>
                <p>
                {{$faq->Risposta}} 
                </p>
                
        </details>
        
  
       
<hr>
        @endforeach
</section>
@endsection -->