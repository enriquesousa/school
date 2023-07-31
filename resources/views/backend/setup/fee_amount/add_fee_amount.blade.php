@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Agregar Monto de Cobro</h4>
                    <h6 class="box-subtitle">Para agregar Monto de Cobro a estudiante en la <a class="text-warning"
                            href="#">base
                            de datos </a>
                    </h6>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('store.fee.category') }}">
                                @csrf

                                {{-- Select - Categoría de Cobro --}}
                                <div class="form-group">
                                    <h5>Categoría de Cobro <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="fee_category_id" required="" class="form-control">
                                            <option value="" selected="" disabled="">Seleccionar Categoría</option>
                                            @foreach ($fee_categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-5">

                                                {{-- Select - Clases --}}
                                                <div class="form-group">
                                                    <h5>Clases <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        {{-- class_id lo pasamos como array porque va a poder tener multiples valores --}}
                                                        <select name="class_id[]" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Seleccionar Clase</option>
                                                            @foreach ($classes as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-5">

                                                {{-- Monto --}}
                                                <div class="form-group">
                                                    <h5>Monto <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        {{-- amount lo pasamos como array porque va a poder tener multiples valores --}}
                                                        <input type="text" name="amount[]" class="form-control">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-2" style="padding-top: 25px;">

                                                <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>

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
