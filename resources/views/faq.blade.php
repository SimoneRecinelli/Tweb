@extends('public')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/Faq.css')}}">
<link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>


@can('isAdmin')
<div class="gestione-faq">
  <a href="{{ route('insertfaq') }}">Inserisci Faq</a>
  <a href="{{ route('gestionefaq') }}">Modifica Faq</a>
  <a href="{{ route('deletefaq') }}">Elimina Faq</a>
</div>
@endcan

<div class="container-faq">

  <h2>Domande Frequenti</h2>

  @isset($faqs)
  @foreach($faqs as $faq)
  <div class="accordion">
    <div class="accordion-item">
      <a>{{$faq->Domanda}}</a>
      <div class="question">
        <p>{{$faq->Risposta}}</p>
      </div>
    </div>
  </div>
  @endforeach

@include('pagination.paginator', ['paginator' => $faqs])
@endisset()
  
</div>

<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>  
  <script src="function.js"></script>
  <script>
        /**Cliccando un elemento <a> dell'accordion, la funzione toggleAccordion viene eseguita.
         *  Questa funzione aggiunge o rimuove la classe "active" sia all'elemento <a> che all'elemento successivo .content, 
         * fornendo l'effetto di apertura e chiusura dell'accordion. */

    const items = document.querySelectorAll(".accordion a"); /** Seleziona tutti gli elementi <a> che si trovano 
                                                                 all'interno di un elemento con classe "accordion" 
                                                                 e li memorizza nella variabile items. */

    function toggleAccordion(){ /*Funzione toggleAccordion che verrà eseguita quando si verifica un evento di click sugli elementi <a> dell'accordion*/

      this.classList.toggle('active'); /**Aggiunge o rimuove la classe "active" all'elemento <a> che è stato cliccato.
                                          Questo permette di applicare uno stile diverso agli elementi attivi.*/

      this.nextElementSibling.classList.toggle('active'); /**Aggiunge o rimuove la classe "active" all'elemento successivo (.content) dell'elemento <a> che è stato cliccato. 
                                                             Questo consente di visualizzare o nascondere il contenuto dell'accordione. */
    } 

    items.forEach(item => item.addEventListener('click', toggleAccordion)); /** Itera su tutti gli elementi items selezionati e aggiunge un listener per l'evento di click su ciascuno di essi.
                                                                                Quando un elemento viene cliccato, verrà eseguita la funzione toggleAccordion. */
  </script>

@endsection




