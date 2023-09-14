<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\ExamType;
use App\Models\StudentMarks;
use Barryvdh\DomPDF\Facade\Pdf;

class ResultReportController extends Controller
{
    // StudentResultView
    public function StudentResultView(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.report.student_result.student_result_view', $data);
    }

    // StudentResultGet
    public function StudentResultGet(Request $request){

        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;

        $singleResult = StudentMarks::where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->first();

        // Cuando es un solo record podemos usar == true para saber si encontró datos
        if ( $singleResult == true ) {

            $data['allData'] = StudentMarks::select('year_id', 'class_id', 'exam_type_id', 'student_id')->where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->get();

            // dd($data['allData']->toArray());
            // array:3 [▼ // app/Http/Controllers/Backend/Report/ResultReportController.php:39
            // 0 => array:4 [▼
            //     "year_id" => 1
            //     "class_id" => 1
            //     "exam_type_id" => 1
            //     "student_id" => 11
            // ]
            // 1 => array:4 [▼
            //     "year_id" => 1
            //     "class_id" => 1
            //     "exam_type_id" => 1
            //     "student_id" => 12
            // ]
            // 2 => array:4 [▼
            //     "year_id" => 1
            //     "class_id" => 1
            //     "exam_type_id" => 1
            //     "student_id" => 26
            // ]
            // ]

            $pdf = PDF::loadView('backend.report.student_result.student_result_pdf', $data);
            return $pdf->stream('documento.pdf');

        } else {

            // Desplegar notificación
            $notification = array(
                'message' => 'No hay datos con esta condición!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }

    }


}
