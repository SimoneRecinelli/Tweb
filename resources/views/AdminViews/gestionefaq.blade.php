@extends('public')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/GestioneFaq.css')}}">

<div class="section">
<h1 class="titolo"> Gestisci le seguenti FAQ:</h1>
    <br>

    <table class="table">
        <tr>
            <th>Domanda</th>
            <th>Risposta</th>
            <th>Modifica</th>
            <th>Elimina</th>

        </tr>

        <tbody>
        @isset($faqs)
        @foreach($faqs as $faq)
        <tr>
            <td>{{$faq->Domanda}}</td>
            <td>{{$faq->Risposta}}</td>
            <td><a href="{{ route('updatefaq', $faq->id) }}" class="btn-modify">Modifica faq</a></td>

            <td>
            {{ Form::open(array('route' => ['destroyfaq', $faq->id], 'method' => 'POST')) }}
            @method('DELETE')
            {{ Form::token() }}
            {{ Form::submit('Elimina faq', ['class' => 'btn-delete']) }}
            {{ Form::close() }}  
            </td>


        </tr>
        @endforeach
        </tbody>
    </table>

    @include('pagination.paginator', ['paginator' => $faqs])
@endisset()

<p class=ancora-back> <a href="{{route('amministratore')}}">Torna Indietro</a> </p>

</div>
@endsection


