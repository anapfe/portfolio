@extends('layouts.admin')

@section('content')
  <div class="main">
    <div class="section-title">
      <span>proyectos - Nuevo</span>
    </div>
    <div class="main-body">
      <form class="form-project" action="/proyecto_nuevo" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="div-left">
          <div class="div-top">
            <div class="input-div {{ $errors->has('title') ? ' has-error' : '' }}" id="title">
              <label class="form-label" for="title">Titulo</label>
              <input class="input-project" type="text" name="title" value="{{ old('title') }}" autofocus>
              @if ($errors->has('title'))
                  <span class="errors">
                      <strong>{{ $errors->first('title') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="div-bottom">
            <div class="input-div {{ $errors->has('year') ? ' has-error' : '' }}" id="year">
              <label class="form-label" for="year">Año</label>
              <input class="input-project" type="text" name="year" value="{{ old('year') }}">
              @if ($errors->has('year'))
                  <span class="errors">
                      <strong>{{ $errors->first('year') }}</strong>
                  </span>
              @endif
            </div>
            <div class="input-div {{ $errors->has('client') ? ' has-error' : '' }}" id="client">
              <label class="form-label" for="client">Cliente</label>
              <input class="input-project" type="text" name="client" value="{{ old('client') }}">
              @if ($errors->has('client'))
                  <span class="errors">
                      <strong>{{ $errors->first('client') }}</strong>
                  </span>
              @endif
            </div>
          </div>
        </div>
        <div class="div-right">
          <div class="input-div {{ $errors->has('description') ? ' has-error' : '' }}" id="description">
            <label class="form-label" for="description">Descripción</label>
            <textarea class="input-textarea" name="description" value="{{ old('description') }}"></textarea>
            @if ($errors->has('description'))
                <span class="errors">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
          </div>
        </div>

        <div class="div-tags {{ $errors->has('tags') ? ' has-error' : '' }}">
          <label class="form-label">Etiquetas</label>
          @foreach ($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{$tag->id}}" id="{{ $tag->name }}"><label for="{{ $tag->name }}" class="tag-text">{{$tag->name}}</label>
          @endforeach
          @if ($errors->has('tags'))
              <span class="errors">
                  <strong>{{ $errors->first('tags') }}</strong>
              </span>
          @endif
        </div>
        <div class="div-left">
          <div class="input-div {{ $errors->has('primary_img') ? ' has-error' : '' }}">
            <label class="form-label" for="primary_img">Imagen Index</label>
            <input class="upload-file" type="file" name="primary_img" id="primary_img"  >
            @if ($errors->has('primary_img'))
                <span class="errors">
                    <strong>{{ $errors->first('primary_img') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="div-right">
          <div class="input-div">
            <label class="form-label" for="altImg[]">Otras imagenes</label>
            <input class="upload-file" type="file" name="altImg[]">
          </div>
          <div class="input-div">
            <input class="upload-file" type="file" name="altImg[]">
          </div>
          <div class="input-div">
            <input class="upload-file" type="file" name="altImg[]">
          </div>
          <div class="input-div">
            <input class="upload-file" type="file" name="altImg[]">
          </div>
          <div class="input-div">
            <input class="upload-file" type="file" name="altImg[]">
          </div>
        </div>
        <div class="input">
          <button class="btn" type="submit" name="button">Subir</button>
        </div>
      </form>
    </div>
  </div>
@endsection
