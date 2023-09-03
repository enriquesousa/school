<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AccountEmployeeSalary;
use App\Models\AccountOtherCost;
use App\Models\AccountStudentFee;

use DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;

class ProfitController extends Controller
{
    // MonthlyProfitView
    public function MonthlyProfitView(){
        return view('backend.report.profit.profit_view');
    }

    // MonthlyProfitDateWiseGet
    public function MonthlyProfitDateWiseGet(Request $request){

        $start_date = date('Y-m',strtotime($request->start_date));
        $end_date = date('Y-m',strtotime($request->end_date));

        $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));

        $student_fee = AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');
        $other_cost = AccountOtherCost::whereBetween('date',[$sdate,$edate])->sum('amount');
        $employee_salary = AccountEmployeeSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');

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


}
