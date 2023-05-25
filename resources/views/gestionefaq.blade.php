@extends('public')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/GestioneFaq.css')}}">

<div class="faq-section">
    <h2 class="titolo">DOMANDE FREQUENTI</h2>
    <br>

    <table class="faq-table">
        <tr>
            <th>Numero</th>
            <th>Domanda</th>
            <th>Risposta</th>
            <th>Modifica</th>
            <th>Elimina</th>

        </tr>

        @isset($faqs)
        @foreach($faqs as $faq)
        <tr>
            <td>{{$faq->id}}</td>
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
        
    </table>

    @include('pagination.paginator', ['paginator' => $faqs])
@endisset()

</div>
@endsection
