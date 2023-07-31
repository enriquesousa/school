{{-- Para colorear el menu donde estamos  --}}
@php
    $prefix = Request::route()->getPrefix();
    $route = Request::route()->getName();
@endphp
{{-- @dd($prefix, $route); --}}

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar-->
  <section class="sidebar">

    {{-- Titulo Sidebar --}}
    <div class="user-profile">
      <div class="ulogo">
        <a href="index.html">
          <!-- logo for regular state and mobile devices -->
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
            <h3><b>Admin</b> Escuela</h3>
          </div>
        </a>
      </div>
    </div>

    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">

      {{-- Dashboard - Panel de Control --}}
      <li class="{{ ($route == 'dashboard') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}">
            <i class="fa fa-fw fa-area-chart"></i>
            <span>Panel</span>
        </a>
      </li>

      {{-- Manejar Usuarios --}}
      <li class="treeview {{ ($prefix == 'users') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-user-o"></i>
          <span>Manejar Usuarios</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>Lista de Usuarios</a></li>
          <li><a href="{{ route('user.add') }}"><i class="ti-more"></i>Agregar Usuario</a></li>
        </ul>
      </li>

      {{-- Manejar Perfil --}}
      <li class="treeview {{ ($prefix == 'profile') ? 'active' : '' }}">
        <a href="#">
          {{-- <i data-feather="mail"></i>  --}}
          <i class="fa fa-vcard-o" aria-hidden="true"></i><span>Manejar Perfil</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Tu Perfil</a></li>
          {{-- <li><a href="{{ route('profile.advance.form') }}"><i class="ti-more"></i>Advanced Form</a></li> --}}
          <li><a href="{{ route('password.view') }}"><i class="ti-more"></i>Cambiar contraseña</a></li>
        </ul>
      </li>

      {{-- Configuración --}}
      <li class="treeview {{ ($prefix == 'setups') ? 'active' : '' }}">
        <a href="#">
          {{-- <i data-feather="mail"></i>  --}}
          <i class="fa fa-cog" aria-hidden="true"></i><span>Config. Estudiantes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Materias</a></li>
          <li><a href="{{ route('student.year.view') }}"><i class="ti-more"></i>Años</a></li>
          <li><a href="{{ route('student.group.view') }}"><i class="ti-more"></i>Grupos</a></li>
        </ul>
      </li>



      <li class="header nav-small-cap">User Interface</li>

      {{-- Components --}}
      <li class="treeview">
        <a href="#">
          <i data-feather="grid"></i>
          <span>Components</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
          <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
        </ul>
      </li>


      {{-- Log Out --}}
      <li>
        <a href="{{ route('admin.logout') }}">
          <i data-feather="lock"></i>
          <span>Cerrar Sesión</span>
        </a>
      </li>

    </ul>
  </section>

  {{-- sidebar-footer --}}
  <div class="sidebar-footer">
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
      aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
    <!-- item-->
    <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
        class="ti-email"></i></a>
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
        class="ti-lock"></i></a>
  </div>

</aside>
