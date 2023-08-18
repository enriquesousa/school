@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    {{-- Lista de Usuarios --}}
                    <div class="box">

                        {{-- Encabezado --}}
                        <div class="box-header with-border">
                            <h4 class="box-title">Ver Detalles - Salario de Empleado</h4>
                            <h6 class="box-subtitle"><strong>Nombre Empleado: </strong> <span class="text-warning">{{ $details->name }}</span></h6>
                            <h6 class="box-subtitle"><strong>ID Empleado: </strong> <span class="text-warning">{{ $details->id_no }}</span></h6>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                {{-- <table id="example1" class="table table-bordered table-striped"> --}}
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">Serie</th>
                                            <th>Salario Anterior</th>
                                            <th>Incremento de Salario</th>
                                            <th>Salario Actual</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($salary_log as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>$ @convert($value->previous_salary)</td>
                                            <td>$ @convert($value->increment_salary)</td>
                                            <td>$ @convert($value->present_salary)</td>
                                            <td>{{ date('d-F-Y', strtotime($value->effected_salary)) }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>

                                    <tfoot>

                                    </tfoot>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>


            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>
<!-- /.content-wrapper -->
@endsection

