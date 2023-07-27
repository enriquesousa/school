@extends('admin.admin_master')
@section('admin')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">

      <section class="content">

        <!-- Basic Forms -->
        <div class="box">

          <div class="box-header with-border">
            <h4 class="box-title">Actualizar Usuario</h4>
            <h6 class="box-subtitle">Para actualizar datos de un usuario en la <a class="text-warning" href="#">base de
                datos</a>
            </h6>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">

                <form method="post" action="{{ route('user.update', $editData->id) }}">
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
                                <option value="" selected="" disabled="">Seleccionar Rol</option>
                                <option value="Admin" {{ ($editData->usertype == 'Admin' ? 'selected' : '') }}>Admin</option>
                                <option value="User" {{ ($editData->usertype == 'User' ? 'selected' : '') }}>User</option>
                              </select>
                            </div>
                          </div>

                        </div>

                        <div class="col-md-6">

                          {{-- Basic Text Input --}}
                          <div class="form-group">
                            <h5>Nombre <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ $editData->name }}" required="">
                              @error('name')
                                <div class="form-control-feedback invalid-feedback">
                                  <small>{{ $message }}</small>
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

                              <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ $editData->email }}" required="">
                              @error('email')
                                <div class="form-control-feedback invalid-feedback">
                                  <small>{{ $message }}</small>
                                </div>
                              @enderror

                            </div>

                          </div>

                        </div>

                        <div class="col-md-6">



                        </div>

                      </div>


                    </div>
                  </div>

                  <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Actualizar">
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
