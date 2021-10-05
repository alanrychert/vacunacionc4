<!-- ======= Top Bar ======= -->
<div id="topbar" class="fixed-top d-flex align-items-center fixed-top">
  <i class="bi bi-list mobile-nav-toggle"></i>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    
    <nav id="navbar" class="navbar justify-content-start">
      <ul>
        <li><a href="{{ route('index') }}">Inicio</a></li>
        @auth
        <li><a href="{{ route('vaccinated.create') }}">Nuevo Vacunado</a></li>
        <li><a href="{{ route('batch.create') }}">Nuevo lote</a></li>        
        <li><a href="{{ url('/dashboard') }}">
          Dashboard
        </a></li>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <li><a href="cerrarSesion" onclick="event.preventDefault();this.closest('form').submit();">
            Cerrar Sesión
          </a></li>
        </form>

        @else
        <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">
          Ingresar
        </a></li>

        @endauth
      </ul>
      <i class="bi mobile-nav-toggle d-none bi-x"></i>
    </nav><!-- .navbar -->
</header><!-- End Header -->