@extends('layouts.layout')

@section('content')
  <div class="main">
    {{-- <div class="tag-filter wrapper">
      <ul>
        @foreach ($tags as $tag)
          <li><a href="/productoss/{{ $tag->name }}">{{ $tag->name}}</a></li>
        @endforeach
      </ul>
    </div> --}}
    <div class="project-wrapper">
      <div class="project-masonry">
        @foreach ($products as $product)
          <div class="project-card">
            <a class="project-link" href="{{ '/producto/' . $product->id }}">
              <img class="project-img" src="{{ asset( '/storage/' . $product->primary_img )}}" alt="foto de proyecto">
              <div class="project-caption">
                <div>
                  <div>
                    <h3 class="project-title">{{ $product->name }}</h3>
                    <h2 class="price">{{ $product->description }}</h2>
                    {{-- <h2 class="tag-name">{{ $product->etiquetas }}</h2> --}}
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
