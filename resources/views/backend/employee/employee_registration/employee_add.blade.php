@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Agregar Empleado</h4>
                    <h6 class="box-subtitle">Para agregar empleado en la <a class="text-warning"
                            href="#">base de datos </a>
                    </h6>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('store.employee.registration') }}" enctype="multipart/form-data">
                            @csrf

                                <div class="row">
                                    <div class="col-12">

                                        {{-- Row 1 - Nombre Estudiante, Padre y Madre --}}
                                        <div class="row">

                                            {{-- Nombre Estudiante , value="{{ old('name') }}" para no perder data al regresar de un Validation error--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Nombre Empleado<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Nombre del Padre --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Nombre del Padre<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="fname" class="form-control" value="{{ old('fname') }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Nombre de la Madre --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Nombre de la Madre<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mname" class="form-control" value="{{ old('mname') }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        {{-- Row 2 - Celular, Dirección, Email, y Sexo--}}
                                        <div class="row">

                                            {{-- Teléfono Celular --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Celular</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                        <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}" data-inputmask="'mask':[ '(999) 999-9999']"
                                                            data-mask="">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Dirección --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Dirección</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-address-card" aria-hidden="true"></i></div>
                                                        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Email --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Correo Electrónico <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                                        @error('email')
                                                        <div class="form-control-feedback invalid-feedback">
                                                            <small>{{ $message }}</small>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Sexo --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Sexo&nbsp;<i class="fa fa-fw fa-venus-mars"></i>&nbsp;<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="gender" id="gender" required="" class="form-control" value="{{old('gender')}}">
                                                            <option value="" disabled>Seleccionar Sexo</option>
                                                            <option value="Male" {{ old('gender')=='Male' ? 'selected' : '' }}>Masculino</option>
                                                            <option value="Female" {{ old('gender')=='Female' ? 'selected' : '' }}>Femenino</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        {{-- Row 3 - Religion, Cumpleaños, Designación --}}
                                        <div class="row">

                                            {{-- Religion --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Religion&nbsp;<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="religion" id="religion" required="" class="form-control" value="{{ old('religion') }}">
                                                            <option value="" selected="" disabled="">Seleccionar Religion</option>
                                                            <option value="católico" {{ old('religion')=='católico' ? 'selected' : '' }}>Cristianismo católico</option>
                                                            <option value="cristiano" {{ old('religion')=='cristiano' ? 'selected' : '' }}>Cristianismo evangélico, pentecostal y protestante</option>
                                                            <option value="ateo" {{ old('religion')=='ateo' ? 'selected' : '' }}>Ateísmo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Cumpleaños --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Cumpleaños</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-birthday-cake" aria-hidden="true"></i></div>
                                                        <input class="form-control" type="date" name="dob" value="{{ old('dob') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Designación --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Designación&nbsp;<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="designation_id" required="" class="form-control" value="{{ old('designation_id') }}">
                                                            <option value="" selected="" disabled="">Seleccionar Designación</option>
                                                            @foreach ($designations as $item)
                                                                <option value="{{ $item->id }}" {{ old('designation_id')==$item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        {{-- Row 4 - Salario, Fecha de Ingreso, Escoger Foto, Desplegar Foto --}}
                                        <div class="row">

                                            {{-- Salario --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Salario</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></div>
                                                        <input type="number" name="salary" class="form-control" value="{{ old('salary') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Fecha de Ingreso --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Fecha de Ingreso</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></div>
                                                        <input class="form-control" type="date" name="join_date" value="{{ old('join_date') }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--  Escoger Foto  --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Foto</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                                        </div>
                                                        <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            {{--  Desplegar Foto  --}}
                                            <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <img id="showImage"
                                                        src="{{ url('upload/no_image.jpg') }}"
                                                        {{-- No se puede usar old value en un input file upload por seguridad --}}
                                                        {{-- src="{{ (!empty('image')) ? url('upload/student_images/'.'image') : url('upload/no_image.jpg') }}" --}}
                                                        alt=""
                                                        style="width:100px; height:100px; border: 1px solid #000000;">
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Guardar">
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
