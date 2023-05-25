@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/Statistiche.css')}}">

<div class="card">
    <h2 class="titolo">Numero totale coupon emessi: {{$num}}</h2>

    <hr>

    <div id="stats-user">
        <h2 class="titolo">Statistiche Utenti:</h2>
        @foreach($users as $user)
            <ul>
                <li>
                    <a href="{{route('statsutente', [$user->id])}}">
                        {{$user->username}} 
                    </a> 
                </li>
            </ul>
            @isset($numutente)
                @if($id==$user->id)
                    <p>numero coupon emessi: {{$numutente}}</p>
                @endif
            @endisset
        @endforeach
    </div>

    <div id="stats-offerte">
        <h2 class="titolo">Statistiche Offerte:</h2>
        @foreach($offerte as $offerta)
            <ul>
                <li>
                    <a href="{{route('statsofferta', [$offerta->idOfferta])}}">
                        {{$offerta->Oggetto}}
                    </a>
                </li>
            </ul>
            @isset($numofferte)
                @if($idOfferta==$offerta->idOfferta)
                    <p>numero coupon emessi: {{$numofferte}} </p>
                @endif
            @endisset
        @endforeach
    </div>
</div>

@endsection
