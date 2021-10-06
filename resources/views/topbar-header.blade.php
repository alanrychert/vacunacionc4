<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center">
  <i class="bi bi-list mobile-nav-toggle"></i>
</div>

<!-- ======= Header ======= -->
<header id="header">
    <div class="row ml-3">
      <h1>Registro de Vacunacion Argentino</h1>
    </div>
    
    <nav id="navbar" class="navbar justify-content-start">
      <ul>
        <li><a href="{{ route('index') }}">Inicio</a></li>
        @auth
        @can('admin.create')
        @can('operator.create')
        <li><a href="{{ route('vaccinated.index') }}">Vacunados</a></li>
        @endcan
        @endcan
        @can('vaccinated.load')
        <li><a href="{{ route('vaccinated.create') }}">Nuevo vacunado</a></li>
        @endcan
        @can('operator.create')
        <li><a href="{{ route('batch.create') }}">Nuevo lote</a></li>  
        @endcan
        @can('admin.create')
        @can('operator.create')
        <li><a href="{{ route('register') }}">Nuevo usuario</a></li>
        @endcan
        @endcan
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <li><a href="cerrarSesion" onclick="event.preventDefault();this.closest('form').submit();">
            Cerrar Sesión
          </a></li>
        </form>

        @else
        <li><a href="{{ route('login') }}">
          Ingresar
        </a></li>

        @endauth
      </ul>
      <i class="bi mobile-nav-toggle d-none bi-x"></i>
    </nav><!-- .navbar -->
</header><!-- End Header -->