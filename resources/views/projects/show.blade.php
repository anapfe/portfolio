@extends('layouts.layout')

@section('content')
  <div class="main">
    {{-- <div class="project-video">

  </div> --}}
  @if(isset($project->images))
    <div class="project-images">
      @foreach ($project->images as $image)
        <div class="project-image">
          <img src="{{ asset ( 'storage/' . $image->path ) }}" alt="imagen">
        </div>
      @endforeach
    @endif

  </div>
  <div class="project-data">
    <div class="left-side">
      <div class="top-left-side">
        <h3 class="project-data-title">
          {{ $project->title }}
        </h3>
        <h5 class="project-data-tag">
          {{ $project->etiquetas }}
        </h5>
      </div>
      <div class="project-description">
        {{ $project->description }}
      </div>
    </div>
    <div class="right-side">
      <h3><span class="bold">Año: </span>{{ $project->year }}</h3>
      <h3><span class="bold">Cliente: </span>{{ $project->client }}</h3>
    </div>
  </div>
</div>
@endsection
