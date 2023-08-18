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
                        <div class="box-header with-border">

                            <h3 class="box-title">Lista - Salario de Empleados</h3>

                            {{-- botón agregar designación --}}
                            <a href="{{ route('employee.registration.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Agregar Empleado</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">Serie</th>
                                            <th>Nombre</th>
                                            <th>ID</th>
                                            <th>Celular</th>
                                            <th>Sexo</th>
                                            <th>Fecha Ingreso</th>
                                            <th>Salario</th>

                                            <th width="15%">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($allData as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->id_no }}</td>
                                            <td>{{ $value->mobile }}</td>
                                            <td>{{ $value->gender }}</td>
                                            <td>{{ date('d-F-Y', strtotime($value->join_date)) }}</td>
                                            {{-- <td>{{ date('d-m-Y', strtotime($value->join_date)) }}</td> --}}
                                            <td>$ @convert($value->salary)</td>

                                            <td>
                                                {{-- Botón Incrementar Salario --}}
                                                <a title="Incrementar Salario" href="{{ route('employee.salary.increment', $value->id) }}" class="btn btn-info"><i class="fa fa-plus-circle"></i></a>

                                                {{-- Botón Ver Detalle --}}
                                                <a title="Ver Detalle" target="_blank" href="{{ route('employee.salary.details', $value->id) }}" class="btn btn-danger"><i class="fa fa-eye"></i></a>
                                            </td>
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

