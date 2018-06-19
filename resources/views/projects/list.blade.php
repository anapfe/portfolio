@extends('layouts.admin')

@section('content')

  <div class="main">
    <div class="section-title">
      <span>Proyectos</span>
      <div class="controls">
        <form class="search" action="/buscarProyectos" method="get">
          <input class="search-box" type="text" name="search" value="" placeholder="buscar">
          <button class="search-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>

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
    @if (count($projects) <= 0)
      <div class="results">
        No se encontraron resultados
      </div>
      @else
      <table>
        <tr>
          <th class="project-10">Foto Inicio</th>
          <th class="project-15"><a href="/proyectos_titulo">Título ˅</a></th>
          <th class="project-description">Descripción</th>
          <th class="project-ctrl"><a href="/proyectos_año">Año ˅</a></th>
          <th class="project-10"><a href="/proyectos_cliente">Cliente ˅</a></th>
          <th class="project-15">Etiquetas</th>
          <th class="project-ctrl">Editar</th>
          <th class="project-ctrl">Eliminar</th>
          <th class="project-ctrl"><input type="checkbox" name="selectAll" id="selectAll"></th>
        </tr>

        @foreach ($projects as $project)
          {{-- {{dd($project->tags)}} --}}
          <tr>
            <td><img class="project-img" src="{{ asset ( 'storage/' . $project->primary_img ) }}" alt=""></td>
            <td>{{ $project->title }}</td>
            <td>{{ $project->description }}</td>
            <td>{{ $project->year }}</td>
            <td>{{ $project->client }}</td>
            <td>
              @foreach ($project->tags as $tag)
                {{ $tag->name }},
              @endforeach

              {{-- {{ dd($project->tags[0]->name) }} --}}
            </td>
            <td><a href="/proyecto_modificar/{{$project->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            <td><a class="delete" href="/proyecto_eliminar/{{$project->id}}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
            <td><input type="checkbox" name="selectAll" class="select"> </td>
          </tr>
        @endforeach
      </table>
    @endif
  </div>
</div>
@endsection
