@extends('public')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('css/Profile.css')}}">
    <div class="card">

        <h1>Profilo utente</h1>
        <p><strong>Nome:</strong> {{ Auth::user()->nome }}</p>
        <p><strong>Cognome:</strong> {{ Auth::user()->cognome }}</p>
        <p><strong>Username:</strong> {{ Auth::user()->username }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Telefono:</strong> {{ Auth::user()->telefono }}</p>
        <p><strong>Genere:</strong> {{ Auth::user()->genere }}</p>
        <p><strong>Età:</strong> {{ Auth::user()->eta}}</p>
        <p><strong>Residenza:</strong> {{ Auth::user()->residenza }}</p>
        @guest
        <p><strong>Ruolo:</strong> {{ Auth::user()->role }}</p>
        @endguest


        @auth
                @if(Auth::user()->can('isUser')||Auth::user()->can('isStaff'))
        <div class="btn-bottom">
        <a class="bottone-modifica" href="{{ route('showUser')}}">Modifica profilo</a>
        <a class="bottone-modifica" href="{{ route('modificapassword')}}">Modifica password</a>
        </div>
        @endif
            @endauth

        
           


        @auth
            @if(Auth::user()->can('isUser'))
                <h3>Di seguito i coupon che hai acquistato:</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id Utente</th>
                        <th>Id Coupon</th>
                        <th>Codice Coupon</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userCoupons as $coupon)
                        <tr>
                            <td>{{ $coupon->id }}</td>
                            <td>{{ $coupon->Codice_coupon }}</td>
                            <td>{{ $coupon->codice }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        @endauth
        <div> </div>

    </div>

    
   

       
        
@endsection