<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;



class MonthlyFeeController extends Controller
{
    // MonthlyFeeView
    public function MonthlyFeeView(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        return view('backend.student.monthly_fee.monthly_fee_view',$data);
    }

    // MonthlyFeeClassData
    public function MonthlyFeeClassData(Request $request){

        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if ($year_id !='') {
            $where[] = ['year_id','like',$year_id.'%'];
        }
        if ($class_id !='') {
            $where[] = ['class_id','like',$class_id.'%'];
        }
        $allStudent = AssignStudent::with(['discount'])->where($where)->get();

        // dd($allStudent->toArray());


        $html['thsource']  = '<th>Serie</th>';
        $html['thsource'] .= '<th>ID</th>';
        $html['thsource'] .= '<th>Nombre Estudiante</th>';
        $html['thsource'] .= '<th>Rol</th>';
        $html['thsource'] .= '<th>Mensualidad($)</th>';
        $html['thsource'] .= '<th>Descuento(%)</th>';
        $html['thsource'] .= '<th>Cargo Total</th>';
        $html['thsource'] .= '<th>Acción</th>';


        foreach ($allStudent as $key => $v) {

            // ahora usamos 2 para identificar al cargo de mensualidad de la tabla 'fee_category_amounts'
            $registrationfee = FeeCategoryAmount::where('fee_category_id','2')->where('class_id',$v->class_id)->first();

            $color = 'success';

            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.'$ '.number_format($registrationfee->amount, 2).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';

            $originalfee = $registrationfee->amount;
            $discount = $v['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;

            $html[$key]['tdsource'] .='<td>'.'$ '.number_format($finalfee, 2).'</td>';

            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="Recibo de Pago PDF"
                                        target="_blanks"
                                        href="'.route("student.monthly.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&month='.$request->month.'">
                                        Recibo</a>';
            $html[$key]['tdsource'] .= '</td>';

        }
       return response()->json(@$html);
    }

    // MonthlyFeePayslip
    public function MonthlyFeePayslip(Request $request){

        $student_id = $request->student_id;
        $class_id = $request->class_id;
        $data['month'] = $request->month;

        $data['details'] = AssignStudent::with(['student','discount'])
                                    ->where('student_id', $student_id)
                                    ->where('class_id', $class_id)
                                    ->first();

        // Invoice genérico
        // $pdf = PDF::loadView('backend.student.registration_fee.registration_invoice_pdf', $allStudent);

        // Invoice tipo negocio
        // $pdf = PDF::loadView('backend.student.registration_fee.registration_invoice2_pdf', $allStudent);

        // sencillo
        $pdf = PDF::loadView('backend.student.monthly_fee.monthly_recibo_pdf', $data);

        return $pdf->stream('recibo.pdf');
    }


}
