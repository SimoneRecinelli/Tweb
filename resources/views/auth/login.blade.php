@extends('public')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/Login.css')}}">

<div class="login-container">

<h1>Accedi</h1>

  <div class="content">

  {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}

          <div class="user-details">

          <div class="input-box">
            {{ Form::label('username', 'Username', ['class' => 'label-input']) }}
                {{ Form::text('username', '', ['class' => 'input','id' => 'username' , 'placeholder' => 'Inserisci il tuo username']) }}
                @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

                      </div>

          <div class="input-box">
           {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
                {{ Form::password('password', ['class' => 'input', 'id' => 'password', 'placeholder' => 'Inserisci la tua password']) }}
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                      </div>

        <div class="button">
        {{ Form::submit('Accedi', ['class' => 'form-btn1']) }}
        </div>
      </form>

      {{ Form::close() }}

      <div class="link-register">
        <a class="link-register-left"> Non hai un'account? </a>
        <a class="link-register-right" href="{{route('register')}}"> Registrati </a>
      </div>

    </div>

</div>

</div>

@endsection
