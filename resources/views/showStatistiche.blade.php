@extends('public')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/Home.css')}}">
<style>
   *{
      font-size:30px;
   }
   #s2{
      
      border:1px solid black;
      
   }
   #s1{
      margin-left:-25em;
      float: left;
      border:1px solid black;
      width:24em;
   }
   #s{
      margin-left: 25em;
      
      
      
      
   }
   </style>


<br><br>
   <h2>Numero totale coupon emessi: {{$num}}</h1>
   <br><hr><br>
   <div id="s">
   <div id="s1">
   <h2>Utenti:</h2>
   @foreach($users as $user)
   <br><a href="{{route('statsutente', [$user->id])}}">
   {{$user->username}}</a><br>
   
   @isset($numutente)
   @if($id==$user->id)
    numero coupon emessi: {{$numutente}}
    @endif
   @endisset
   
   @endforeach
</div>


<div id="s2">
<h2>Offerte:</h2>
   @foreach($offerte as $offerta)

   <br><a href="{{route('statsofferta', [$offerta->idOfferta])}}">
   {{$offerta->Oggetto}}</a><br>

   @isset($numofferte)
   @if($idOfferta==$offerta->idOfferta)
    numero coupon emessi: {{$numofferte}}
    @endif
   @endisset
   
   @endforeach
</div>
</div>

@endsection



