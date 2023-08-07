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
                            <h4 class="box-title">Estudiantes <strong>Buscar</strong></h4>
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

                                    {{-- Search Box --}}
                                    <div class="col-md-4" style="padding-top: 20px">
                                        <input type="submit" class="btn btn-rounded btn-dark mb-5" name="buscar" value="Buscar">
                                    </div>

                                </div>

                            </form>

                        </div>
                    </div>

                </div>

                {{-- Lista de Usuarios - Main Content --}}
                <div class="col-12">

                    <div class="box">

                        <div class="box-header with-border">
                            <h3 class="box-title">Lista - Estudiantes</h3>
                            {{-- botón agregar usuario --}}
                            <a href="{{ route('student.registration.add') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Agregar Estudiante</a>
                        </div>

                        <!-- /.box-header - table-responsive -->
                        <div class="box-body">
                            <div class="table-responsive">

                                @if (empty($buscar))
                                    {{-- Tabla de Estudiantes por año y clase,tomar por defecto la ultima clase y año registrado  --}}
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">Serie</th>
                                                <th>Nombre</th>
                                                <th>ID</th>
                                                <th>Rol</th>
                                                <th>Año</th>
                                                <th>Clase</th>
                                                <th>Imagen</th>

                                                @if (Auth::user()->role == 'Admin')
                                                    <th>Código</th>
                                                @endif

                                                <th width="25%">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($allData as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>

                                                <td>{{ $item->student->name }}</td>
                                                <td>{{ $item->student->id_no }}</td>
                                                <td>{{ $item->roll }}</td>
                                                <td>{{ $item->student_year->name }}</td>
                                                <td>{{ $item->student_class->name }}</td>
                                                <td>
                                                    <img id="showImage"
                                                        src="{{ (!empty($item->student->image)) ? url('upload/student_images/'.$item->student->image) : url('upload/no_image.jpg') }}"
                                                        alt=""
                                                        style="width:70px; height:70px; border: 1px solid #000000;">
                                                </td>
                                                <td>{{ $item->student->code }}</td>

                                                <td>

                                                    {{-- Botón Editar --}}
                                                    {{-- <a href="{{ route('student.year.edit', $item->id) }}" class="btn btn-info">Editar</a> --}}
                                                    <a href="" class="btn btn-info">Editar</a>

                                                    {{-- Botón Eliminar --}}
                                                    {{-- <a href="{{ route('student.year.delete', $item->id) }}" class="btn btn-danger" id="delete">Eliminar</a> --}}
                                                    <a href="" class="btn btn-danger" id="delete">Eliminar</a>

                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>

                                        <tfoot>

                                        </tfoot>

                                    </table>
                                @else
                                    {{-- Tabla de Estudiantes por año y clase, según parámetros de búsqueda --}}
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">Serie</th>
                                                <th>Nombre</th>
                                                <th>ID</th>
                                                <th>Rol</th>
                                                <th>Año</th>
                                                <th>Clase</th>
                                                <th>Imagen</th>

                                                @if (Auth::user()->role == 'Admin')
                                                    <th>Código</th>
                                                @endif

                                                <th width="25%">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($allData as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>

                                                <td>{{ $item->student->name }}</td>
                                                <td>{{ $item->student->id_no }}</td>
                                                <td>{{ $item->roll }}</td>
                                                <td>{{ $item->student_year->name }}</td>
                                                <td>{{ $item->student_class->name }}</td>
                                                <td>
                                                    <img id="showImage"
                                                        src="{{ (!empty($item->student->image)) ? url('upload/student_images/'.$item->student->image) : url('upload/no_image.jpg') }}"
                                                        alt=""
                                                        style="width:70px; height:70px; border: 1px solid #000000;">
                                                </td>
                                                <td>{{ $item->student->code }}</td>

                                                <td>

                                                    {{-- Botón Editar --}}
                                                    {{-- <a href="{{ route('student.year.edit', $item->id) }}" class="btn btn-info">Editar</a> --}}
                                                    <a href="" class="btn btn-info">Editar</a>

                                                    {{-- Botón Eliminar --}}
                                                    {{-- <a href="{{ route('student.year.delete', $item->id) }}" class="btn btn-danger" id="delete">Eliminar</a> --}}
                                                    <a href="" class="btn btn-danger" id="delete">Eliminar</a>

                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>

                                        <tfoot>

                                        </tfoot>

                                    </table>
                                @endif

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
