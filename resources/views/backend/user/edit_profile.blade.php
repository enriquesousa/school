@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <div class="container-full">

    <section class="content">

      <!-- Basic Forms -->
      <div class="box">

        {{-- Editar Perfil --}}
        <div class="box-header with-border">
          <h4 class="box-title">Editar Perfil</h4>
          <h6 class="box-subtitle">Para actualizar datos de tu perfil en la <a class="text-warning" href="#">base de
              datos</a>
          </h6>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">

              <form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
              @csrf

                <div class="row">
                  <div class="col-12">

                    {{-- Renglón 1 - Nombre y Correo Electrónico --}}
                    <div class="row">

                      {{-- Primer Columna --}}
                      <div class="col-md-6">
                        {{-- User Name --}}
                        <div class="form-group">
                          <h5>Nombre <span class="text-danger">*</span></h5>
                          <div class="controls">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                              value="{{ $editData->name }}" required="">
                            @error('name')
                            <div class="form-control-feedback invalid-feedback">
                              <small>{{ $message }}</small>
                            </div>
                            @enderror
                          </div>
                        </div>
                      </div>

                      {{-- Segunda Columna --}}
                      <div class="col-md-6">
                        {{-- Correo Electrónico --}}
                        <div class="form-group">
                          <h5>Correo Electrónico <span class="text-danger">*</span></h5>
                          <div class="controls">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                              value="{{ $editData->email }}" required="">
                            @error('email')
                            <div class="form-control-feedback invalid-feedback">
                              <small>{{ $message }}</small>
                            </div>
                            @enderror
                          </div>
                        </div>
                      </div>

                    </div>

                    {{-- Renglón 2 - Celular y Dirección --}}
                    <div class="row">

                      {{-- Primer Columna --}}
                      <div class="col-md-6">

                        <!-- Celular -->
                        <div class="form-group">
                          <label>Celular</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            {{-- <input type="text" name="mobile" id="tel" class="form-control" value="{{ $editData->mobile }}"> --}}
                            <input type="text" name="mobile" class="form-control" data-inputmask="'mask':[ '(999) 999-9999']" data-mask="" value="{{ $editData->mobile }}">
                          </div>
                        </div>

                      </div>

                      {{-- Segunda Columna --}}
                      <div class="col-md-6">

                        <!-- Dirección -->
                        <div class="form-group">
                          <label>Dirección</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-address-card" aria-hidden="true"></i>
                            </div>
                            <input type="text" name="address" class="form-control" value="{{ $editData->address }}">
                          </div>
                        </div>

                      </div>

                    </div>

                    {{-- Renglón 3 - Sexo y Foto --}}
                    <div class="row">

                      {{-- Columna 1 - Sexo --}}
                      <div class="col-md-6">

                        {{-- Select Sexo --}}
                        <div class="form-group">
                          <h5>Sexo&nbsp;<i class="fa fa-fw fa-venus-mars"></i>&nbsp;<span class="text-danger">*</span></h5>
                          <div class="controls">
                            <select name="gender" id="gender" required="" class="form-control">
                              <option value="" selected="" disabled="">Seleccionar Sexo</option>
                              <option value="Male" {{ $editData->gender == 'Male' ? 'selected' : '' }}>Masculino</option>
                              <option value="Female" {{ $editData->gender == 'Female' ? 'selected' : '' }}>Femenino</option>
                            </select>
                          </div>
                        </div>

                      </div>

                      {{-- Columna 2  - Rol --}}
                      <div class="col-md-6">

                        <!-- Foto / Imagen -->
                        <div class="form-group">
                          <label>Foto</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-file-image-o" aria-hidden="true"></i>
                            </div>
                            <input type="file" name="image" id="image" class="form-control">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="controls">
                            <img id="showImage" src="{{ (!empty($editData->image)) ? url('upload/user_images/'.$editData->image) : url('upload/no_image.jpg') }}" alt="" style="width:100px; height:100px; border: 1px solid #000000;">
                          </div>
                        </div>

                      </div>

                    </div>

                    {{-- Renglón 4 - Fecha y Hora y Celular --}}
                    {{-- <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Date</label>
                          <input class="form-control" type="date" name="date">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Time</label>
                          <input class="form-control" type="time" name="time">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <input type="text" class="form-control" data-inputmask="'mask':[ '(999) 999-9999']" data-mask="">
                        </div>
                      </div>

                    </div> --}}


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

  {{--  Format phone number --}}
  <script type="text/javascript">
    // Format phone number
    // https://stackoverflow.com/questions/17980061/how-to-change-phone-number-format-in-input-as-you-type
    $("input[id='tel']").keyup(function() {
        $(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d{2})(\d+)$/, "($1) $2-$3-$4"));
        $(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d{4})$/, "($1) $2-$3"));
    });
  </script>

  {{-- Funcionalidad con la imagen --}}
  <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
  </script>

@endsection

