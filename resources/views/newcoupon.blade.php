<style>
.pag{
        border:1px solid black;
        width:fit-content;
        padding:10px;
    }
</style>



<h2>Pagina da stampare</h2>
<div class="pag">
<h3>Descrizione del prodotto: {{$selOfferta->Oggetto}}</h3>
<h3>Nome: {{$user->nome}}</h3>
<h3>Cognome:   {{$user->cognome}}</h3>
<h3>Modalità di fruizione: {{$selOfferta->Modalità}}</h3>
<h3>Codice:<u>{{$coupon->codice}}<u></h3>
</div><br>
<a href="{{route('catalogo')}}"><u>Torna al catalogo<u></a>