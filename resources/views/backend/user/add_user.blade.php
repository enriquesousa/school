@extends('admin.admin_master')
@section('admin')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="container-full">

    <section class="content">

      <!-- Basic Forms -->
      <div class="box">

        <div class="box-header with-border">
          <h4 class="box-title">Agregar Usuario</h4>
          <h6 class="box-subtitle">Para agregar un usuarios a la <a class="text-warning" href="#">base de datos </a>
          </h6>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">

              <form method="post" action="{{ route('user.store') }}">
              @csrf

                <div class="row">
                  <div class="col-12">

                    <div class="row">

                      <div class="col-md-6">

                        {{-- Basic Select --}}
                        <div class="form-group">
                          <h5>Rol de Usuario <span class="text-danger">*</span></h5>
                          <div class="controls">
                            <select name="usertype" id="usertype" required="" class="form-control">
                              <option value="" selected="" disabled="">Seleccionar Rol
                              </option>
                              <option value="Admin">Admin</option>
                              <option value="User">User</option>
                            </select>
                          </div>
                        </div>

                      </div>

                      <div class="col-md-6">

                        {{-- Basic Text Input --}}
                        <div class="form-group">
                          <h5>Nombre <span class="text-danger">*</span></h5>
                          <div class="controls">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                              required="">
                            @error('name')
                            <div class="form-control-feedback invalid-feedback">
                              <small>Campo
                                <code>requerido </code>{{ $message }}</small>
                            </div>
                            @enderror
                          </div>
                        </div>

                      </div>

                    </div>

                    <div class="row">

                      <div class="col-md-6">

                        {{-- Correo Electrónico --}}
                        <div class="form-group">
                          <h5>Correo Electrónico <span class="text-danger">*</span></h5>
                          <div class="controls">

                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                              required="">
                            @error('email')
                            <div class="form-control-feedback invalid-feedback">
                              <small>Campo
                                <code>requerido </code>{{ $message }}</small>
                            </div>
                            @enderror

                          </div>

                          {{-- <div class="form-group">
                            <h5>Basic Text Input <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="text" class="form-control" required=""
                                data-validation-required-message="This field is required">
                              <div class="help-block"></div>
                            </div>
                            <div class="form-control-feedback"><small>Add
                                <code>required</code> attribute to field for required
                                validation.</small></div>
                          </div> --}}

                        </div>

                      </div>

                      <div class="col-md-6">

                        {{-- Contraseña --}}
                        <div class="form-group">
                          <h5>Contraseña <span class="text-danger">*</span></h5>
                          <div class="controls">
                            <input type="password" name="password" class="form-control" required="">
                          </div>
                        </div>

                      </div>

                    </div>


                  </div>
                </div>

                <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-info mb-5" value="Enviar">
                </div>

              </form>

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box-body -->

    </section>

  </div>
</div>
<!-- /.content-wrapper -->
@endsection
