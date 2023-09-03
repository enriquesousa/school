<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\Designation;
use App\Models\EmployeeAttendance;

use DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use App\Models\EmployeeSalaryLog;



class MonthlySalaryController extends Controller
{
    // MonthlySalaryView
    public function MonthlySalaryView(){
        return view('backend.employee.monthly_salary.monthly_salary_view');
    }

    // MonthlySalaryGet
    public function MonthlySalaryGet(Request $request){

        $date = date('Y-m',strtotime($request->date));
        // dd($date); //debug dd con js el resultado lo podemos ver en inspección de consola network response!

        if ($date != '') {
            $where[] = ['date','like',$date.'%'];
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

        $html['thsource']  = '<th>Serie</th>';
        $html['thsource'] .= '<th>Nombre de Empleado</th>';
        $html['thsource'] .= '<th>Salario Base</th>';
        $html['thsource'] .= '<th>'."Sueldo este Mes: ".$date.'</th>';
        $html['thsource'] .= '<th>Acción</th>';


        foreach ($data as $key => $v) {

            $totalAsistencias = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$v->employee_id)->get();
            $absentCount = count($totalAsistencias->where('attend_status','Ausente'));

            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['user']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.'$ '.number_format($v['user']['salary'], 2).'</td>';


            // Calcular el salario mensual
            $salary = (float)$v['user']['salary'];
            $salaryPerDay = (float)$salary/30;
            $totalSalaryMinus = (float)$absentCount*(float)$salaryPerDay;
            $totalSalary = (float)$salary - (float)$totalSalaryMinus;

            if ($totalSalary == $salary) {
                $html[$key]['tdsource'] .='<td class="text-success">'.'$ '.number_format($totalSalary, 2).'</td>';
            } else {
                $html[$key]['tdsource'] .='<td class="text-danger">'.'$ '.number_format($totalSalary, 2).'</td>';
            }


            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="Recibo de Pago PDF" target="_blanks" href="'.route("employee.monthly.salary.payslip", $v->employee_id).'">Recibo</a>';
            $html[$key]['tdsource'] .= '</td>';

        }
       return response()->json(@$html);
    }

    // MonthlySalaryPayslip
    public function MonthlySalaryPayslip(Request $request, $employee_id){

        $id = EmployeeAttendance::where('employee_id',$employee_id)->first();

        $date = date('Y-m',strtotime($id->date));

        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }

        $data['details'] = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$id->employee_id)->get();

        // Invoice genérico
        // $pdf = PDF::loadView('backend.student.registration_fee.registration_invoice_pdf', $allStudent);

        // Invoice tipo negocio
        // $pdf = PDF::loadView('backend.student.registration_fee.registration_invoice2_pdf', $allStudent);

        // sencillo
        $pdf = PDF::loadView('backend.employee.monthly_salary.monthly_salary_pdf', $data);

        return $pdf->stream('recibo.pdf');
    }

}
