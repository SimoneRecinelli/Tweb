@extends('public')
@section('content')
    @foreach($staff as $staff)
        {{ Form::open(array('route' => ['destroyStaff', $staff->id], 'method' => 'POST')) }}
        @method('DELETE')
        {{ Form::token() }}
        <a class="card" >
            <div class="container_card">
                <p>Nome Membro: {{$staff->nome}}</p>
                <p>Cognome Membro: {{$staff->cognome}}</p>
                <p>Email Membro: {{$staff->email}}</p>
                <p>Username Membro: {{$staff->username}}</p>
                <p>Password Membro: {{$staff->password}}</p>
                <p>Possibilità Abbinamento Membro: {{$staff->possibilità_abbinamento == 1 ? 'Si' : 'No'}}</p>
                <p>Età Membro: {{$staff->eta}}</p>
                <p>Genere Membro: {{$staff->genere}}</p>
                <p>Residenza Membro: {{$staff->residenza}}</p>
                <p>Telefono Membro: {{$staff->telefono}}</p>
            </div>
        </a>
        {{ Form::submit('Elimina Membro Staff', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
    @endforeach
@endsection