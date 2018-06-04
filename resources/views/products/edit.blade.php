@extends('layouts.admin')

@section('content')
  <div class="main">
    <div class="section-title">
      <span>Producto - Editar</span>
    </div>
    <div class="main-body">
      <form class="form-project" action="/producto_modificar/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div class="div-left">
          <div class="div-top">
            <div class="input-div" id="name">
              <label class="form-label" for="name">Nombre</label>
              <input class="input-project" type="text" name="name" value="{{ $product->name }}" placeholder="{{ $product->name}}" autofocus>
            </div>
          </div>
          <div class="div-bottom">
            <div class="input-div" id="price">
              <label class="form-label" for="price">Precio</label>
              <input class="input-project" type="number" min="1" step="any" name="price" value="{{ $product->price }}" placeholder="{{ $product->price}}">
            </div>
          </div>
        </div>
        <div class="div-right">
          <div class="input-div" id="description">
            <label class="form-label" for="description">Descripción</label>
            <textarea class="input-textarea" name="description" value="{{ $product->description }}" >{{ $product->description }}</textarea>
          </div>
        </div>
        {{-- <div class="div-tags">
        <label class="form-label">Etiquetas</label>
        @foreach ($tags as $tag)
        <input type="checkbox" name="tags[]" value="{{$tag->id}}" id="{{ $tag->name }}"><label for="{{ $tag->name }}" class="tag-text">{{$tag->name}}</label>
      @endforeach
    </div> --}}
    <div class="div-left">
      <div class="input-div">
        <label class="form-label" for="primary_img">Imagen Index</label>
        <input class="upload-file" type="file" name="primary_img">
      </div>
      <div>
        <img class="index-img" src="{{ asset ( 'storage/' . $product->primary_img ) }}" alt="">
      </div>
    </div>
    <div class="div-right">
      <div class="input-div">
        <label class="form-label" for="other_img">Otras imagenes</label>
        <input class="upload-file" type="file" type="file" name="img1">
      </div>
      <div class="input-div">
        <input class="upload-file" type="file" type="file" name="img2">
      </div>
      <div class="input-div">
        <input class="upload-file" type="file" type="file" name="img3">
      </div>
      <div class="input-div">
        <input class="upload-file" type="file" type="file" name="img4">
      </div>
      <div class="input-div">
        <input class="upload-file" type="file" type="file" name="img5">
      </div>
    </div>
    <div class="input">
      <button class="btn" type="submit" name="button">Subir</button>
    </div>
  </form>
</div>
</div>
@endsection
