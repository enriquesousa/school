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

                            <h3 class="box-title">Lista - Cargos a Estudiantes</h3>

                            {{-- botón agregar designación --}}
                            <a href="{{ route('student.fee.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Agregar / Editar Cargos a Estudiantes</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">Serie</th>

                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Año</th>
                                            <th>Clase</th>
                                            <th>Tipo de Cargo</th>
                                            <th>Total</th>

                                            <th>Fecha</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($allData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $item->student->id_no }}</td>
                                            <td>{{ $item->student->name }}</td>
                                            <td>{{ $item->student_year->name }}</td>
                                            <td>{{ $item->student_class->name }}</td>
                                            <td>{{ $item->fee_category->name }}</td>
                                            <td>$ @convert($item->amount)</td>

                                            <td>{{ \Carbon\Carbon::parse($item->date)->locale('es')->isoFormat('MMMM[/]YYYY') }}</td>

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

