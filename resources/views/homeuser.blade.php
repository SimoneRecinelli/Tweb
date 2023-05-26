@extends('public')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/HomeUser.css')}}">
    <div class="container">
        <div class="container-user">
        <h1>Area Utente</h1>
        <h2>Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}</h2>
        <h2>Ora puoi acquistare i nostri coupon!</h2>
        </div>
    </div>
@endsection