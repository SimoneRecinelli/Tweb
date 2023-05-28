@extends('public')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/PaginaOfferta.css')}}">
    <style>

        #errore {
            font-size: 30px;
            text-align: center;
            color: red;
        }
    </style>


    @isset($errore)
        <p id="errore"><u>{{$errore}}</u></p>

    @endisset

    <h1 id='expired-error'>Purtroppo l'offerta che stai cercando è scaduta!</h1>
    
    <section class="product">

        

        <div class="image">
            @include('helpers.productImg', ['attrs' => 'imagefrm', 'imgFile' => $selOfferta->image])
        </div>

        

        <div class="product-info">
            <h2>{{$selOfferta->Oggetto}}</h2>

            <p> Descrizione offerta: {{$selOfferta->DescrizioneOfferta}}</p>

            <p> Categoria: {{$selOfferta->Categoria}}</p>

            <p> Azienda: {{$selOfferta->NomeAzienda}}</p>

            <p> Scadenza: {{$selOfferta->Scadenza}} </p>


            <p class="prezzo_originale"> Prezzo originale: {{$selOfferta->Prezzo}}€</p>

            <p> Percentuale sconto: -{{$selOfferta->PercentualeSconto}}%</p>


            @include('helpers.DiscountedPrice', ['prezzo' => $selOfferta->Prezzo, 'sconto' => $selOfferta->PercentualeSconto])

            <p> Luogo di fruizione: {{$selOfferta->Luogo}}</p>

            <p> Modalità di fruizione: {{$selOfferta->Modalità}}</p>

        </div>
    </section>

@endsection