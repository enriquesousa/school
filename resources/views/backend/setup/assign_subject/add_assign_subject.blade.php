@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Agregar Asignar Materias</h4>
                    <h6 class="box-subtitle">Para agregar asignación de materias por clase en la <a class="text-warning" href="#">base de datos </a></h6>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('store.assign.subject') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-12">
                                        <div class="add_item">

                                            {{-- Select - Categoría de Cobro --}}
                                            <div class="form-group">
                                                <h5>Nombre de la Clase <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="class_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Seleccionar Clase</option>
                                                        @foreach ($classes as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="row">

                                                {{-- Select Materias --}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Materias <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="subject_id[]" required="" class="form-control">
                                                                <option value="" selected="" disabled="">Seleccionar Materias</option>
                                                                @foreach ($subjects as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- full_mark --}}
                                                <div class="col-md-2">
                                                    <div class="form-group validate">
                                                        <h5>Evaluación Total <span class="text-danger">*</span></h5>
                                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                                                            <input type="number" name="full_mark[]" class="form-control" required="" data-validation-required-message="Este campo es requerido" aria-invalid="false" title="Evaluación/Calificación Total del estudiante">
                                                            <span class="input-group-addon">.00</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- pass_mark --}}
                                                <div class="col-md-2">
                                                    <div class="form-group validate">
                                                        <h5>Evaluación Aprobatoria <span class="text-danger">*</span></h5>
                                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                                                            <input type="number" name="pass_mark[]" class="form-control" required="" data-validation-required-message="Este campo es requerido" aria-invalid="false">
                                                            <span class="input-group-addon">.00</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- subjective_mark / Evaluación subjetiva--}}
                                                <div class="col-md-2">
                                                    <div class="form-group validate">
                                                        <h5>Evaluación subjetiva <span class="text-danger">*</span></h5>
                                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                                                            <input type="number" name="subjective_mark[]" class="form-control" required="" data-validation-required-message="Este campo es requerido" aria-invalid="false">
                                                            <span class="input-group-addon">.00</span>
                                                        </div>
                                                    </div>
                                                </div>


                                                {{-- fa-plus-circle --}}
                                                <div class="col-md-2" style="padding-top: 25px;">
                                                    <span class="btn btn-success addEventMore"><i class="fa fa-plus-circle"></i></span>
                                                </div>

                                            </div>

                                        </div> <!-- End add_item -->

                                    </div> <!-- End col-md-12 -->
                                </div> <!-- End Row -->

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

{{-- Siguientes renglones de entradas  Clases y monto si el usuario da click al botón de +plus --}}
<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">


                {{-- Select Materias --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Materias <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="subject_id[]" required="" class="form-control">
                                <option value="" selected="" disabled="">Seleccionar Materias</option>
                                @foreach ($subjects as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>

                {{-- full_mark --}}
                <div class="col-md-2">
                    <div class="form-group validate">
                        <h5>Evaluación Total <span class="text-danger">*</span></h5>
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                            <input type="number" name="full_mark[]" class="form-control" required="" data-validation-required-message="Este campo es requerido" aria-invalid="false" title="Evaluación/Calificación Total del estudiante">
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                </div>

                {{-- pass_mark --}}
                <div class="col-md-2">
                    <div class="form-group validate">
                        <h5>Evaluación Aprobatoria <span class="text-danger">*</span></h5>
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                            <input type="number" name="pass_mark[]" class="form-control" required="" data-validation-required-message="Este campo es requerido" aria-invalid="false">
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                </div>

                {{-- subjective_mark / Evaluación subjetiva--}}
                <div class="col-md-2">
                    <div class="form-group validate">
                        <h5>Evaluación subjetiva <span class="text-danger">*</span></h5>
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                            <input type="number" name="subjective_mark[]" class="form-control" required="" data-validation-required-message="Este campo es requerido" aria-invalid="false">
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                </div>


                {{-- Add / Remove Row --}}
                <div class="col-md-2" style="padding-top: 25px;">
                    <span class="btn btn-success addEventMore"><i class="fa fa-plus-circle"></i> </span>
                    <span class="btn btn-danger removeEventMore"><i class="fa fa-minus-circle"></i> </span>
                </div><!-- End col-md-2 -->

            </div>
        </div>
    </div>
</div>


{{-- JS para desplegar mas renglones div con el botón vender de +Plus --}}
<script type="text/javascript">
    $(document).ready(function(){
 		var counter = 0;
 		$(document).on("click",".addEventMore",function(){
 			var whole_extra_item_add = $('#whole_extra_item_add').html();
 			$(this).closest(".add_item").append(whole_extra_item_add);
 			counter++;
 		});
 		$(document).on("click",'.removeEventMore',function(event){
 			$(this).closest(".delete_whole_extra_item_add").remove();
 			counter -= 1
 		});

 	});
</script>


@endsection
