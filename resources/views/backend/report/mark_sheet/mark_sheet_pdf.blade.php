@extends('admin.admin_master')
@section('admin')

{{-- lo baje de: https://www.w3schools.com/jquery/jquery_get_started.asp --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                {{-- Color Card --}}
                <div class="col-12">

                    <div class="box bb-3 border-warning">

                        <div class="box-header">
                            <h4 class="box-title">Calificaciones Estudiante <strong>Reporte PDF</strong></h4>
                            <h6 class="box-subtitle">Reporte para <a href="" class="text-warning">Estudiante</a></h6>
                        </div>

                        <div class="box-body" style="border: solid 1px; padding: 10px;">

                            <!-- Row 1 - Encabezado-->
                            <div class="row">

                                <div style="float: right" class="col-md-2 text-center">
                                    <img src="{{ url('upload/easyschool.png') }}" style="width: 120px; height: 100px">
                                </div>

                                <div class="col-md-2 text-center">

                                </div>

                                <div class="col-md-4 text-center" style="float: left;">
                                    <h4><strong>Escuela Fácil</strong></h4>
                                    <h6><strong>Tijuana BC</strong></h6>
                                    <h5><strong><i>Reporte de Calificaciones</i></strong></h5>
                                    <h6><strong>{{ $allMarks['0']['exam_type']['name'] }}</strong></h6>
                                </div>

                                <div class="col-md-12">
                                    <hr style="border: solid 1px; width: 100%; Color: #ddd; margin-bottom: 0px">
                                    <p style="text-align: right;"><u><i>Fecha de Impresión: </i>{{ date('d-m-Y') }}</u></p>
                                </div>

                            </div>

                            <!-- Row 2 - Contenido Tabla -->
                            <div class="row">

                                <div class="col-md-6">
                                    
                                    <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="8" cellspacing="2">
    
                                        @php
                                            $assign_student = App\Models\AssignStudent::where('year_id',$allMarks['0']->year_id)->where('class_id',$allMarks['0']->class_id)->first();
                                        @endphp
    
                                        <tr>
                                            <td width="50%">ID Estudiante</td>
                                            <td width="50%">{{ $allMarks['0']['id_no'] }}</td>
                                        </tr>
    
                                        <tr>
                                            <td width="50%">Rol</td>
                                            <td width="50%">{{ $assign_student->roll }}</td>
                                        </tr>
    
                                        <tr>
                                            <td width="50%">Nombre</td>
                                            <td width="50%">{{ $allMarks['0']['student']['name'] }}</td>
                                        </tr>
    
                                        <tr>
                                            <td width="50%">Clase</td>
                                            <td width="50%">{{ $allMarks['0']['student_class']['name'] }}</td>
                                        </tr>
    
                                        <tr>
                                            <td width="50%">Sesión - Año</td>
                                            <td width="50%">{{ $allMarks['0']['year']['name'] }}</td>
                                        </tr>
    
                                    </table>

                                </div>
                                
                                <div class="col-md-6">

                                    <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="8" cellspacing="2">

                                        <thead>
                                            <tr>
                                                <th>Grado Letra</th>
                                                <th>Intervalo</th>
                                                <th>Puntos Calificación</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($allGrades as $mark)
                                                <tr>
                                                    <td>{{ $mark->grade_name }}</td>
                                                    <td>{{ $mark->start_marks }} - {{ $mark->end_marks }}</td>
                                                    <td>{{ number_format((float)$mark->grade_point,2) }} - {{ ($mark->grade_point == 5)?(number_format((float)$mark->grade_point,2)):(number_format((float)$mark->grade_point+1,2) - (float)0.01) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
    
                                        
    
                                    </table>

                                </div>

                            </div>

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
