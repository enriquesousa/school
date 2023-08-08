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
                    <h4 class="box-title">Promover Estudiante</h4>
                    <h6 class="box-subtitle">Para agregar estudiante en la <a class="text-warning"
                            href="#">base de datos </a>
                    </h6>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('promotion.student.registration.update', $editData->student_id) }}" enctype="multipart/form-data">
                            @csrf

                                <input type="hidden" name="id" value="{{ $editData->id }}">

                                <div class="row">
                                    <div class="col-12">

                                        {{-- Row 1 - Nombre Estudiante, Padre y Madre --}}
                                        <div class="row">

                                            {{-- Nombre Estudiante --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Nombre Estudiante<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" value="{{ $editData->student->name }}" required autofocus>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Nombre del Padre --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Nombre del Padre<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="fname" class="form-control" value="{{ $editData->student->fname }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Nombre de la Madre --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Nombre de la Madre<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mname" class="form-control" value="{{ $editData->student->mname }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        {{-- Row 2 - Celular, Dirección y Sexo--}}
                                        <div class="row">

                                            {{-- Teléfono Celular --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Celular</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                        <input type="text" name="mobile" class="form-control" value="{{ $editData->student->mobile }}" data-inputmask="'mask':[ '(999) 999-9999']"
                                                            data-mask="">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Dirección --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Dirección</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-address-card" aria-hidden="true"></i></div>
                                                        <input type="text" name="address" class="form-control" value="{{ $editData->student->address }}">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Sexo --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Sexo&nbsp;<i class="fa fa-fw fa-venus-mars"></i>&nbsp;<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="gender" id="gender" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Seleccionar Sexo</option>
                                                            <option value="Male" {{ $editData->student->gender == 'Male' ? 'selected' : '' }}>Masculino</option>
                                                            <option value="Female" {{ $editData->student->gender == 'Female' ? 'selected' : '' }}>Femenino</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        {{-- Row 3 - Religion, Cumpleaños, Descuento --}}
                                        <div class="row">

                                            {{-- Religion --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Religion&nbsp;<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="religion" id="religion" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Seleccionar Religion</option>
                                                            <option value="católico" {{ $editData->student->religion == 'católico' ? 'selected' : '' }}>Cristianismo católico</option>
                                                            <option value="cristiano" {{ $editData->student->religion == 'cristiano' ? 'selected' : '' }}>Cristianismo evangélico, pentecostal y protestante</option>
                                                            <option value="ateo" {{ $editData->student->religion == 'ateo' ? 'selected' : '' }}>Ateísmo</option>
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
                                                        <input class="form-control" type="date" name="dob" value="{{ $editData->student->dob }}">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Descuento --}}
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <label>Descuento</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></div>
                                                        <input class="form-control" type="number" name="discount" value="{{ $editData->discount->discount }}">
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        {{-- Row 4 - Año, Clase, Grupo --}}
                                        <div class="row">

                                            {{-- Año --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Año&nbsp;<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="year_id" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Seleccionar Año</option>
                                                            @foreach ($years as $item)
                                                                <option value="{{ $item->id }}" {{ $editData->year_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Clase --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Clase&nbsp;<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="class_id" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Seleccionar Clase</option>
                                                            @foreach ($classes as $item)
                                                                <option value="{{ $item->id }}" {{ $editData->class_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Grupo --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Grupo&nbsp;<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="group_id" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Seleccionar Grupo</option>
                                                            @foreach ($groups as $item)
                                                                <option value="{{ $item->id }}" {{ $editData->group_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        {{-- Row 4 - Shift(turno), Foto File, Display Foto --}}
                                        <div class="row">

                                            {{-- Shift --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Turno&nbsp;<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="shift_id" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Seleccionar Turno</option>
                                                            @foreach ($shifts as $item)
                                                            <option value="{{ $item->id }}" {{ $editData->shift_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Escoger Foto --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Foto</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                                        </div>
                                                        <input type="file" name="image" id="image" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Desplegar Foto --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img id="showImage"
                                                            src="{{ (!empty($editData->student->image)) ? url('upload/student_images/'.$editData->student->image) : url('upload/no_image.jpg') }}"
                                                            alt=""
                                                            style="width:100px; height:100px; border: 1px solid #000000;">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Promover">
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
