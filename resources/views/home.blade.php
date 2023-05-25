@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/Home.css')}}">

<!--
<div class="slideshow-container">
<a >
<div class="mySlides fade">
 @foreach($prossimeOfferte as $slideOfferte)
 <div>
    @foreach ($prossimeOfferte as $offerta)
            <li class="slide-card">
                @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $offerta->image])
                <h3>Oggetto: {{ $offerta->Oggetto }}</h3>
                <p>Sconto: -{{ $offerta->PercentualeSconto }}%</p>
                <p>SCADENZA: {{ $offerta->Scadenza }}</p>
            </li>
        @endforeach
  </div>
    @endforeach
</div> </a>
-->

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

<br>
<hr>
<br>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div id="catalogo">

    <h3 class="card_title">Offerte in scadenza, non fartele sfuggire!</h3>

    <div class="container-card">
        @foreach($prossimeOfferte as $offerta)
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
</div>
</div>



</div>
@endsection