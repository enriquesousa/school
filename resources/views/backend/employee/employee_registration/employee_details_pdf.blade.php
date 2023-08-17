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

            <td>
                <h2>
                    <?php $image_path = '/upload/easyschool.png'; ?>
                    <img src="{{ public_path() . $image_path }}" width="200" height="100">
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
                    <b>Registro de Empleado</b>
                </p>
            </td>

        </tr>

    </table>


    <table id="customers">

        {{-- table header --}}
        <tr>
            <th width="10%">Serie</th>
            <th width="45%">Detalle</th>
            <th width="45%">Datos Empleado</th>
        </tr>

        {{-- table data --}}
        <tr>
            <td>1</td>
            <td><b>Nombre Empleado</b></td>
            <td>{{ $details->name }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>ID Empleado</b></td>
            <td>{{ $details->id_no }}</td>
        </tr>

        <tr>
            <td>3</td>
            <td><b>Nombre del Padre</b></td>
            <td>{{ $details->fname }}</td>
        </tr>
        <tr>
            <td>4</td>
            <td><b>Nombre de la Madre</b></td>
            <td>{{ $details->mname }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>Celular</b></td>
            <td>{{ $details->mobile }}</td>
        </tr>
        <tr>
            <td>6</td>
            <td><b>Dirección</b></td>
            <td>{{ $details->address }}</td>
        </tr>
        <tr>
            <td>7</td>
            <td><b>Sexo</b></td>
            <td>{{ $details->gender }}</td>
        </tr>

        <tr>
            <td>8</td>
            <td><b>Religión</b></td>
            <td>{{ $details->religion }}</td>
        </tr>

        <tr>
            <td>9</td>
            <td><b>Cumpleaños</b></td>
            <td>{{ date('d-m-Y', strtotime($details->dob)) }}</td>
        </tr>

        <tr>
            <td>10</td>
            <td><b>Cargo</b></td>
            <td>{{ $details->designation->name }}</td>
        </tr>

        <tr>
            <td>11</td>
            <td><b>Fecha de Ingreso</b></td>
            <td>{{ date('d-m-Y', strtotime($details->join_date)) }}</td>
        </tr>

        <tr>
            <td>12</td>
            <td><b>Salario</b></td>
            <td>$ @convert($details->salary)</td>
        </tr>


    </table>
    <br> <br>
    <i style="font-size: 10px; float: right;">Fecha: {{ date("d M Y") }}</i>

</body>

</html>
