<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Ana Pfefferkorn - Portfolio</title>

  <!-- Styles -->
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.css') }} ">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">

  <!-- Scripts -->
  <script src="{{ asset('js/float-panel.js') }}"></script>

</head>

<body>
  <header>
      <div id="backtop">&#9650;</div>
      <a class="logo" href="/">
        <img class="logo-mobile" src="{{asset('images/logo-responsive.png')}}" alt="">
        <img class="logo-desktop" src="{{asset('images/logo.png')}}" alt="">
      </a>
      <nav class="menu">
        <ul class="menu-items">
          <li class="menu-item"> <a href="/">Proyectos</a> </li>
          <li class="menu-item"> <a href="/estudio">Estudio</a> </li>
          <li class="menu-item"> <a href="/contacto">Contacto</a> </li>
          <li class="menu-item"> <a href="/tienda">Tienda</a> </li>
          @auth
            <li class="menu-item"><a href="/carrito"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
          @endauth
        </ul>
        <a class="menu-hamburger">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </a>
      </nav>
  </header>
    {{-- @guest
    @else
      <li class="menu-item">
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        Salir
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </li>
  @endguest --}}

@yield('content')

{{-- @yield('scripts'); --}}

<!-- Scripts -->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
