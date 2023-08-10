<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Recibo</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .font {
            font-size: 15px;
        }

        .authority {
            /*text-align: center;*/
            float: right
        }

        .authority h5 {
            margin-top: -10px;
            color: green;
            /*text-align: center;*/
            margin-left: 35px;
        }

        .thanks p {
            color: green;
            ;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
    </style>

</head>

<body>

    <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">

        <tr>

            <td valign="top">
                <?php $image_path = '/upload/easyschool.png'; ?>
                <img src="{{ public_path() . $image_path }}" alt="" width="150"/>
                <h2 style="color: green; font-size: 15px;"><strong>Recibo: {{ $details['student']['id_no'] }}</strong></h2>
            </td>

            <td align="right">
                <pre class="font">
                    <strong>Escuela Fácil</strong>
                    soporte@escuelafacil.com
                    (664)-188-5545
                    Blvd. Diaz Ordaz #2378
                    Tijuana BC
                </pre>
            </td>

        </tr>

    </table>


    <table width="100%" style="background:white; padding:2px;"></table>

    {{-- Nombre Estudiante y Fecha y numero de recibo a la derecha --}}
    <table width="100%" style="background: #dfdbdba6; padding:0 2 0 2px;" class="font">
        <tr>

            <td>
                <p class="font" style="margin-left: 20px;">
                    <strong>Estudiante:</strong> {{ $details['student']['name'] }} <br>
                    <strong>Correo:</strong> {{ $details['student']['email'] }} <br>
                    <strong>Teléfono:</strong> {{ $details['student']['mobile'] }} <br>
                    <strong>Dirección:</strong>{{ $details['student']['address'] }}
                </p>
            </td>

            <td align="right">
                <p class="font" style="margin-left: 20px;">
                    <strong><span style="color: green;">Recibo:</span></strong>{{ $details['student']['id_no'] }}<br>
                    <strong>Fecha:</strong>{{ date("d M Y") }}<br>
                    <strong>Tipo de Pago:</strong>COD<br>
                </p>
            </td>
        </tr>
    </table>

    <br>

    @php
        $registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id','1')->where('class_id',$details->class_id)->first();

        $originalfee = $registrationfee->amount;
        $discount = $details['discount']['discount'];
        $discounttablefee = $discount/100*$originalfee;
        $finalfee = (float)$originalfee-(float)$discounttablefee;
    @endphp

    <h4>Servicio de Inscripción</h4>
    <table width="100%">
        <thead style="background-color: green; color:#FFFFFF;">
            <tr class="font">
                <th>ID</th>
                <th>Rol</th>
                <th>Nombre del Padre</th>
                <th>Año</th>
                <th>Clase</th>
                <th class="text-end">Inscripción</th>
                <th class="text-end">Descuento(%)</th>
                <th class="text-end">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr class="font">
                <td align="center">{{ $details['student']['id_no'] }}</td>
                <td align="center">{{ $details->roll }}</td>
                <td align="center">{{ $details['student']['fname'] }}</td>
                <td align="center">{{ $details['student_year']['name'] }}</td>
                <td align="center">{{ $details['student_class']['name'] }}</td>
                <td align="center">$@convert($originalfee)</td>
                <td align="center">{{ $discount }}%</td>
                <td align="center">$@convert($finalfee)</td>
            </tr>
        </tbody>
    </table>

    <br>
    <br>

    {{-- ***************************** COPIA PARA ESTUDIANTE ***************************** --}}
    <div>
        <p style="color: green; font-size: 10px; text-align: center">Copia para Estudiante</p>
    </div>
    <hr style="border: dashed 2px; width: 95%; color: #0f990a; margin-bottom: 30px;">


    {{-- Nombre Estudiante y Fecha y numero de recibo a la derecha --}}
    <table width="100%" style="background: #dfdbdba6; padding:0 2 0 2px;" class="font">
        <tr>

            <td>
                <p class="font" style="margin-left: 20px;">
                    <strong>Estudiante:</strong> {{ $details['student']['name'] }} <br>
                    <strong>Correo:</strong> {{ $details['student']['email'] }} <br>
                    <strong>Teléfono:</strong> {{ $details['student']['mobile'] }} <br>
                    <strong>Dirección:</strong>{{ $details['student']['address'] }}
                </p>
            </td>

            <td align="right">
                <p class="font" style="margin-left: 20px;">
                    <strong><span style="color: green;">Recibo:</span></strong>{{ $details['student']['id_no'] }}<br>
                    <strong>Fecha:</strong>{{ date("d M Y") }}<br>
                    <strong>Tipo de Pago:</strong>COD<br>
                </p>
            </td>
        </tr>
    </table>
    <br>
    <h4>Servicio de Inscripción</h4>
    <table width="100%">
        <thead style="background-color: green; color:#FFFFFF;">
            <tr class="font">
                <th>ID</th>
                <th>Rol</th>
                <th>Nombre del Padre</th>
                <th>Año</th>
                <th>Clase</th>
                <th class="text-end">Inscripción</th>
                <th class="text-end">Descuento(%)</th>
                <th class="text-end">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr class="font">
                <td align="center">{{ $details['student']['id_no'] }}</td>
                <td align="center">{{ $details->roll }}</td>
                <td align="center">{{ $details['student']['fname'] }}</td>
                <td align="center">{{ $details['student_year']['name'] }}</td>
                <td align="center">{{ $details['student_class']['name'] }}</td>
                <td align="center">$@convert($originalfee)</td>
                <td align="center">{{ $discount }}%</td>
                <td align="center">$@convert($finalfee)</td>
            </tr>
        </tbody>
    </table>

    <div class="thanks mt-3">
        {{-- <p>Gracias por su compra..!!</p> --}}
        <p>Gracias por inscribirte...</p>
    </div>

    <div class="authority float-right mt-5">
        <p>-----------------------------------</p>
        <h5>Firma de Aprobación:</h5>
    </div>

</body>

</html>
