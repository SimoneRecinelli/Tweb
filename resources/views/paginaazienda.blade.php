@extends('public')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/PaginaAzienda.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/Catalogo.css')}}">
    

  
<section class="company">
  <div class="image">
     @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $selAzienda->image])
    </div>

  <div class="company-info">
    <h2>{{$selAzienda->NomeAzienda}}</h2>

    <p> Sede: {{$selAzienda->Sede}}</p>

    <p> Settore: {{$selAzienda->Tipologia}}</p>

    <p> Descrizione: {{$selAzienda->Descrizione}}</p>

    <p> Ragione sociale: {{$selAzienda->RagioneSociale}}</p>


    
  </div>
  
  

</section>
<hr>

<div id="catalogo">
        <h2>Offerte</h2>
        @if (count($offerte) == 0)
    <p>Siamo spiacenti ma i parametri da lei selezionati non hanno prodotto nessuno risultato</p>
    @else

    @isset($offerte)
    @foreach($offerte as $offerta)
            <a class="card" href="{{ route('coupon', [$offerta->idOfferta]) }}" >
                <h3>{{$offerta->NomeAzienda}}</h3>
                <div class="image">
                        @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $offerta->image])
                    </div>
            <div class="container_card">
                <p>{{$offerta->Oggetto}}</p>
                <p style="font-size:30px;" >-{{$offerta->PercentualeSconto}}%</p>
            </div>
            </a>
           
            
        @endforeach
        
    
        @endisset()
       
    @endif
      
   
    </div>

@endsection