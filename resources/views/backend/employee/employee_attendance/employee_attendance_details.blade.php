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

                            <h3 class="box-title">Detalles de Asistencias</h3>

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
                                            <th>Fecha</th>
                                            <th>Estatus</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($allData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            {{-- Nombre --}}
                                            <td>{{ $item->user->name }}</td>

                                            {{-- ID --}}
                                            <td>{{ $item->user->id_no }}</td>

                                            {{-- Formato de fecha (date) en español (dia de la semana, dia mes y año) --}}
                                            {{-- <td>{{ \Carbon\Carbon::parse($item->date)->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</td> --}}
                                            <td>{{ \Carbon\Carbon::parse($item->date)->locale('es')->isoFormat('D[/]MMMM[/]YYYY') }}</td>

                                            {{-- Estatus --}}
                                            @if ($item->attend_status == 'Presente')
                                                <td class="text-success">{{ $item->attend_status }}</td>
                                            @else
                                                @if ($item->attend_status == 'Ausente')
                                                    <td class="text-danger">{{ $item->attend_status }}</td>
                                                @else
                                                    <td class="text-warning">{{ $item->attend_status }}</td>
                                                @endif
                                            @endif

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
