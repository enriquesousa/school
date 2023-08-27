@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Agregar Grado a Estudiantes</h4>
                    <h6 class="box-subtitle">Para agregar Grado y Calificaciones Finales a Estudiantes en la <a class="text-warning"
                            href="#">base de datos </a>
                    </h6>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('store.marks.grade') }}">
                            @csrf

                                <div class="row">
                                    <div class="col-12">

                                        {{-- Row 1 - grade_name, grade_point --}}
                                        <div class="row">

                                            {{-- grade_name , value="{{ old('grade_name') }}" para no perder data al regresar de un Validation error--}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Nombre Grado<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="grade_name" class="form-control" value="{{ old('grade_name') }}" required autofocus>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- grade_point --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Puntos Grado<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="grade_point" class="form-control" value="{{ old('grade_point') }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        {{-- Row 2 - start_marks, end_marks, start_point, end_point --}}
                                        <div class="row">

                                              {{-- start_marks --}}
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Calificación Inicial<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="start_marks" class="form-control" value="{{ old('start_marks') }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- end_marks --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Calificación Final<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="end_marks" class="form-control" value="{{ old('end_marks') }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- start_point --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Puntos Iniciales<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="start_point" class="form-control" value="{{ old('start_point') }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- end_point --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Puntos Finales<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="end_point" class="form-control" value="{{ old('end_point') }}" required>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                         {{-- Row 3 - remarks --}}
                                         <div class="row">

                                            {{-- remarks --}}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Comentarios<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="remarks" class="form-control" value="{{ old('remarks') }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                         </div>


                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Guardar">
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
