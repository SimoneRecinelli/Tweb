@extends('public')

@section('content')

<link rel="stylesheet" type="text/css" href="css/Registrazione.css">

<div class="signup-container">

  <h1>Registrazione</h1>

  <div class="content">
  {{ Form::open(array('route' => 'register', 'class' => 'contact-form')) }}
      @csrf
        <div class="user-details">

          <div class="input-box">
          {{ Form::label('nome', 'Nome', ['class' => 'label-input']) }}
                {{ Form::text('nome', '', ['class' => 'input', 'id' => 'name', 'placeholder' => 'Inserisci il tuo nome']) }}

                @if ($errors->first('nome'))
                <ul class="errors">
                    @foreach ($errors->get('nome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
          </div>

          <div class="input-box">
          {{ Form::label('cognome', 'Cognome', ['class' => 'label-input']) }}
                {{ Form::text('cognome', '', ['class' => 'input', 'id' => 'cognome', 'placeholder' => 'Inserisci il tuo cognome']) }}
                @if ($errors->first('cognome'))
                <ul class="errors">
                    @foreach ($errors->get('cognome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
          </div>

          <div class="input-box">
          {{ Form::label('eta', 'Età',  ['class' => 'label-input'])}}
               {{ Form::number('eta', '', ['class' => 'input', 'placeholder' => 'Inserisci la tua età']) }}
               @if ($errors->has('eta'))
               <ul class="errors">
                   @foreach ($errors->get('eta') as $message)
                   <li>{{ $message }}</li>
                   @endforeach
               </ul>
               @endif
          </div>


          <div class="input-radio-button">
          {{ Form::label('genere', 'Genere', ['class' => 'label-input']) }}
          <div class="radio-buttons">
          {{ Form::radio('genere', 'Uomo', false, ['id' => 'uomo']) }}
                {{ Form::label('Uomo', 'Uomo') }}

          {{ Form::radio('genere', 'Donna', false, ['id' => 'donna']) }}
                {{ Form::label('Donna', 'Donna') }}

          {{ Form::radio('genere', 'Altro', false, ['id' => 'altro']) }}
                {{ Form::label('Altro', 'Altro') }}
          </div>

               @if ($errors->first('genere'))
              <ul class="errors">
                  @foreach ($errors->get('genere') as $message)
                 <li>{{ $message }}</li>
                 @endforeach
              </ul>
              @endif
         </div>

         <div class="input-box">
          {{ Form::label('residenza', 'Residenza', ['class' => 'label-input']) }}
                {{ Form::text('residenza', '', ['class' => 'input', 'placeholder'=>'Inserisci la tua residenza']) }}
                @if ($errors->first('residenza'))
                <ul class="errors">
                    @foreach ($errors->get('residenza') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

          </div>

          <div class="input-box">
          {{ Form::label('telefono', 'Telefono', ['class' => 'label-input']) }}
               {{ Form::text('telefono', '', ['class' => 'input', 'id' => 'telefono', 'placeholder' => 'Inserisci il tuo numero di telefono']) }}

               @if ($errors->first('telefono'))
                <ul class="errors">
                    @foreach ($errors->get('telefono') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
         </div>



          <div class="input-box">
          {{ Form::label('email', 'Email', ['class' => 'label-input']) }}
                {{ Form::text('email', '', ['class' => 'input','id' => 'email', 'placeholder' => 'Inserisci la tua email']) }}
                @if ($errors->first('email'))
                <ul class="errors">
                    @foreach ($errors->get('email') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
          </div>



          <div class="input-box">
          {{ Form::label('username', 'Username', ['class' => 'label-input']) }}
                {{ Form::text('username', '', ['class' => 'input','id' => 'username', 'placeholder' => 'Inserisci il tuo username']) }}
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
                {{ Form::password('password', ['class' => 'input', 'id' => 'password' , 'placeholder' => 'Inserisci la tua password']) }}
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
          </div>



          <div class="input-box">
          {{ Form::label('password-confirm', 'Conferma password', ['class' => 'label-input']) }}
                {{ Form::password('password_confirmation', ['class' => 'input', 'id' => 'password-confirm', 'placeholder' => 'Conferma password']) }}
                <!-- tramite password_confirmation laravel capisce che deve cintrollare che le due pass siano uguali
                        VINCOLO DI TIPO NOMINATIVO -->
            </div>

</div>



        <div class="button">
        {{ Form::submit('Registrati', ['class' => 'form-btn1']) }}
        </div>

      </form>

      {{ Form::close() }}

      <div class="link-login">
        <a class="link-login-left"> Hai già un'account? </a>
        <a class="link-login-right" href="{{route('login')}}"> Accedi </a>

      </div>



    </div>


  </div>

@endsection

