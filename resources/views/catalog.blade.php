<link rel="stylesheet" type="text/css" href="{{asset('css/Catalogo.css')}}">
    <div id="container">

    <div class="search_container">
    <form action="{{ route('search')}}" method="GET">
            <label for="oggetto">Oggetto:</label><input id="obj" type="text" name="oggetto" placeholder="Inserisci l'oggetto dell'offerta">
            <label for="azienda">Azienda:</label><input id="azienda" type="text" name="azienda" placeholder="Inserisci l'azienda dell'offerta">
            <button id="button" type="submit">Cerca</button>
    </form> 
    </div>
    


 


   <div id="catalogo">
        <h2>Offerte</h2>
        
    @foreach($offerte as $offerta)
            <a class="card" href="{{route('coupon', [$offerta->id])}}">
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
        @include('pagination.paginator', ['paginator' => $offerte])
    
        
   
    </div>