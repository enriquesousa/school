@extends('admin.admin_master')
@section('admin')

{{-- lo baje de: https://www.w3schools.com/jquery/jquery_get_started.asp --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                {{-- Color Card --}}
                <div class="col-12">

                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Empleados <strong>Reporte de Asistencia</strong></h4>
                            <h6 class="box-subtitle">Para Generar Reportes de  <a class="text-warning"
                                href="#">Asistencia</a></h6>
                        </div>

                        <div class="box-body">

                            <form method="GET"" action="{{ route('report.mark-sheet.get') }}" target="_blank">
                            @csrf

                                {{-- Row 1 --}}
                                <div class="row">

                                    {{-- Select Empleado --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Nombre Empleado&nbsp;<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="employee_id" id="employee_id" required="" class="form-control" required>
                                                    <option value="" selected="" disabled="">Seleccionar Empleado</option>
                                                    @foreach ($employees as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Fecha --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Fecha<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="date" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Search Box, ahora lo va a manejar JS --}}
                                    <div class="col-md-4" style="padding-top: 25px;">
                                        <input type="submit" name="" id="" class="btn btn-rounded btn-primary" value="Buscar">
                                    </div>

                                </div>

                            </form>

                        </div>
                    </div>

                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>
<!-- /.content-wrapper -->





@endsection
