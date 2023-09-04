<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>


    <table id="customers">

        <tr>

            {{-- Logo --}}
            <td>
                <h2>
                    <?php $image_path = '/upload/easyschool.png'; ?>
                    <img src="{{ public_path() . $image_path }}" width="160" height="80">
                </h2>
            </td>

            {{-- Titulo, Dirección y Teléfono Etc... --}}
            <td>

                <h3 align="right">Escuela Fácil EsWeb</h3>
                <p style="font-size: 12px;" align="right">
                    CARR TAMPICO-MANTE KM 10.5 S/N<br>
                    AEROPUERTO INTERNACIONAL, 89339<br>
                    (664) 333-1111<br>
                    soporte@escuelafacil.com<br>
                    <b>Ganancias Por Mes y Año</b>
                </p>


            </td>

        </tr>

    </table>

    @php
        $student_fee = App\Models\AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');
        $other_cost = App\Models\AccountOtherCost::whereBetween('date',[$sdate,$edate])->sum('amount');
        $employee_salary = App\Models\AccountEmployeeSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');

        $total_cost = $other_cost + $employee_salary;
        $profit = $student_fee - $total_cost;
    @endphp

    <table id="customers">

        {{-- Encabezados de la tabla --}}
        <tr>
            <td colspan="2" style="text-align: center">

                <p style="font-size: 12px;">
                    <b style="font-size: 16px;">Reporte Ganancias Por Mes y Año</b><br>
                    <b style="font-size: 12px;">Rango de Fechas: </b>
                    <span>{{ \Carbon\Carbon::parse($sdate)->locale('es')->isoFormat('DD[/]MMMM[/]YYYY')  }} - {{ \Carbon\Carbon::parse($edate)->locale('es')->isoFormat('DD[/]MMMM[/]YYYY')  }}</span>
                </p>

            </td>
        </tr>

        {{-- Datos --}}
        <tr>
            <td width="50%"><h4>Motivo</h4></td>
            <td width="50%"><h4>Cantidad</h4></td>
        </tr>

        <tr>
            <td style="font-size: 10px; font-weight: bold; font-italic"><i>Entradas</i></td>
            <td></td>
        </tr>

        <tr>
            <td>Cargos Estudiantes</td>
            <td style="font-weight: bold;">$ @convert($student_fee)</td>
        </tr>

        <tr>
            <td style="font-size: 10px; font-weight: bold; font-italic"><i>Salidas</i></td>
            <td></td>
        </tr>

        <tr>
            <td>Sueldos Empleados</td>
            <td>$ @convert($employee_salary)</td>
        </tr>

        <tr>
            <td>Otros Gastos</td>
            <td>$ @convert($other_cost)</td>

        </tr>

        <tr>
            <td>Total de Gatos</td>
            <td style="font-weight: bold;">$ @convert($total_cost)</td>
        </tr>

        <tr>
            <td style="font-size: 10px; font-weight: bold; font-italic"><i>Ganancias</i></td>
            <td></td>
        </tr>

        <tr>
            <td>Ganancias</td>
            <td style="font-weight: bold;">$ @convert($profit)</td>
        </tr>

    </table>

    <br>
    <i style="font-size: 10px; float: right;">Fecha: {{ \Carbon\Carbon::parse(date("d M Y"))->locale('es')->isoFormat('DD[/]MMMM[/]YYYY')  }}</i>

    <br><br>
    <hr style="border: dashed 2px; width: 95%; color: #0f990a; margin-bottom: 30px;">


</body>

</html>
