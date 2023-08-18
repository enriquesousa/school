@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Incrementar Salario - Empleado</h4>
                    <h6 class="box-subtitle">Para incrementar el Salario en la <a class="text-warning" href="#">base de datos</a></h6>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('update.increment.store', $editData->id) }}">
                                @csrf

                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">

                                            <div class="col-md-6">
                                                {{-- increment_salary --}}
                                                <div class="form-group">
                                                    <h5>Incremento de Salario<span class="text-danger">*</span></h5>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></div>
                                                        <input type="number" name="increment_salary" class="form-control" required autofocus>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                {{-- effected_salary --}}
                                                <div class="form-group">
                                                    <h5>Fecha<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="effected_salary" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Actualizar">
                                </div>

                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box-body -->

        </section>

    </div>
</div>
<!-- /.content-wrapper -->
@endsection
