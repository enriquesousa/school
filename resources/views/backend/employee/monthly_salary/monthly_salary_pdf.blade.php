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
                    <b>Sueldo Mensual</b>
                </p>


            </td>

        </tr>

    </table>

    @php

        $date = date('Y-m',strtotime($details['0']->date));
        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }
        $totalAsistencias = App\Models\EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$details['0']->employee_id)->get();

        $salary = (float)$details['0']['user']['salary'];
        $salaryPerDay = (float)$salary/30;
        $absentCount = count($totalAsistencias->where('attend_status','Ausente'));
        $totalSalaryMinus = (float)$absentCount*(float)$salaryPerDay;
        $totalSalary = (float)$salary - (float)$totalSalaryMinus;


    @endphp

    <table id="customers">

        {{-- Encabezados de la tabla --}}
        <tr>
            <th width="10%">Serie</th>
            <th width="45%">Detalles</th>
            <th width="45%">Datos del Empleado</th>
        </tr>

        {{-- Datos --}}
        <tr>
            <td>1</td>
            <td><b>Nombre Empleado</b></td>
            <td>{{ $details['0']['user']['name'] }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>Sueldo Base</b></td>
            <td>$ @convert($details['0']['user']['salary'])</td>
        </tr>
        <tr>
            <td>3</td>
            <td><b>Dias Ausentes este Mes</b></td>
            <td>{{ $absentCount }}</td>
        </tr>
        <tr>
            <td>4</td>
            <td><b>Mes</b></td>
            <td>{{ \Carbon\Carbon::parse($details['0']->date)->locale('es')->isoFormat('MMMM[/]YYYY') }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>Sueldo este Mes</b></td>
            <td>$ @convert($totalSalary)</td>
        </tr>

    </table>

    {{-- <br> --}}
    <i style="font-size: 10px; float: right;">Fecha: {{ date("d M Y") }}</i>

    {{-- ***************************** COPIA PARA EMPLEADO ***************************** --}}
    <div>
        <p style="color: green; font-size: 10px; text-align: center">Copia para Empleado</p>
    </div>
    <hr style="border: dashed 2px; width: 95%; color: #0f990a; margin-bottom: 30px;">

    <table id="customers">

        {{-- Encabezados de la tabla --}}
        <tr>
            <th width="10%">Serie</th>
            <th width="45%">Detalles</th>
            <th width="45%">Datos del Empleado</th>
        </tr>

        {{-- Datos --}}
        <tr>
            <td>1</td>
            <td><b>Nombre Empleado</b></td>
            <td>{{ $details['0']['user']['name'] }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>Sueldo Base</b></td>
            <td>$ @convert($details['0']['user']['salary'])</td>
        </tr>
        <tr>
            <td>3</td>
            <td><b>Dias Ausentes este Mes</b></td>
            <td>{{ $absentCount }}</td>
        </tr>
        <tr>
            <td>4</td>
            <td><b>Mes</b></td>
            <td>{{ \Carbon\Carbon::parse($details['0']->date)->locale('es')->isoFormat('MMMM[/]YYYY') }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>Sueldo este Mes</b></td>
            <td>$ @convert($totalSalary)</td>
        </tr>

    </table>


    <i style="font-size: 10px; float: right;">Fecha: {{ date("d M Y") }}</i>

</body>

</html>
