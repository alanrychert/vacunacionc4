<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center">
  <i class="bi bi-list mobile-nav-toggle"></i>
</div>

<!-- ======= Header ======= -->
<header id="header">
    <div class="row ml-3">
      <h1>Registro de Vacunacion Argentino</h1>
    </div>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <ul>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            
          <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Inicio</a></li>
          @can('admin.create')
            <li class="nav-item"><a class="nav-link" href="{{ route('vaccinated.index') }}">Vacunados</a></li>
          @endcan
          @can('admin.create')
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}">Administradores</a></li>
          @endcan
          @can('operator.create')
            <li class="nav-item"><a class="nav-link" href="{{ route('vaccinated.index') }}">Vacunados</a></li>
          @endcan
          @can('vaccinated.load')
            <li class="nav-item"><a class="nav-link" href="{{ route('vaccinated.create') }}">Nuevo vacunado</a></li>
          @endcan
          @can('operator.create')
            <li class="nav-item"><a class="nav-link" href="{{ route('batch.create') }}">Nuevo lote</a></li>  
          @endcan
          @can('admin.create')
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Nuevo usuario</a></li>
          @endcan
          @can('operator.create')
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Nuevo usuario</a></li>
          @endcan
          @auth
            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
        
          <form method="POST" action="{{ route('logout') }}">
          @csrf
            <li class="nav-item"><a class="nav-link" href="cerrarSesion" onclick="event.preventDefault();this.closest('form').submit();">
              Cerrar Sesión
            </a></li>
          </form>

        @else
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">
            Ingresar
          </a></li>

            @endauth
          </ul>
        </div>
      <i class="bi mobile-nav-toggle d-none bi-x"></i>
    </nav><!-- .navbar -->
</header><!-- End Header -->