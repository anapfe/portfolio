@extends('layouts.admin')

@section('content')
  <div class="main">
    <div class="section-title">
      Resetear contraseña
    </div>
    <div class="form-div">
      @if (session('status'))
          <div class="">
              {{ session('status') }}
          </div>
      @endif
      <form class="" action="{{ route('password.email') }}" method="POST">
      {{ csrf_field() }}
      <div class="input">
        <label class="form-label" for="email">Email</label>
        <input class="input-login" type="email" name="email" value="{{ old('email') }}" autofocus>
      </div>
      <div class="input">
        <button class="btn" type="submit" name="button">Enviar</button>
      </div>
      </form>
    </div>
  </div>
@endsection
