@extends('layouts.admin')

@section('content')
  <div class="main">
    <div class="section-title">
      <span>Cuenta - Editar</span>
    </div>
    <div class="form-div">
      <form class="form-project" action="/register" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div class="input name {{ $errors->has('name') ? ' has-error' : '' }}">
          <label class="form-label" for="email">Nombre de Usuario</label>
          <input class="input-login" type="text" name="name" id="name" value="{{ old('name') }}" autofocus>
          @if ($errors->has('name'))
              <span class="errors">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
        </div>
        <div class="input email {{ $errors->has('email') ? ' has-error' : '' }}">
          <label class="form-label" for="email">Email</label>
          <input class="input-login" type="email" name="email" id="email" value="{{ old('email') }}" autofocus>
          @if ($errors->has('email'))
              <span class="errors">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
        <div class="input password {{ $errors->has('password') ? ' has-error' : '' }}">
          <label class="form-label" for="password">Contraseña</label>
          <input class="input-login" type="password" name="password" id="password" value="{{ old('password') }}" autofocus>
          @if ($errors->has('password'))
              <span class="errors">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>
        <div class="input">
          <label class="form-label" for="cpassword">Confirmar Contraseña</label>
          <input class="input-login" id="cpassword" type="password" name="cpassword" >
        </div>

        <div class="input">
            <button class="btn" type="submit" name="button">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
@endsection
