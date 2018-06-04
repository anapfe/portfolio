@extends('layouts.admin')

@section('content')
  <div class="main">
    <div class="section-title">
      <span>Etiquetas</span>
      <div class="controls">
        <input class="admin-search" type="text" name="" value="" placeholder="buscar">
        <select class="order-by" name="">
          <option value=""><a href="#">Ordenar</a></option>
          <option value=""><a href="#">Por Nombre</a></option>
        </select>
      </div>
    </div>
    <div class="main-body">
      <table>
        <tr>
          <th>Nombre</th>
          <th class="project-ctrl">Editar</th>
          <th class="project-ctrl">Eliminar</th>
          <th class="project-ctrl"><input type="checkbox" name="selectAll" id="selectAll"></th>
        </tr>
        @foreach ($tags as $tag)
          <tr>
            <td>{{ $tag->name }}</td>
            <td><a href="/etiqueta_modificar/{{$tag->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            <td><a href="/etiqueta_modificar/{{$tag->id}}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
            <td> <input type="checkbox" name="selectAll" class="select"> </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection
