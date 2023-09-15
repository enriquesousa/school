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

                            <h3 class="box-title">Lista - Empleados</h3>

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
                                            <th>Designación</th>
                                            <th>Celular</th>
                                            <th>Sexo</th>
                                            <th>Fecha Ingreso</th>
                                            <th>Salario</th>
                                            @if (Auth::user()->role == 'Admin')
                                                <th>Código</th>
                                            @endif
                                            <th width="25%">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($allData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->id_no }}</td>
                                            <td>{{ $item->designation->name }}</td>
                                            <td>{{ $item->mobile }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <td>{{ $item->join_date }}</td>
                                            <td>$ @convert($item->salary)</td>
                                            @if (Auth::user()->role == 'Admin')
                                                <td>{{ $item->code }}</td>
                                            @endif

                                            <td>
                                                {{-- Botón Editar --}}
                                                <a href="{{ route('employee.registration.edit', $item->id) }}" class="btn btn-info">Editar</a>

                                                {{-- Botón Eliminar --}}
                                                <a target="_blank" href="{{ route('employee.registration.details', $item->id) }}" class="btn btn-danger">Detalle</a>
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

