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
                    <h4 class="box-title">Ausencias de Empleados</h4>
                    <h6 class="box-subtitle">Para agregar una ausencia de empleado en la <a class="text-warning" href="#">base de datos</a></h6>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('store.employee.leave') }}">
                            @csrf

                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">

                                            {{-- Nombre de Empleado Select --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Nombre de Empleado<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="employee_id" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Seleccionar Nombre de Empleado</option>
                                                            @foreach ($employees as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Fecha de Inicio --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Fecha de Inicio<span class="text-danger">*</span></h5>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                                        <input type="date" name="start_date" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Motivo de Ausencia Select --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Motivo de Ausencia<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="leave_purpose_id" id="leave_purpose_id" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Seleccionar Motivo de Ausencia</option>
                                                            @foreach ($leave_purpose as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                            <option value="0">Nuevo Motivo</option>
                                                        </select>
                                                        <input type="text" name="motivo_nuevo" id="add_another" class="form-control" placeholder="Escriba un nuevo motivo" style="display: none;">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Fecha Final --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Fecha de Final<span class="text-danger">*</span></h5>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                                        <input type="date" name="end_date" class="form-control" required>
                                                    </div>
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


{{-- Funcionalidad JS para mostrar input de 'Escriba un nuevo motivo' --}}
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change','#leave_purpose_id', function(){
            var leave_purpose_id = $(this).val();
            if(leave_purpose_id == 0){
                $('#add_another').show();
            }else{
                $('#add_another').hide();
            }
        });
    });
</script>



@endsection
