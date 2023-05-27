@extends('public')

@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/Faq.css')}}">

<section id="faq_section">
        <h2 class="titolo">DOMANDE FREQUENTI</h2>
        <br>
        
        @foreach($faqs as $faq)
        {{ Form::open(array('route' => ['destroyfaq', $faq->id], 'method' => 'POST')) }}
@method('DELETE')
{{ Form::token() }}
        <details>
                <summary>
                {{$faq->Domanda}} 

                </summary>
                <p>
                {{$faq->Risposta}} 
                </p>
                
        </details>
        
        {{ Form::submit('Elimina faq', ['class' => 'btn-delete']) }}
            {{ Form::close() }}  

        @endforeach
        
</section>
@endsection