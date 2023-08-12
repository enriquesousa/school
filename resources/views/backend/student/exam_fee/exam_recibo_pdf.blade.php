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
                    <b>Cargo por Examen - {{ $exam_type }} </b>
                </p>

            </td>

        </tr>

    </table>

    @php
        $registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id','3')->where('class_id',$details->class_id)->first();

        $originalfee = $registrationfee->amount;
        $discount = $details['discount']['discount'];
        $discounttablefee = $discount/100*$originalfee;
        $finalfee = (float)$originalfee-(float)$discounttablefee;
    @endphp

    <table id="customers">

        {{-- Encabezados de la tabla --}}
        <tr>
            <th width="10%">Serie</th>
            <th width="45%">Detalle</th>
            <th width="45%">Datos Estudiante</th>
        </tr>

        {{-- Datos --}}
        <tr>
            <td>1</td>
            <td><b>ID</b></td>
            <td>{{ $details['student']['id_no'] }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>Rol</b></td>
            <td>{{ $details->roll }}</td>
        </tr>
        <tr>
            <td>3</td>
            <td><b>Nombre Estudiante</b></td>
            <td>{{ $details['student']['name'] }}</td>
        </tr>
        <tr>
            <td>4</td>
            <td><b>Father's Name</b></td>
            <td>{{ $details['student']['fname'] }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>Año</b></td>
            <td>{{ $details['student_year']['name'] }}</td>
        </tr>
        <tr>
            <td>6</td>
            <td><b>Clase</b></td>
            <td>{{ $details['student_class']['name'] }}</td>
        </tr>
        <tr>
            <td>7</td>
            <td><b>Costo Examen</b></td>
            <td>$@convert($originalfee)</td>
        </tr>
        <tr>
            <td>8</td>
            <td><b>Descuento</b></td>
            <td>{{ $discount }}%</td>
        </tr>
        <tr>
            <td>9</td>
            <td><b>Total Para Examen {{ $exam_type }}</b></td>
            <td>$@convert($finalfee)</td>
        </tr>



    </table>

    {{-- <br> --}}
    <i style="font-size: 10px; float: right;">Fecha: {{ date("d M Y") }}</i>

    {{-- ***************************** COPIA PARA ESTUDIANTE ***************************** --}}
    <div>
        <p style="color: green; font-size: 10px; text-align: center">Copia para Estudiante</p>
    </div>
    <hr style="border: dashed 2px; width: 95%; color: #0f990a; margin-bottom: 30px;">

    <table id="customers">

        {{-- Encabezados de la tabla --}}
        <tr>
            <th width="10%">Serie</th>
            <th width="45%">Detalle</th>
            <th width="45%">Datos Estudiante</th>
        </tr>

        {{-- Datos --}}
        <tr>
            <td>1</td>
            <td><b>ID</b></td>
            <td>{{ $details['student']['id_no'] }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>Rol</b></td>
            <td>{{ $details->roll }}</td>
        </tr>
        <tr>
            <td>3</td>
            <td><b>Nombre Estudiante</b></td>
            <td>{{ $details['student']['name'] }}</td>
        </tr>
        <tr>
            <td>4</td>
            <td><b>Father's Name</b></td>
            <td>{{ $details['student']['fname'] }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>Año</b></td>
            <td>{{ $details['student_year']['name'] }}</td>
        </tr>
        <tr>
            <td>6</td>
            <td><b>Clase</b></td>
            <td>{{ $details['student_class']['name'] }}</td>
        </tr>
        <tr>
            <td>7</td>
            <td><b>Costo Examen</b></td>
            <td>$@convert($originalfee)</td>
        </tr>
        <tr>
            <td>8</td>
            <td><b>Descuento</b></td>
            <td>{{ $discount }}%</td>
        </tr>
        <tr>
            <td>9</td>
            <td><b>Total Para Examen {{ $exam_type }}</b></td>
            <td>$@convert($finalfee)</td>
        </tr>

    </table>


    <i style="font-size: 10px; float: right;">Fecha: {{ date("d M Y") }}</i>

</body>

</html>
