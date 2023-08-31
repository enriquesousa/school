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

                            <h3 class="box-title">Lista - Sueldos Empleados </h3>

                            {{-- botón agregar designación --}}
                            <a href="{{ route('account.salary.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Agregar / Editar Sueldos Empleados</a>

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
                                            <th>Salario</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($allData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->user->id_no }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>$ @convert($item->amount)</td>
                                            <td>{{ \Carbon\Carbon::parse($item->date)->locale('es')->isoFormat('MMMM[/]YYYY') }}</td>
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

