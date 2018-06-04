@extends('layouts.admin')

@section('content')
  <div class="main">
    <div class="section-title">
      Panel de Administración
    </div>
    <div class="main-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        Estás logueado!
    </div>

  </div>
@endsection
