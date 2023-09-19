@extends('admin.admin_master')
@section('admin')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">

                <<div class="box-header with-border">
                    <h4 class="box-title">Editar Periodo de Clases</h4>
                    <h6 class="box-subtitle">Para Editar un periodo de clases en la 
                        <a class="text-warning" href="#">base de datos </a>
                        Ejemplos: Trimestre 1 - (1/ENE/23 a 31/MAR/23), etc..
                    </h6>

                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('update.student.year', $editData->id) }}">
                            @csrf

                                <div class="row">
                                    <div class="col-12">

                                        {{-- Editar Año Periodo --}}
                                        <div class="form-group">
                                            <h5>Edite Periodo <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" value="{{ $editData->name }}" autofocus>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
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
