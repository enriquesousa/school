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
                            <h4 class="box-title">Estudiantes <strong>Entrar Calificaciones</strong></h4>
                        </div>

                        <div class="box-body">

                            <form method="POST"" action="{{ route('marks.entry.store') }}">
                            @csrf

                                {{-- Row 1 --}}
                                <div class="row">

                                    {{-- Select Año --}}
                                    <div class="col-md-3">
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
                                    <div class="col-md-3">
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

                                    {{-- Select Materia --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Materia&nbsp;<span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <select name="assign_subject_id" id="assign_subject_id" required="" class="form-control">
                                                    <option selected="">Seleccionar Materia</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Select Tipo de Examen --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Tipo de Examen&nbsp;<span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <select name="exam_type_id" id="exam_type_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Seleccionar Clase</option>
                                                    @foreach ($exam_types as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Search Box, ahora lo va a manejar JS --}}
                                    <div class="col-md-3 mb-3">
                                        <a id="search" name="search" class="btn btn-primary">Buscar</a>
                                    </div>

                                </div>



                                {{-- Tabla con JS para Calificaciones, d-none: clase para que no se despliegue el div  --}}
                                <div class="row d-none" id="marks-entry">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre Estudiante</th>
                                                    <th>Nombre del Padre</th>
                                                    <th>Sexo</th>
                                                    <th>Calificación</th>
                                                </tr>
                                            </thead>
                                            <tbody id="marks-entry-tr">

                                            </tbody>
                                        </table>
                                        <input type="submit" class="btn btn-rounded btn-primary" value="Guardar">
                                    </div>
                                </div>


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


{{-- JS para desplegar el div generado por este JS--}}
<script type="text/javascript">

    $(document).on('click','#search',function(){
      var year_id = $('#year_id').val();
      var class_id = $('#class_id').val();
      var assign_subject_id = $('#assign_subject_id').val();
      var exam_type_id = $('#exam_type_id').val();
       $.ajax({
        url: "{{ route('student.marks.getstudents')}}",
        type: "GET",
        data: {'year_id':year_id,'class_id':class_id},
        success: function (data) {
          $('#marks-entry').removeClass('d-none');
          var html = '';
          $.each( data, function(key, v){
            html +=
            '<tr>'+
            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> <input type="hidden" name="id_no[]" value="'+v.student.id_no+'"> </td>'+
            '<td>'+v.student.name+'</td>'+
            '<td>'+v.student.fname+'</td>'+
            '<td>'+v.student.gender+'</td>'+
            '<td><input type="text" class="form-control form-control-sm" name="marks[]"></td>'+
            '</tr>';
          });
          html = $('#marks-entry-tr').html(html);
        }
      });
    });

</script>

<!-- JS para obtener las materias de la clase seleccionada  -->
<script type="text/javascript">
    $(function(){
      $(document).on('change','#class_id',function(){
        var class_id = $('#class_id').val();
        $.ajax({
          url:"{{ route('marks.getsubject') }}",
          type:"GET",
          data:{class_id:class_id},
          success:function(data){
            var html = '<option value="">Seleccionar Materia</option>';
            $.each( data, function(key, v) {
              html += '<option value="'+v.id+'">'+v.school_subject.name+'</option>';
            });
            $('#assign_subject_id').html(html);
          }
        });
      });
    });
</script>


@endsection
