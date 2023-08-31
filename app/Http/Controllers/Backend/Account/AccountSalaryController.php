<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\EmployeeAttendance;
use App\Models\AccountEmployeeSalary;

class AccountSalaryController extends Controller
{
    // AccountSalaryController
    public function EmployeeSalaryView(){
        $data['allData'] = AccountEmployeeSalary::all();
        return view('backend.account.account_salary.employee_salary_view', $data);
    }

    // EmployeeSalaryAdd
    public function EmployeeSalaryAdd(){
        return view('backend.account.account_salary.employee_salary_add');
    }

    // EmployeeSalaryGetEmployee
    public function EmployeeSalaryGetEmployee(Request $request){

        $date = date('Y-m', strtotime($request->date));
        // Ej. $date = '2023-07';
        // dd($date); //debug dd con js el resultado lo podemos ver en inspección de consola network response!

        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }
        // dd($where);
        // array:1 [ // app/Http/Controllers/Backend/Employee/MonthlySalaryController.php:40
        //     0 => array:3 [
        //       0 => "date"
        //       1 => "like"
        //       2 => "2023-07%"
        //     ]
        //   ]

        $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
        // dd($data->toArray()); //el resultado lo podemos ver en inspección de consola network response!

        // Convertir la fecha a español Mes/Año
        $fecha = \Carbon\Carbon::parse($date)->locale('es')->isoFormat('MMMM[/]YYYY');

        $html['thsource'] = '<th>Serie</th>';
        $html['thsource'] .= '<th>ID</th>';
        $html['thsource'] .= '<th>Nombre de Empleado</th>';
        $html['thsource'] .= '<th>Salario Base</th>';
        $html['thsource'] .= '<th>' . "Sueldo este Mes: " . $fecha . '</th>';
        $html['thsource'] .= '<th>Seleccionar</th>';

        foreach ($data as $key => $v) {

            $account_salary = AccountEmployeeSalary::where('employee_id', $v->employee_id)->where('date', $date)->first();

            if ($account_salary != null) {
                $checked = 'checked';
            } else {
                $checked = '';
            }

            // Calculas los Dias que el empleado a estado ausente
            $totalAsistencias = EmployeeAttendance::with(['user'])->where($where)->where('employee_id', $v->employee_id)->get();
            $absentCount = count($totalAsistencias->where('attend_status', 'Ausente'));

            // $color = 'success';
            $html[$key]['tdsource'] = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['user']['id_no'] . '<input type="hidden" name="date" value="' . $date . '">' . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['user']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . '$ ' . number_format($v['user']['salary'], 2) . '</td>';


            // Calcular el salario mensual
            $salary = (float) $v['user']['salary'];
            $salaryPerDay = (float) $salary / 30;
            $totalSalaryMinus = (float) $absentCount * (float) $salaryPerDay;
            $totalSalary = (float) $salary - (float) $totalSalaryMinus;

            // Display el Salario
            if ($totalSalary == $salary) {
                $html[$key]['tdsource'] .= '<td class="text-success">' . '$ ' . number_format($totalSalary, 2) . '<input type="hidden" name="amount[]" value="' . $totalSalary . '">' . '</td>';
            } else {
                $html[$key]['tdsource'] .= '<td class="text-danger">' . '$ ' . number_format($totalSalary, 2) . '<input type="hidden" name="amount[]" value="' . $totalSalary . '">' . '</td>';
            }

            // Display el Checkbox
            $html[$key]['tdsource'] .= '<td>' . '<input type="hidden" name="employee_id[]" value="'.$v->employee_id.'">' . '<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>';

        }
        return response()->json(@$html);
    }

    // EmployeeSalaryStore
    public function EmployeeSalaryStore(Request $request){

    }



}
