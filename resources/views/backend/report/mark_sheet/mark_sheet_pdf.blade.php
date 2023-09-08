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

                            <!-- Row 1 -->
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
