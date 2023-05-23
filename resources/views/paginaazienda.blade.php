@extends('public')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/PaginaAzienda.css')}}">
    

  
<section class="company">
  <div class="image">
     @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $selAzienda->image])
    </div>

  <div class="company-info">
    <h2>{{$selAzienda->Nome}}</h2>

    <p> Sede: {{$selAzienda->Sede}}</p>

    <p> Settore: {{$selAzienda->Tipologia}}</p>

    <p> Ragione sociale: {{$selAzienda->RagioneSociale}}</p>

  </div>
</section>



@endsection