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

                            <h3 class="box-title">Ausencias de Empleados</h3>

                            {{-- botón agregar ausencia --}}
                            <a href="{{ route('employee.leave.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Agregar Ausencia</a>

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
                                            <th>Motivo</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Final</th>
                                            <th width="25%">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($allData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->user->id_no }}</td>
                                            <td>{{ $item->purpose->name }}</td>
                                            <td>{{ $item->start_date }}</td>
                                            <td>{{ $item->end_date }}</td>

                                            <td>
                                                {{-- Botón Editar --}}
                                                <a href="{{ route('employee.leave.edit', $item->id) }}" class="btn btn-info">Editar</a>

                                                {{-- Botón Eliminar --}}
                                                <a href="{{ route('designation.delete', $item->id) }}" class="btn btn-danger" id="delete">Eliminar</a>
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
