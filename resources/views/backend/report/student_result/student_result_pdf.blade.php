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

    {{-- Logo, Titulo Dirección y Teléfono --}}
    <table id="customers">
        <tr>
            {{-- Logo --}}
            <td>
                <h2>
                    <?php $image_path = '/upload/easyschool.png'; ?>
                    <img src="{{ public_path() . $image_path }}" width="150" height="150">
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
                    <b>Reporte de Resultados Estudiantes</b>
                </p>
            </td>
        </tr>
    </table>

    <br>
    <br>
    <strong>Tipo de Examen: </strong>{{ $allData[0]->exam_type->name }}
    {{-- <strong>Nombre Empleado: </strong>{{ $allData[0]->user->name }},
    <strong>Mes: </strong>{{ \Carbon\Carbon::parse($fecha)->locale('es')->isoFormat('MMMM[/]YYYY') }}<br> --}}
    <br>

    <table id="customers">

        {{-- Datos Encabezado --}}
        <tr>
            <td width="50%"><h4>Año Escolar</h4>{{ $allData[0]->year->name }}</td>
            <td width="50%"><h4>Clase</h4>{{ $allData[0]->student_class->name }}</td>
        </tr>

        

    </table>


    <br>
    <i style="font-size: 10px; float: right;">Fecha: {{ date("d M Y") }}</i>
    <br>
    <hr style="border: dashed 2px; width: 95%; color: #0f990a; margin-bottom: 30px;">

</body>

</html>
