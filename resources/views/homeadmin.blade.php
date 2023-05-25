@extends('public')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/HomeAdmin.css')}}">

    <div id="catalogo">

        <h1>Area di gestione admin</h1>

        <h4>Benvenuto {{ Auth::user()->nome }} {{ Auth::user()->cognome }}</h4>
        <h4>Gestisci le aziende o i membri dello staff:</h4>
        <h3>Queste sono tutte le aziende:</h3>
        @if (count($aziende) == 0)
            <p>Siamo spiacenti ma non risulta presente alcuna azienda.</p>
        @else
            @foreach($aziende as $azienda)

                <a class="card" href="">
                    @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $azienda->image])
                    <div class="container_card">
                        <p>{{$azienda->NomeAzienda}}</p>
                    </div>
                </a>
            @endforeach
        @endif

        <h2> Gestione aziende</h2>
        <a href="{{route('insertazienda')}}">Inserisci Azienda</a>
        <a href="{{route('deleteazienda')}}">Elimina Azienda</a>
        <a href="{{route('modificaazienda')}}">Modifica Azienda</a>


        <hr>

        <h2> Gestione Membri Dello Staff </h2>
        <a href="{{route('insertStaff')}}">Inserisci un membro dello staff</a>
        <a href="{{route('showStaff')}}">Modifica un membro dello staff</a>
        <a href="{{route('deleteStaff')}}">Elimina un membro dello staff</a>
    </div>
    <hr>

@endsection()


