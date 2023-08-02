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

                            <h3 class="box-title">Lista - Asignación de Materias</h3>

                            {{-- botón agregar usuario --}}
                            <a href="{{ route('assign.subject.add') }}" class="btn btn-rounded btn-success mb-5"
                                style="float: right;">Agregar Asignar Materias</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">Serie</th>
                                            <th>Nombre Clase</th>
                                            <th width="25%">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($allData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td> {{ $item->student_class->name }}</td>
                                            <td>

                                                {{-- Botón Editar por Grupo con $item->fee_category_id --}}
                                                {{-- <a href="{{ route('fee.amount.edit',$item->fee_category_id) }}" class="btn btn-info">Edit</a> --}}
                                                <a href="" class="btn btn-info">Edit</a>

                                                {{-- Botón Eliminar --}}
                                                {{-- <a href="{{ route('fee.amount.details', $item->fee_category_id) }}" class="btn btn-primary">Detalles</a> --}}
                                                <a href="" class="btn btn-primary">Detalles</a>

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
