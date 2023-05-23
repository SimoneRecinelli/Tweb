@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/Home.css')}}">

<div class="slideshow-container">

<a> <div  class="mySlides fade">
  <img src="img/coupon.jpg">
</div> </a>

<a >
<div class="mySlides fade">
  <img src="img/coupon1.jpg">
</div> </a>

<a  >
<div class="mySlides fade">
  <img src="img/coupon2.jpg">
</div> </a>

<!-- L'attributo onclick definisce la funzione JavaScript plusSlides(...) da eseguire quando l'utente fa clic sul link.
  Questa funzione potrebbe essere utilizzata per passare alla diapositiva precedente (o successiva) in uno slideshow.
  Questi elementi HTML definiscono un link ipertestuale che, quando viene cliccato, esegue una funzione JavaScript
  per passare alla diapositiva precedente (o successiva) in uno slideshow. -->

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<script>

/* la variabile slideIndex tiene traccia dell'indice della diapositiva corrente,
 e la chiamata alla funzione showSlides con l'argomento slideIndex consente di visualizzare la diapositiva corretta inizialmente.*/

      let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
showSlides(slideIndex += n);
}

function currentSlide(n) {
showSlides(slideIndex = n);
}

function showSlides(n) {
let i;
let slides = document.getElementsByClassName("mySlides");
let dots = document.getElementsByClassName("dot");
if (n > slides.length) {slideIndex = 1}
if (n < 1) {slideIndex = slides.length}
for (i = 0; i < slides.length; i++) {
  slides[i].style.display = "none";
}
for (i = 0; i < dots.length; i++) {
  dots[i].className = dots[i].className.replace(" active", "");
}
slides[slideIndex-1].style.display = "block";
dots[slideIndex-1].className += " active";
}
</script>

<br>
<hr>
<br>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<div id="catalogo">

    <h3 class="card_title">Offerte in evidenza</h3>

    <div class="container-card">
        @foreach($offerte as $offerta)
        <a class="card" href="{{route('coupon', [$offerta->idOfferta])}}">
                <h3>{{$offerta->Azienda}}</h3>
                <div class="image">
                        @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $offerta->image])
                    </div>
            <div class="container_card">
                <p>{{$offerta->Oggetto}}</p>
                <p style="font-size:30px;">-{{$offerta->PercentualeSconto}}%</p>
            </div>
            </a>
        @endforeach

            <a class="card" href="{{route('catalogo')}}">

               <h4> Catalogo </h4>
                  <img src="img/catalogo.png">
                  
                    <p >Visualizza tutte le offerte disponibili sul nostro sito </p>
                  

            </a>
</div>
</div>

</div>
@endsection