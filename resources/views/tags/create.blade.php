@extends('layouts.admin')

@section('content')
  <div class="main">
    <div class="section-title">
      <span>Etiqueta - Nueva</span>
    </div>
    <div class="main-body">
      <form class="form-project" action="/etiqueta_nueva" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="div-left">
          <div class="div-top">
            <div class="input-div" id="name">
              <label class="form-label" for="name">Nombre de la etiqueta</label>
              <input class="input-project" type="text" name="name" value="{{ old('title') }}" autofocus>
            </div>
          </div>
        <div class="div-right">
          <div class="input-div" id="description">
            <label class="form-label" for="description">Descripción</label>
            <textarea class="input-textarea" name="description" value="{{ old('description') }}"></textarea>
          </div>
        </div>
        <div class="input">
          <button class="btn" type="submit" name="button">Subir</button>
        </div>
      </form>
    </div>
  </div>
@endsection
