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

                            <h3 class="box-title">Lista - Configuración de Grados y Calificaciones</h3>

                            {{-- botón agregar designación --}}
                            <a href="{{ route('marks.grade.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Agregar Nuevo Grado</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">Serie</th>
                                            <th>Nombre</th>
                                            <th>Puntos</th>
                                            <th>Calificación Inicial</th>
                                            <th>Calificación Final</th>
                                            <th>Rango de Puntos</th>
                                            <th>Comentarios</th>
                                            <th width="15%">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($allData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->grade_name }}</td>
                                            <td>@convert($item->grade_point)</td>
                                            <td>{{ $item->start_marks }}</td>
                                            <td>{{ $item->end_marks }}</td>
                                            <td>{{ $item->start_point }} - {{ $item->end_point }}</td>
                                            <td>{{ $item->remarks }}</td>


                                            <td>
                                                {{-- Botón Editar --}}
                                                <a title="Editar" href="{{ route('marks.grade.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>

                                                {{-- Botón Eliminar --}}
                                                <a title="Eliminar" href="{{ route('marks.grade.delete', $item->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash-o"></i></a>
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

