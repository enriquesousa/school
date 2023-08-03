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

                            <h3 class="box-title">Detalles - Asignación de Materias</h3>

                            {{-- botón agregar usuario --}}
                            <a href="{{ route('assign.subject.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Agregar Asignar Materias</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <h4><strong>Materias asignadas para la clase: </strong>{{ $detailsData[0]->student_class->name }}</h4>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="5%">Serie</th>
                                            <th width="20%">Materia / Asignatura</th>
                                            <th width="15%">Evaluación Total</th>
                                            <th width="15%">Evaluación Aprobatoria</th>
                                            <th width="15%">Evaluación Subjetiva</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($detailsData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td> {{ $item->school_subject->name }}</td>
                                            <td> {{ $item->full_mark }}</td>
                                            <td> {{ $item->pass_mark }}</td>
                                            <td> {{ $item->subjective_mark }}</td>
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
