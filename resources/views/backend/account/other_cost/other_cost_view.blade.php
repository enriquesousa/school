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

                            <h3 class="box-title">Lista - Otros Costos </h3>

                            {{-- botón agregar designación --}}
                            <a href="{{ route('account.salary.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Agregar Otros Costos</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">Serie</th>
                                            <th>Fecha</th>
                                            <th>Cantidad</th>
                                            <th>Descripción</th>
                                            <th>Imagen</th>
                                            <th width="20%">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($allData as $key => $item)
                                        <tr>
                                            {{-- Serie --}}
                                            <td>{{ $key + 1 }}</td>

                                            {{-- Fecha --}}
                                            <td>{{ \Carbon\Carbon::parse($item->date)->locale('es')->isoFormat('DD[/]MMMM[/]YYYY') }}</td>

                                            {{-- Cantidad --}}
                                            <td>$ @convert($item->amount)</td>

                                            {{-- Descripción --}}
                                            <td>{{ $item->description }}</td>

                                            {{-- Imagen --}}
                                            <td>
                                                <img src="{{ (!empty($item->image)) ? url('upload/cost_images/'.$item->image) : url('upload/no_image.jpg') }}" style="width: 100px; height: 100px;">
                                            </td>

                                            {{-- Acción --}}
                                            <td>
                                                <a href="{{ route('', $item->id) }}" class="btn btn-rounded btn-info mb-5">Editar</a>
                                                <a href="{{ route('', $item->id) }}" class="btn btn-rounded btn-danger mb-5">Eliminar</a>
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

