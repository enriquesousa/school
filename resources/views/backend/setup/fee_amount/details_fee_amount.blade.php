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

                            <h3 class="box-title">Detalles - Monto de Cobro</h3>

                            {{-- botón agregar usuario --}}
                            <a href="{{ route('fee.amount.add') }}" class="btn btn-rounded btn-success mb-5"
                                style="float: right;">Agregar Monto de Cobro</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <h4><strong>Categoría de cobro: </strong>{{ $detailsData[0]->fee_category->name }}</h4>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="5%">Serie</th>
                                            <th>Nombre de Clase</th>
                                            <th width="25%">Monto</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($detailsData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td> {{ $item->student_class->name }}</td>
                                            <td> {{ $item->amount }}</td>
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
