@extends('layouts.layout')

@section('content')
  <div class="main">
    <div class="tag-filter wrapper">
      <ul>
        <li><a href="">Todos</a></li>
        @foreach ($tags as $tag)
          <li><a href="/proyectos/{{ $tag->name }}">{{ $tag->name}}</a></li>
        @endforeach
      </ul>
    </div>
    <div class="project-wrapper">
      <div class="project-masonry">
        @foreach ($projects as $project)
          <div class="project-card">
            <a class="project-link" href="{{ '/proyectos/' . $project->id }}">
              <img class="project-img" src="{{ asset( '/storage/' . $project->primary_img )}}" alt="foto de proyecto">
              <div class="project-caption">
                <div>
                  <div>
                    <h3 class="project-title">{{ $project->title }}</h3>
                    <h2 class="tag-name">{{ $project->etiquetas }}</h2>
                  </div>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
@section('scripts')

@endsection
