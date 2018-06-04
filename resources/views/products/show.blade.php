@extends('layouts.layout')

@section('content')
  <div class="main">
    {{-- <div class="project-video">

  </div> --}}
  {{-- <div class="project-images">
  @foreach ($images as $image)
  <div class="project-image">
  <img src="{{ asset ( 'storage/' . $image ) }}" alt="imagen">
</div>
@endforeach

</div> --}}
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
    <h2><span class="bold">Año: </span>{{ $project->year }}</h2>
    <h2><span class="bold">Cliente: </span>{{ $project->client }}</h2>
  </div>
</div>
</div>
@endsection
