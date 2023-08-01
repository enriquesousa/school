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

                            <h3 class="box-title">Lista - Monto de Cobro</h3>

                            {{-- botón agregar usuario --}}
                            <a href="{{ route('fee.amount.add') }}" class="btn btn-rounded btn-success mb-5"
                                style="float: right;">Agregar Monto de Cobro</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">Serie</th>
                                            <th>Categoría de Cobro</th>
                                            <th width="25%">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($allData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td> {{ $item['fee_category']['name'] }}</td>
                                            <td>

                                                {{-- Botón Editar por Grupo con $item->fee_category_id --}}
                                                <a href="{{ route('fee.amount.edit',$item->fee_category_id) }}" class="btn btn-info">Edit</a>

                                                {{-- Botón Eliminar --}}
                                                {{-- <a href="{{ route('fee.category.delete', $item->id) }}" class="btn btn-danger" id="delete">Eliminar</a> --}}
                                                <a href="" class="btn btn-danger" id="delete">Eliminar</a>

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
