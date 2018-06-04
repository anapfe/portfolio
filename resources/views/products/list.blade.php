@extends('layouts.admin')

@section('content')

  <div class="main">
    <div class="section-title">
      <span>Productos</span>
      <div class="controls">
        <input class="admin-search" type="text" name="" value="" placeholder="buscar">
        {{-- <select class="order-by" name="">
          <option value=""><a href="#">Ordenar</a></option>
          <option value=""><a href="/proyectos_año">Por Año</a></option>
          <option value=""><a href="/proyectos_titulo">Por Nombre</a></option>
          <option value=""><a href="/proyectos_cliente">Por Cliente</a></option>
        </select> --}}
        <select class="control-select" name="">
          <option value=""><a href="#">Acciones por Lote</a></option>
          <option value=""><a href="/proyectos_eliminar">Eliminar</a></option>
        </select>
      </div>
    </div>
    <div class="main-body">
      <table>
        <tr>
          <th class="project-10">Foto Inicio</th>
          <th class="project-15"><a href="/proyectos_titulo">Título ˅</a></th>
          <th class="project-description">Descripción</th>
          <th class="project-ctrl"><a href="">Precio ˅</a></th>
          {{-- <th class="project-10"><a href="">Cliente ˅</a></th> --}}
          {{-- <th class="project-15">Etiquetas</th> --}}
          <th class="project-ctrl">Editar</th>
          <th class="project-ctrl">Eliminar</th>
          <th class="project-ctrl"><input type="checkbox" name="selectAll" id="selectAll"></th>
        </tr>
        @foreach ($products as $product)
          <tr>
            <td><img class="project-img" src="{{ asset ( 'storage/' . $product->primary_img ) }}" alt=""></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>$ {{ $product->price }}</td>
            {{-- <td>
              @foreach ($project->tags as $tag)
                {{ $tag->name }},
              @endforeach --}}

            {{-- {{ dd($project->tags[0]->name) }} --}}
            </td>
            <td><a href="/producto_modificar/{{ $product->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            <td><a class="delete" href="/producto_eliminar/{{ $product->id }}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
            <td><input type="checkbox" name="selectAll" class="select"> </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection
