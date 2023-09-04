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

        $total_cost = $other_cost + $employee_salary;
        $profit = $student_fee - $total_cost;


        $html['thsource']  = '<th>Cargo a Estudiantes</th>';
        $html['thsource'] .= '<th>Otros Gastos</th>';
        $html['thsource'] .= '<th>Sueldo Empleados</th>';
        $html['thsource'] .= '<th>Costo Total</th>';
        $html['thsource'] .= '<th>Ganancia</th>';
        $html['thsource'] .= '<th>Acción</th>';

        $color = 'success';

        $html['tdsource']  = '<td>'.'$ '.number_format($student_fee, 2).'</td>';
        $html['tdsource'] .= '<td>'.'$ '.number_format($other_cost, 2).'</td>';
        $html['tdsource'] .= '<td>'.'$ '.number_format($employee_salary, 2).'</td>';
        $html['tdsource'] .= '<td>'.'$ '.number_format($total_cost, 2).'</td>';

        // $html['tdsource'] .= '<td>'.'$ '.number_format($profit, 2).'</td>';
        if ($profit > 0) {
            $html['tdsource'] .='<td class="text-success">'.'$ '.number_format($profit, 2).'</td>';
        } else {
            $html['tdsource'] .='<td class="text-danger">'.'$ '.number_format($profit, 2).'</td>';
        }

        $html['tdsource'] .='<td>';
        $html['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PDF" target="_blanks" href="'.route("report.profit.pdf").'?start_date='.$sdate.'&end_date='.$edate.'">Recibo</a>';
        $html['tdsource'] .= '</td>';

       return response()->json(@$html);

    }

    // MonthlyProfitPdf
    public function MonthlyProfitPdf(Request $request){

        $data['start_date'] = date('Y-m',strtotime($request->start_date));
        $data['end_date'] = date('Y-m',strtotime($request->end_date));
        $data['sdate'] = date('Y-m-d',strtotime($request->start_date));
        $data['edate'] = date('Y-m-d',strtotime($request->end_date));

        // sencillo
        $pdf = PDF::loadView('backend.report.profit.profit_pdf', $data);
        return $pdf->stream('documento.pdf');
    }


}
