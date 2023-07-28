<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>Administración de Escuelas - Panel</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">

    {{-- Toaster cdn --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

        {{-- header --}}
        @include('admin.body.header')

        {{-- Left side column. contains the logo and sidebar --}}
        @include('admin.body.sidebar')


        <!-- Content Wrapper. Contains page content -->
        @yield('admin')


        {{-- footer --}}
        @include('admin.body.footer')


        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->


    <!-- Vendor JS -->
    <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('backend/assets/icons/feather-icons/feather.min.js') }}"></script>

    <script src="{{ asset('backend/assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
	<script src="{{ asset('backend/assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
	<script src="{{ asset('backend/assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>

    <script src="{{ asset('backend/assets/vendor_plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
	<script src="{{ asset('backend/assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

    <script src="{{ asset('backend/assets/vendor_components/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('backend/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('backend/assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('backend/assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
	<script src="{{ asset('backend/assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
	<script src="{{ asset('backend/assets/vendor_plugins/iCheck/icheck.min.js') }}"></script>

    <script src="{{ asset('backend/js/pages/advanced-form-element.js') }}"></script>


    <script src="{{ asset('backend/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>

    {{-- Para poder manejar las tablas, colocarlo antes de  Sunny Admin App --}}
    <script src="{{ asset('backend/assets/vendor_components/datatable/datatables.min.js') }}"></script>
	<script src="{{ asset('backend/js/pages/data-table.js') }}"></script>



    {{-- Plugin sweetalert2 para el botón de Delete, cdn en https://sweetalert2.github.io/v10.html --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
    $(function () {
        $(document).on("click", "#delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");

            Swal.fire({
                title: "Estas seguro?",
                text: "Que deseas eliminar este registro?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, Eliminarlo!",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire("Eliminado!", "El registro fue eliminado.", "success");
                }
            });

        });
    });
    </script>

    {{-- Toaster cdn --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- Toaster script --}}
    <script>
        @if(Session::has('message'))
                var type = "{{ Session::get('alert-type','info') }}"
                    switch(type){
                    case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                    case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                    case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                    case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
                }
            @endif
    </script>

    <!-- Sunny Admin App -->
    <script src="{{ asset('backend/js/template.js') }}"></script>
    <script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>

</body>

</html>
