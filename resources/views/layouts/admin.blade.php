<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>

  <!-- Styles -->
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.css') }} ">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">

  <title>Portfolio - Panel de Control</title>
</head>

<body>
  <header>
    @guest
    @else
      <div class="site">
        <a href="/">Ver sitio</a>
      </div>
    @endguest
  </header>

  <div class="container">
    <div class="left-nav">
      @guest
      @else
        <a href="/admin">
          <div class="user-data">
            <img class="admin-foto" src="{{asset('storage/' . Auth::user()->photo)}}" alt="">
            <span class="username">{{ Auth::user()->name }}</span>
          </div>
        </a>
        <div class="menu">
          <ul>
            <li class="dropdown">
              <a class="menu-item" id="projects" href="#">Proyectos <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="hidden" id="dropProjects">
                <li class="menu-subitem"><a href="/proyectos">Listado</a></li>
                <li class="menu-subitem"><a href="/proyecto_nuevo">Nuevo Proyecto</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="menu-item" id="products" href="#">Productos <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="hidden" id="dropProducts">
                <li class="menu-subitem"><a href="/productos">Listado</a></li>
                <li class="menu-subitem"><a href="/producto_nuevo">Nuevo Producto</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="menu-item" id="tags" href="#">Etiquetas <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="hidden" id="dropTags">
                <li class="menu-subitem"><a href="/etiquetas">Listado</a></li>
                <li class="menu-subitem"><a href="/etiqueta_nueva">Nueva Etiqueta</a></li>
              </ul>
            </li>
            <li><a class="menu-item" href="/editar_cuenta/{{ Auth::user()->id }}">Editar Perfil</a></li>
            <li>
              <a class="menu-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Salir
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </div>

    @endguest
  </div>
  @yield('content')

</div>
<script src="{{ asset( 'js/dashboard.js' ) }}"></script>
{{-- <script src="{{asset( 'js/mail.js' )}}"></script> --}}
</body>
</html>
