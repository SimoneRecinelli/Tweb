@extends('public')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/Profile.css')}}">
    <div class="card">

        <h1>Modifica Password</h1>


        <p><strong>Nome:</strong> {{ $staff->nome }}</p>
        <p><strong>Cognome:</strong> {{ $staff->cognome }}</p>
        <p><strong>Genere:</strong> {{ $staff->genere }}</p>
        <p><strong>Età:</strong> {{ $staff->eta}}</p>
        <p><strong>Residenza:</strong> {{ $staff->residenza }}</p>
        <p><strong>Telefono:</strong> {{ $staff->telefono }}</p>
        <p><strong>Email:</strong> {{ $staff->email }}</p>
        <p><strong>Username:</strong> {{ $staff->username }}</p>
        <p><strong>Ruolo:</strong> {{ $staff->role }}</p>

        {{ Form::open(array('route' => ['putPassStaff' ,  ['id' => $staff->id]], 'method' => 'POST', 'class' => 'form-wrapper')) }}
        @method('PUT')
        @csrf
        {{ Form::token() }}
        <p><strong>{{Form::label('password', 'Password:') }}</strong>
            {{ Form::text('password', null, ['class' => 'form-control', 'id' => 'pass', 'placeholder' => 'Inserisci nuova password']) }} </p>

        @if ($errors->first('password')  )

            <ul class="errors" >
                @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>

        @endif
        <div class="btn-bottom">
            {{ Form::submit('Modifica password', ['class' => 'bottone-modificaPass']) }}
            {{ Form::close() }}
        </div>
    </div>


@endsection