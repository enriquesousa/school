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

                {{-- Color Card - Estudiante - Forma para la Búsqueda --}}
                <div class="col-12">

                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Estudiantes <strong>Cargos por Registro</strong></h4>
                        </div>

                        <div class="box-body">


                            {{-- Row 1, Select Año y Select Clase --}}
                            <div class="row">

                                {{-- Select Año --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Año&nbsp;<span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <select name="year_id" id="year_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Seleccionar Año</option>
                                                @foreach ($years as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                            <select name="class_id" id="class_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Seleccionar Clase</option>
                                                @foreach ($classes as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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


                            {{-- ************ --}}
                            {{-- Tabla con JS --}}
                            {{-- ************ --}}

                            {{-- Tabla con JS de Roles generados para la Búsqueda, d-none: clase para que no se despliegue el div  --}}
                            <div class="row">
                                <div class="col-md-12">

                                    {{-- Ahora vamos a usar handlebarsjs para desplegar la tabla --}}
                                    <div class="DocumentResults">
                                        <script id="document-template" type="text/x-handlebars-template">
                                            <table class="table table-bordered table-striped" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        @{{{thsource}}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @{{#each this}}
                                                    <tr>
                                                        @{{{tdsource}}}
                                                    </tr>
                                                    @{{/each}}
                                                </tbody>
                                            </table>
                                        </script>
                                    </div>

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


{{-- JS para desplegar el div rol generado --}}
<script type="text/javascript">

    $(document).on('click','#search',function(){
      var year_id = $('#year_id').val();
      var class_id = $('#class_id').val();
       $.ajax({
        url: "{{ route('student.registration.getstudents')}}",
        type: "GET",
        data: {'year_id':year_id,'class_id':class_id},
        success: function (data) {
          $('#roll-generate').removeClass('d-none');
          var html = '';
          $.each( data, function(key, v){
            html +=
            '<tr>'+
            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
            '<td>'+v.student.name+'</td>'+
            '<td>'+v.student.fname+'</td>'+
            '<td>'+v.student.gender+'</td>'+
            '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"></td>'+
            '</tr>';
          });
          html = $('#roll-generate-tr').html(html);
        }
      });
    });

</script>



@endsection
