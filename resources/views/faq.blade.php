@extends('public')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/Faq.css')}}">

@can('isAdmin')
<div class="gestione-faq">
  <a href="{{ route('insertfaq') }}">Inserisci Faq</a>
  <a href="{{ route('modificafaq') }}">Modifica Faq</a>
  <a href="{{ route('deletefaq') }}">Elimina Faq</a>
  
</div>

@endcan

<section class="faq_section">
        <h2 class="titolo">DOMANDE FREQUENTI</h2>
        <br>
        @foreach($faqs as $faq)
        <details>
                <summary>
                {{$faq->Domanda}}
                </summary>
                <p>
                {{$faq->Risposta}}
                </p>
        </details>
        @endforeach
        
</section>


    
@endsection