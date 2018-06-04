@extends('layouts.admin')

@section('content')
  <div class="main">
    <div class="section-title">
      <span>Proyectos - Editar</span>
    </div>
    <div class="main-body">
      <form class="form-project" action="/proyecto_modificar/{{ $project->id }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div class="div-left">
          <div class="div-top">
            <div class="input-div" id="title">
              <label class="form-label" for="title">Titulo</label>
              <input class="input-project" type="text" name="title" value="{{ $project->title }}" placeholder="{{ $project->title }}" autofocus>
            </div>
          </div>
          <div class="div-bottom">
            <div class="input-div" id="year">
              <label class="form-label" for="year">Año</label>
              <input class="input-project" type="text" name="year" value="{{ $project->year }}" placeholder="{{ $project->year }}">
            </div>
            <div class="input-div" id="client">
              <label class="form-label" for="client">Cliente</label>
              <input class="input-project" type="text" name="client" value="{{ $project->client }}" placeholder="{{ $project->client }}">
            </div>
          </div>
        </div>
        <div class="div-right">
          <div class="input-div" id="description">
            <label class="form-label" for="description">Descripción</label>
            <textarea class="input-textarea" name="description" value="{{ $project->description }}" >{{ $project->description }}</textarea>
          </div>
        </div>

        <div class="div-tags">
          <label class="form-label">Etiquetas</label>
          @foreach ($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ $tag->name }}"
            @if (isset($etiquetas))
              @foreach ($etiquetas as $etiqueta)
                @if ($tag->name === $etiqueta->name)
                  checked
                @endif
              @endforeach
            @endif
            >
            <label for="{{ $tag->name }}" class="tag-text">{{$tag->name}}</label>
          @endforeach
        </div>
        <div class="div-left">
          <p class="form-label">Imagen Index</p>
          <div>
            <img class="index-img" src="{{ asset ( 'storage/' . $project->primary_img ) }}" alt="">
          </div>
        </div>
        <div class="div-right">
          <div class="input-div">
            <label class="form-label" for="primary_img">Reemplazar Imagen Index</label>
            <input class="upload-file" type="file" name="primary_img" value="{{ old('file') }}">
          </div>
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
          <button class="btn" type="submit" name="button">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
@endsection
