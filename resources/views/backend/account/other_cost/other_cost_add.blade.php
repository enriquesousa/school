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
                    <h4 class="box-title">Agregar Otros Costos</h4>
                    <h6 class="box-subtitle">Para agregar Otros Costos en la <a class="text-warning"
                            href="#">base de datos </a>
                    </h6>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('store.other.cost') }}" enctype="multipart/form-data">
                            @csrf

                                {{-- Row 1 - Cantidad, Fecha, Imagen, Desplegar Imagen --}}
                                <div class="row">

                                    {{-- Cantidad --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Cantidad <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></div>
                                                <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Fecha --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></div>
                                                <input class="form-control" type="date" name="date" value="{{ old('date') }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    {{--  Escoger Foto  --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Imagen</label>
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
                                                <img id="showImage" src="{{ url('upload/no_image.jpg') }}" {{-- No se puede usar old value en un input file
                                                    upload por seguridad --}} {{--
                                                    src="{{ (!empty('image')) ? url('upload/student_images/'.'image') : url('upload/no_image.jpg') }}" --}}
                                                    alt="" style="width:100px; height:100px; border: 1px solid #000000;">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                {{-- Row 2 - Descripción --}}
                                <div class="row">

                                    {{-- Descripción --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>Descripción <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="description" id="description" class="form-control" required="" placeholder="Area de Texto, agregar descripción del gasto"></textarea>
                                            <div class="help-block"></div></div>
                                        </div>
                                    </div>

                                </div>

                                {{-- Botón Submit Guardar --}}
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
