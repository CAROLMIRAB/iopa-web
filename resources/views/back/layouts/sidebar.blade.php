<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
  <div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main"
      aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <!-- Brand -->
    <a class="navbar-brand pt-0" href="{{ route('post.view-all-posts') }}">
        <img src=" {{ asset('back/img/logo-iopa.png') }}" class="navbar-brand-img" alt="...">
      </a>
    <!-- Navigation -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('post.view-all-posts') }}">
              <i class="ni ni-planet text-primary"></i> Noticias
            </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('doctor.view-all-doctors') }}">
              <i class="ni ni-circle-08 text-primary"></i> Doctores
            </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('office.view-all-offices') }}">
              <i class="ni ni-pin-3 text-orange"></i> Sucursales
            </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('agreement.view-agreement') }}">
                <i class="ni ni-bullet-list-67 text-red"></i> Convenios
              </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('exam.view-all-exams') }}">
          <i class="ni ni-bullet-list-67 text-red"></i> Examenes
              </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('surgery.view-all-surgeries') }}">
            <i class="ni ni-bullet-list-67 text-red"></i> Cirugías 
              </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('specialty.view-all-specialties') }}">
          <i class="ni ni-bullet-list-67 text-red"></i> Especialidades
                </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('core.allconfigurations') }}">
          <i class="ni ni-bullet-list-67 text-red"></i> Configuración
                </a>
      </li>
         <li class="nav-item">
            <a class="nav-link" href="{{ route('core.view-all-images') }}">
                  <i class="ni ni-collection text-primary"></i>Galería
            </a>
          </li>
    </ul>
    @if(Auth::user()->hasRole('admin'))
    <hr class="" style="width: 100%; margin-top: 0px; margin-bottom: 0px">
    <ul class="navbar-nav mb-md-3">
      <li class="nav-item">
      <a class="nav-link" href="{{ route('user.view-all-users') }}">
           <i class="ni ni-key-25"></i> Usuarios
         </a>
      </li>
    </ul>
    @endif
  </div>
</nav>

<div class="main-content">
  <!-- Top navbar -->
  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
      <div class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
      </div>
      <!-- User -->
      <ul class="navbar-nav user-log align-items-center d-none d-md-flex">
        <li class="nav-item dropdown dropdown-drop">
          <a class="nav-link pr-0 user-click" href="javascript:" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <div class="ml-2 d-none d-lg-block">
                <span class="mb-0 text-sm font-weight-bold ">{{ Auth::user()->name }}</span>
              </div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Bienvenido!</h6>
            </div>
            <a href="{{route('password.request')}}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Cambiar Contraseña</span>
                </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('user.logout') }}" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Cerrar Sesión</span>    
            </a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Header -->