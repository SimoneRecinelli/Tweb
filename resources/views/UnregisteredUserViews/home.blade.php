@extends('public')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/Home.css')}}">
    <script src="js/hometest.js" async></script>


    <div class="catalogo">
        <h3 class="card_title"> Le nostre aziende </h3>
        <div class="wrapper">
            <div class="container-slide">
                <?php
                $aziende = (new \App\Models\Azienda())->getAllAziende();
                ?>
                @foreach($aziende as $azienda)
                    <div class="slide fade">
                        <img src="{{'img/products/'.$azienda->image}}">
                        <h2> {{$azienda->NomeAzienda}} </h2>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="catalogo">

        <h3 class="card_title">Offerte in evidenza</h3>

        <div class="container-card">
            @foreach($offerte as $offerta)
                <a class="card" href="{{route('coupon', [$offerta->idOfferta])}}">
                    <h3>{{$offerta->Azienda}}</h3>
                    <div class="image">
                        @include('helpers.productImg', ['attrs' => 'imagefrm', 'imgFile' => $offerta->image])
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

                <p>Visualizza tutte le offerte disponibili sul nostro sito </p>


            </a>
        </div>
    </div>


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
                @include('helpers.productImg', ['attrs' => 'imagefrm', 'imgFile' => $offerta->image])
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