{{-- Para colorear el menu donde estamos --}}
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

            {{-- Admin Usuarios --}}
            @if (Auth::user()->role == 'Admin')
                <li class="treeview {{ ($prefix == 'users') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-user-o"></i>
                        <span>Admin Usuarios</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'user.view') ? 'active' : '' }}"><a href="{{ route('user.view') }}"><i class="ti-more"></i>Lista de Usuarios</a></li>
                        <li class="{{ ($route == 'user.add') ? 'active' : '' }}"><a href="{{ route('user.add') }}"><i class="ti-more"></i>Agregar Usuario</a></li>
                    </ul>
                </li>
            @endif

            {{-- Admin Perfil --}}
            <li class="treeview {{ ($prefix == 'profile') ? 'active' : '' }}">
                <a href="#">
                    {{-- <i data-feather="mail"></i> --}}
                    <i class="fa fa-vcard-o" aria-hidden="true"></i><span>Admin Perfil</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'profile.view') ? 'active' : '' }}"><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Tu Perfil</a></li>
                    {{-- <li><a href="{{ route('profile.advance.form') }}"><i class="ti-more"></i>Advanced Form</a></li>
                    --}}
                    <li class="{{ ($route == 'password.view') ? 'active' : '' }}"><a href="{{ route('password.view') }}"><i class="ti-more"></i>Cambiar contraseña</a></li>
                </ul>
            </li>

            {{-- Configuración --}}
            <li class="treeview {{ ($prefix == 'setups') ? 'active' : '' }}">
                <a href="#">
                    {{-- <i data-feather="mail"></i> --}}
                    <i class="fa fa-cog" aria-hidden="true"></i><span>Configuración</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'student.class.view') ? 'active' : '' }}"><a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Clases</a></li>
                    <li class="{{ ($route == 'student.year.view') ? 'active' : '' }}"><a href="{{ route('student.year.view') }}"><i class="ti-more"></i>Años</a></li>
                    <li class="{{ ($route == 'student.group.view') ? 'active' : '' }}"><a href="{{ route('student.group.view') }}"><i class="ti-more"></i>Grupos</a></li>
                    <li class="{{ ($route == 'student.shift.view') ? 'active' : '' }}"><a href="{{ route('student.shift.view') }}"><i class="ti-more"></i>Horario</a></li>
                    <li class="{{ ($route == 'fee.category.view') ? 'active' : '' }}"><a href="{{ route('fee.category.view') }}"><i class="ti-more"></i>Categoría de Cobro</a></li>
                    <li class="{{ ($route == 'fee.amount.view') ? 'active' : '' }}"><a href="{{ route('fee.amount.view') }}"><i class="ti-more"></i>Monto de Cobro</a></li>
                    <li class="{{ ($route == 'exam.type.view') ? 'active' : '' }}"><a href="{{ route('exam.type.view') }}"><i class="ti-more"></i>Tipo de Examen</a></li>
                    <li class="{{ ($route == 'school.subject.view') ? 'active' : '' }}"><a href="{{ route('school.subject.view') }}"><i class="ti-more"></i>Materias</a></li>
                    <li class="{{ ($route == 'assign.subject.view') ? 'active' : '' }}"><a href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>Asignar Materias</a></li>
                    <li class="{{ ($route == 'designation.view') ? 'active' : '' }}"><a href="{{ route('designation.view') }}"><i class="ti-more"></i>Designación</a></li>
                </ul>
            </li>

            {{-- Admin Estudiantes --}}
            <li class="treeview {{ ($prefix == 'students') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-cog" aria-hidden="true"></i><span>Admin Estudiantes</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'student.registration.view') ? 'active' : '' }}"><a href="{{ route('student.registration.view') }}"><i class="ti-more"></i>Registro de Estudiantes</a></li>
                    <li class="{{ ($route == 'roll.generate.view') ? 'active' : '' }}"><a href="{{ route('roll.generate.view') }}"><i class="ti-more"></i>Generar Rol</a></li>
                    <li class="{{ ($route == 'registration.fee.view') ? 'active' : '' }}"><a href="{{ route('registration.fee.view') }}"><i class="ti-more"></i>Cargo Inscripción</a></li>
                    <li class="{{ ($route == 'monthly.fee.view') ? 'active' : '' }}"><a href="{{ route('monthly.fee.view') }}"><i class="ti-more"></i>Cargo Mensualidad</a></li>
                    <li class="{{ ($route == 'exam.fee.view') ? 'active' : '' }}"><a href="{{ route('exam.fee.view') }}"><i class="ti-more"></i>Cargo Examen</a></li>
                </ul>
            </li>

            {{-- Admin Empleados --}}
            <li class="treeview {{ ($prefix == 'employees') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-cog" aria-hidden="true"></i><span>Admin Empleados</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'employee.registration.view') ? 'active' : '' }}"><a href="{{ route('employee.registration.view') }}"><i class="ti-more"></i>Registro de Empleado</a></li>
                    <li class="{{ ($route == 'employee.salary.view') ? 'active' : '' }}"><a href="{{ route('employee.salary.view') }}"><i class="ti-more"></i>Salario de Empleado</a></li>
                    <li class="{{ ($route == 'employee.leave.view') ? 'active' : '' }}"><a href="{{ route('employee.leave.view') }}"><i class="ti-more"></i>Ausencias</a></li>
                    <li class="{{ ($route == 'employee.attendance.view') ? 'active' : '' }}"><a href="{{ route('employee.attendance.view') }}"><i class="ti-more"></i>Asistencia</a></li>
                    <li class="{{ ($route == 'employee.monthly.view') ? 'active' : '' }}"><a href="{{ route('employee.monthly.view') }}"><i class="ti-more"></i>Sueldo Mensual</a></li>
                </ul>
            </li>

            {{-- Admin de Calificaciones - Marks Management --}}
            <li class="treeview {{ ($prefix == 'marks') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-cog" aria-hidden="true"></i><span>Admin Calificaciones</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                     <li class="{{ ($route == 'marks.entry.view.add') ? 'active' : '' }}"><a href="{{ route('marks.entry.view.add') }}"><i class="ti-more"></i>Entrar Calificaciones</a></li>
                     <li class="{{ ($route == 'marks.entry.edit') ? 'active' : '' }}"><a href="{{ route('marks.entry.edit') }}"><i class="ti-more"></i>Editar Calificaciones</a></li>
                     <li class="{{ ($route == 'marks.entry.grade') ? 'active' : '' }}"><a href="{{ route('marks.entry.grade') }}"><i class="ti-more"></i>Config. Grados</a></li>

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
