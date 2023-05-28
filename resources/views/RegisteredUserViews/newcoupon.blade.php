<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>Cheapest Coupons</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/NewCoupon.css')}}">
</head>

<body>

<div class="container-coupon">

    <h2>PAGINA DA STAMPARE</h2>

    <div class="content">
        <h2>COUPON</h2>
        <p><h3>Descrizione del prodotto offerto:</h3> {{$selOfferta->DescrizioneOfferta}}</p>
        <p><h3>Nome:</h3> {{$user->nome}}</p>
        <p><h3>Cognome:</h3> {{$user->cognome}}</p>
        <p><h3>Modalità di fruizione:</h3> {{$selOfferta->Modalità}}</p>
        <p><h3>Codice Coupon:</h3> {{$coupon->codice}}</p>
    </div>

    <a class="bottone-return" href="{{route('catalogo')}}">Torna al catalogo</a>

</div>

</body>

</html>