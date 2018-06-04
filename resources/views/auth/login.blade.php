@extends('layouts.admin')

@section('content')
  <div class="main">
    <div class="section-title">
      Login
    </div>
    <div class="form-div">
      <form class="login_form" action="{{ route('login') }}" method="POST">
      {{ csrf_field() }}

      <div class="input email {{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="form-label" for="email">Email</label>
        <input class="input-login" type="email" name="email" id="email" value="{{ old('email') }}" autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="input password {{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="form-label" for="password">Contraseña</label>
        <input class="input-login" type="password" name="password" id="password" value="{{ old('password') }}" autofocus>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="input">
        <label class="form-label">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
        </label>
      </div>
      <div class="input">
        <button class="btn" type="submit" name="button">Ingresar</button>
        <a class="input" href="{{ route('password.request') }}">
            ¿Olvidaste tu contraseña?
        </a>
      </div>
      </form>
    </div>
  </div>
@endsection
