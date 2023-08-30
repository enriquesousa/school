<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FeeCategoryAmount;
use App\Models\AssignStudent;
use App\Models\AccountStudentFee;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\FeeCategory;


class StudentFeeController extends Controller
{
    // StudentFeeView
    public function StudentFeeView(){
       $data['allData'] = AccountStudentFee::all();
       return view('backend.account.student_fee.student_fee_view', $data);
    }

    // StudentFeeAdd
    public function StudentFeeAdd(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['fee_categories'] = FeeCategory::all();

        return view('backend.account.student_fee.student_fee_add', $data);
    }

    // StudentFeeGetStudent
    public function StudentFeeGetStudent(Request $request){

        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $fee_category_id = $request->fee_category_id;
        $date = date('Y-m', strtotime($request->date));

        $data = AssignStudent::with(['discount'])->where('year_id', $year_id)->where('class_id', $class_id)->get();

        $html['thsource'] = '<th>ID</th>';
        $html['thsource'] .= '<th>Nombre Estudiante</th>';
        $html['thsource'] .= '<th>Nombre del Padre</th>';
        $html['thsource'] .= '<th>Cargo</th>';
        $html['thsource'] .= '<th>Descuento</th>';
        $html['thsource'] .= '<th>Total (Este Estudiante)</th>';
        $html['thsource'] .= '<th>Seleccionar</th>';

        foreach ($data as $key => $std) {
            $registrationfee = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->where('class_id', $std->class_id)->first();

            $accountstudentfees = AccountStudentFee::where('student_id', $std->student_id)->where('year_id', $std->year_id)->where('class_id', $std->class_id)->where('fee_category_id', $fee_category_id)->where('date', $date)->first();

            if ($accountstudentfees != null) {
                $checked = 'checked';
            } else {
                $checked = '';
            }

            $color = 'success';

            $html[$key]['tdsource'] = '<td>' . $std['student']['id_no'] . '<input type="hidden" name="fee_category_id" value= " ' . $fee_category_id . ' " >' . '</td>';

            $html[$key]['tdsource'] .= '<td>' . $std['student']['name'] . '<input type="hidden" name="year_id" value= " ' . $std->year_id . ' " >' . '</td>';

            $html[$key]['tdsource'] .= '<td>' . $std['student']['fname'] . '<input type="hidden" name="class_id" value= " ' . $std->class_id . ' " >' . '</td>';

            $html[$key]['tdsource'] .= '<td>' . '$ ' . number_format($registrationfee->amount, 2) . '<input type="hidden" name="date" value= " ' . $date . ' " >' . '</td>';

            $html[$key]['tdsource'] .= '<td>' . $std['discount']['discount'] . '%' . '</td>';

            $orginalfee = $registrationfee->amount;
            $discount = $std['discount']['discount'];
            $discountablefee = $discount / 100 * $orginalfee;
            $finalfee = (int) $orginalfee - (int) $discountablefee;

            $html[$key]['tdsource'] .= '<td>' . '<input type="text" name="amount[]" value="' . '$ ' . number_format($finalfee, 2)  . ' " class="form-control" readonly' . '</td>';

            $html[$key]['tdsource'] .= '<td>' . '<input type="hidden" name="student_id[]" value="' . $std->student_id . '">' . '<input type="checkbox" name="checkmanage[]" id="' . $key . '" value="' . $key . '" ' . $checked . ' style="transform: scale(1.5);margin-left: 10px;"> <label for="' . $key . '"> </label> ' . '</td>';

        }
        return response()->json(@$html);
    }

    // StudentFeeStore
    public function StudentFeeStore(Request $request){

        $date = date('Y-m', strtotime($request->date));

        // Primero borramos datos anteriores (si es que existe)
        AccountStudentFee::where('year_id', $request->year_id)->where('class_id', $request->class_id)->where('fee_category_id', $request->fee_category_id)->where('date', $date)->delete();

        $checkData = $request->checkmanage;

        if ($checkData != null) {
            for ($i=0; $i < count($checkData) ; $i++) {
                $data = new AccountStudentFee();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->date = $date;
                $data->fee_category_id = $request->fee_category_id;
                $data->student_id = $request->student_id[$checkData[$i]];

                // $cantidad = $request->amount[$checkData[$i]];
                // dd($cantidad);

                // Para convertir a numero un string de tipo $100,000 (money/dinero)
                // $string = "$100,000";
                // $int = preg_replace("/([^0-9\\.])/i", "", $string);
                // echo $int;

                // si $cantidad es ($ 1,520.00)
                // $int = preg_replace("/([^0-9\\.])/i", "", $cantidad);
                // dd($int);
                // Resultado: 1520.00

                $cantidad = $request->amount[$checkData[$i]];
                $int = preg_replace("/([^0-9\\.])/i", "", $cantidad);
                $data->amount = $int;

                $data->save();
            }
        }

        if (!empty(@$data) || empty($checkData)) {
            // Desplegar notificación
            $notification = array(
                'message' => 'Datos Actualizados con éxito!',
                'alert-type' => 'success'
            );
            return redirect()->route('student.fee.view')->with($notification);
        }else{
            // Desplegar notificación
            $notification = array(
                'message' => 'Datos NO guardados!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }


}
