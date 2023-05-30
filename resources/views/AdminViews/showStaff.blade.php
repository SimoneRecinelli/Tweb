@extends('public')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/GestioneFaq.css')}}">

<div class="section">
<h2 class="titolo">Gestisci i membri dello Staff:</h2>
<br>
    <table class=table>
     
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Email</th>
                <th>Username</th>
                <th>Abbinamento</th>
                <th>Età</th>
                <th>Genere</th>
                <th>Residenza</th>
                <th>Telefono</th>
                <th>Modifica</th>
                <th>Elimina</th>
            </tr>
        
        <tbody>
        @isset($staff)

            @foreach($staff as $member)
                <tr>
                    <td>{{$member->nome}}</td>
                    <td>{{$member->cognome}}</td>
                    <td>{{$member->email}}</td>
                    <td>{{$member->username}}</td>
                    <td>{{$member->possibilità_abbinamento == 1 ? 'Si' : 'No'}}</td>
                    <td>{{$member->eta}}</td>
                    <td>{{$member->genere}}</td>
                    <td>{{$member->residenza}}</td>
                    <td>{{$member->telefono}}</td>
                    <td>
                        {{ Form::open(array('route' => ['updateStaff', $member->id], 'method' => 'GET')) }}
                        @method('GET')
                        {{ Form::token() }}
                        {{ Form::submit('Modifica profilo', ['class' => 'btn-modify']) }}
                        {{ Form::close() }}
                    </td>

                    <td>
                        {{ Form::open(array('route' => ['destroyStaff', $member->id], 'method' => 'POST')) }}
                        @method('DELETE')
                        {{ Form::token() }}
                        {{ Form::submit('Elimina Membro', ['class' => 'btn-delete']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('pagination.paginator', ['paginator' => $staff])
@endisset()
@endsection
