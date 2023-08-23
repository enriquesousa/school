@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Editar Asistencias</h4>
                    <h6 class="box-subtitle">Para editar asistencias en la <a class="text-warning" href="#">base de datos</a></h6>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('store.employee.attendance') }}">
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-12">

                                        {{-- Fecha de Ausencia --}}
                                        <div class="row">

                                            {{-- col-md-6 --}}
                                            <div class="col-md-6">

                                                {{-- Fecha Asistencia --}}
                                                <div class="form-group">
                                                    <h5>Fecha Asistencia<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="date" class="form-control" value="{{ $editData['0']['date'] }}" required>
                                                    </div>
                                                </div>

                                            </div>

                                            {{-- col-md-6 --}}
                                            <div class="col-md-6">

                                            </div>

                                        </div>

                                        {{-- Tabla/Lista de Empleados --}}
                                        <div class="row">

                                            {{-- col-md-12 --}}
                                            <div class="col-md-12">

                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2" class="text-center" style="vertical-align: middle;">Serie</th>
                                                            <th rowspan="2" class="text-center" style="vertical-align: middle;">Lista Empleados</th>
                                                            <th colspan="3" class="text-center" style="vertical-align: middle; width: 30%">Estatus</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center btn present_all" style="display: table-cell; background-color: #000000">Presente</th>
                                                            <th class="text-center btn leave_all" style="display: table-cell; background-color: #000000">Permiso</th>
                                                            <th class="text-center btn absent_all" style="display: table-cell; background-color: #000000">Ausente</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($editData as $key => $item)
                                                        <tr id="div{{ $item->id }}" class="text-center">
                                                            <input type="hidden" name="employee_id[]" value="{{ $item->employee_id }}">
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $item->user->name }}</td>
                                                            <td colspan="3">
                                                                <div class="switch-toggle switch-3 switch-candy">
                                                                    <input name="attend_status{{ $key }}" type="radio" value="Presente" id="present{{ $key }}" {{ $item->attend_status == 'Presente' ? 'checked' : '' }}>
                                                                    <label for="present{{ $key }}">Presente</label>

                                                                    <input name="attend_status{{ $key }}" type="radio" value="Permiso" id="leave{{ $key }}" {{ $item->attend_status == 'Permiso' ? 'checked' : '' }}>
                                                                    <label for="leave{{ $key }}">Permiso</label>

                                                                    <input name="attend_status{{ $key }}" type="radio" value="Ausente" id="absent{{ $key }}" {{ $item->attend_status == 'Ausente' ? 'checked' : '' }}>
                                                                    <label for="absent{{ $key }}">Ausente</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Actualizar">
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
