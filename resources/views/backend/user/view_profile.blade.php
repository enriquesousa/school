@extends('admin.admin_master')
@section('admin')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-6">

            <div class="box box-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-black">

                {{-- Nombre de User --}}
                <h3 class="widget-user-username">Nombre: {{ $user->name }}</h3>

                {{-- botón agregar usuario --}}
                <a href="{{ route('user.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Editar Perfil</a>

                {{-- user type --}}
                <h6 class="widget-user-desc">Tipo: {{ $user->usertype }}</h6>

                {{-- correo electrónico --}}
                <h6 class="widget-user-desc">Correo: {{ $user->email }}</h6>

              </div>
              <div class="widget-user-image">
                <img class="rounded-circle" src="{{ asset('backend/images/user3-128x128.jpg') }}" alt="User Avatar">
              </div>
              <div class="box-footer">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">12K</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 br-1 bl-1">
                    <div class="description-block">
                      <h5 class="description-header">550</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">158</h5>
                      <span class="description-text">TWEETS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>

          </div>
          <!-- col-6 -->

          <div class="col-6">


          </div>
          <!-- col-6 -->

        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
