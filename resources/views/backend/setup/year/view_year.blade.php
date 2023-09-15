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

                            {{-- titulo --}}
                            <h3 class="box-title">Configuración - Periodos Escolares</h3>
                            <h6 class="box-subtitle">Para agregar los <a class="text-warning" href="#">periodos escolares </a> Ejemplo pueden ser: por bimestre, trimestre, semestre o anual.
                            </h6>

                            {{-- botón agregar usuario --}}
                            <a href="{{ route('student.year.add') }}" class="btn btn-rounded btn-success mb-5"
                                style="float: right;">Agregar Periodo</a>

                        </div>
                            
                        <div class="box-header with-border">
                            <h4 class="box-subtitle">Lista de Periodos Capturados</h4>
                        </div>


                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">Serie</th>
                                            <th>Nombre</th>
                                            <th width="25%">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($allData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>

                                                {{-- Botón Editar --}}
                                                <a href="{{ route('student.year.edit', $item->id) }}"
                                                    class="btn btn-info">Editar</a>

                                                {{-- Botón Eliminar --}}
                                                <a href="{{ route('student.year.delete', $item->id) }}" class="btn btn-danger"
                                                    id="delete">Eliminar</a>

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
