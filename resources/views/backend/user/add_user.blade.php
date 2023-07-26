@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Agregar Usuario</h4>
                    <h6 class="box-subtitle">Para agregar un usuarios a la <a class="text-warning" href="#">base de datos </a></h6>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form novalidate="">

                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">

                                            <div class="col-md-6">

                                                {{-- Basic Select --}}
                                                <div class="form-group">
                                                    <h5>Rol de Usuario <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="usertype" id="select" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Seleccionar Rol</option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="User">User</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                {{-- Basic Text Input --}}
                                                <div class="form-group">
                                                    <h5>Nombre <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <input type="text" name="name" class="form-control" required="">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">

                                                {{-- Correo Electrónico --}}
                                                <div class="form-group">
                                                    <h5>Correo Electrónico <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <input type="email" name="email" class="form-control" required="">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                 {{-- Contraseña --}}
                                                 <div class="form-group">
                                                    <h5>Contraseña <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <input type="password" name="password" class="form-control" required="">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>


                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Enviar">
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
