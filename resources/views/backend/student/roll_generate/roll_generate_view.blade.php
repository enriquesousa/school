@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                {{-- Color Card - Estudiante - Forma para la Búsqueda --}}
                <div class="col-12">

                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Estudiantes <strong>Generador de Rol</strong></h4>
                        </div>

                        <div class="box-body">

                            <form method="GET" action="{{ route('student.year.class.wise') }}">

                                {{-- Row 1 --}}
                                <div class="row">

                                    {{-- Select Año --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Año&nbsp;<span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <select name="year_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Seleccionar Año</option>
                                                    @foreach ($years as $item)
                                                        <option value="{{ $item->id }}" {{ (@$year_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Select Clase --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Clase&nbsp;<span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <select name="class_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Seleccionar Clase</option>
                                                    @foreach ($classes as $item)
                                                        <option value="{{ $item->id }}" {{ (@$class_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Search Box, ahora lo va a manejar JS --}}
                                    <div class="col-md-4" style="padding-top: 20px">
                                        <a id="search" name="search" class="btn btn-primary">Buscar</a>
                                    </div>

                                </div>



                                {{-- Tabla con JS de Roles generados para la Búsqueda --}}





                            </form>

                        </div>
                    </div>

                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>
<!-- /.content-wrapper -->
@endsection
