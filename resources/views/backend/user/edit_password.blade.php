@extends('admin.admin_master')
@section('admin')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Cambiar Contraseña</h4>
                    <h6 class="box-subtitle">Para cambiar contraseña del usuario en la <a class="text-warning"
                            href="#">base de datos </a>
                    </h6>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('profile.update.password') }}">
                            @csrf

                                <div class="row">
                                    <div class="col-12">

                                        {{-- Contraseña Anterior --}}
                                        <div class="form-group">
                                            <h5>Contraseña Actual <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="old_password" id="current_password" class="form-control">
                                                @error('old_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Contraseña Nueva --}}
                                        <div class="form-group">
                                            <h5>Contraseña Nueva <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="password" id="password" class="form-control">
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Confirmar Contraseña --}}
                                        <div class="form-group">
                                            <h5>Confirmar Contraseña <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                                @error('password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
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
