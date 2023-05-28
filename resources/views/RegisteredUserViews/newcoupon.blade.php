<style>
.pag{
        border:1px solid white;
        width:fit-content;
        padding:10px;
        margin-top:50px;
        margin-left:100px;
        border-radius:40px;
        background-color:red;
        width:fit-content;
        min-width:50%;
        height:fit-content;
    }
.content{
    padding:10px;
    display:
}
#codice{
    font-size:35px;
    text-align:center;
    

}



</style>



<h2>Pagina da stampare</h2>
<div class="pag">
    <div class="content">
    <h2 style="text-align:center">COUPON</h2><hr>
<h3>Descrizione del prodotto: {{$selOfferta->Oggetto}}</h3>
<h3>Nome: {{$user->nome}}</h3>
<h3>Cognome:   {{$user->cognome}}</h3>
<h3>Modalità di fruizione: {{$selOfferta->Modalità}}</h3><hr>
<h3 id="codice">Codice:<u>{{$coupon->codice}}<u></h3>
</div>
</div><br><br>
<br><a href="{{route('catalogo')}}"><u>Torna al catalogo<u></a>
