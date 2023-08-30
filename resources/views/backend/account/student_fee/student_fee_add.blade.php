@extends('admin.admin_master')
@section('admin')

{{-- lo baje de: https://www.w3schools.com/jquery/jquery_get_started.asp --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

{{-- Para handlebars --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>


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
                            <h4 class="box-title">Agregar <strong>Cargo a Estudiantes</strong></h4>
                        </div>

                        <div class="box-body">

                            {{-- Row 1 --}}
                            <div class="row">

                                {{-- Select Año --}}
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Año&nbsp;<span class="text-danger">*</span></h5>
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
                                        <h5>Clase&nbsp;<span class="text-danger">*</span></h5>
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

                                {{-- Select Categoría de Cargo --}}
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Categoría de Cargo&nbsp;<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="fee_category_id" id="fee_category_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Categoría de Cargo</option>
                                                @foreach ($fee_categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{-- Fecha --}}
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Fecha (Mes)&nbsp;&nbsp;<span class="text-danger">*</span></h5>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                            <input type="date" name="date" id="date" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                {{-- Search Box, ahora lo va a manejar JS --}}
                                <div class="col-md-3 mb-3">
                                    <a id="refrescar" class="btn btn-secondary" name="refrescar" title="Refrescar Pagina"><i class="fa fa-superpowers" aria-hidden="true"></i></a>
                                    <a id="search" name="search" class="btn btn-primary">Buscar</a>
                                </div>

                            </div>


                            {{-- Tabla con Handlebars  --}}
                            <div class="row">
                                <div class="col-md-12">

                                    <div id="DocumentResults">
                                        <script id="document-template" type="text/x-handlebars-template">

                                            <form action="{{ route('account.fee.store') }}" method="post">
                                            @csrf

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

                                                <button type="submit" class="btn btn-primary" style="margin-top: 10px">Guardar</button>

                                            </form>

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


{{-- Script para desplegar tabla con handlebars --}}
<script type="text/javascript">

    $(document).on('click', '#search', function () {

        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var fee_category_id = $('#fee_category_id').val();
        var date = $('#date').val();

        $.ajax({
            url: "{{ route('account.fee.get.student')}}",
            type: "get",
            data: {
                'year_id': year_id,
                'class_id': class_id,
                'fee_category_id': fee_category_id,
                'date': date
            },
            beforeSend: function () {},
            success: function (data) {
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html = template(data);
                $('#DocumentResults').html(html);
                $('[data-toggle="tooltip"]').tooltip();
            }
        });

    });


    $(document).on('click', '#refrescar', function () {
        // reload page keeping the POST data
        window.location.reload();
    });

</script>


@endsection
